<?php
namespace App\Http\Controllers\Appointments;

use App\Http\Controllers\Controller;
use App\Services\Payment\Dragonpay;
use App\BOI\Services\Payments\Paypal;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    protected $paypal;
    protected $url;

    public function __construct()
    {
        $this->paypal = new Paypal();
        $this->url = env('FRONT_URL') . '/';
    }

//    private function createOrUpdateTransaction($invoice, $userId, $artistId, $paymentMethod, $amount)
//    {
//        $invoiceId = $invoice['id'];
//        if ($invoice['payment_scheme'] != 'down') {
//            $transaction = Transaction::where('invoice_id', $invoiceId)
//                ->where('status', '<>', 'cancelled')
//                ->first();
//        } else {
//            $transaction = Transaction::where('invoice_id', $invoiceId)
//                ->where('status', '<>', 'completed')
//                ->where('status', '==', 'pending')
//                ->where('status', '<>', 'cancelled')
//                ->first();
//        }
//        $transId = strtoupper(uniqid('ID')) . 'U' . $userId . 'A' . $artistId;
//        if (!$transaction) {
//            $transData = [
//                'invoice_id' => $invoiceId,
//                'transaction_no' => $transId,
//                'payment_gateway' => $paymentMethod,
//                'amount_paid' => $amount,
//                'status' => 'pending'
//            ];
//            Transaction::create($transData);
//        } else {
//            $transData = [
//                'transaction_no' => $transId,
//                'payment_gateway' => $paymentMethod,
//                'amount_paid' => $amount,
//                'external_transaction_no' => ''
//            ];
//            Transaction::where('id', $transaction['id'])->update($transData);
//        }
//        return $transId;
//    }

//    private function getTax($amount)
//    {
//        return $amount * 0.12;
//    }

//    private function createOrUpdateInvoice($bookingId, $amount, $down)
//    {
//        $model = Invoice::where('booking_id', $bookingId)
//            ->where(function ($q) {
//                $q->where('status', 'initial')
//                    ->orWhere('status', 'pending');
//            });
//        $invoice = $model->first();
//        if ($invoice) {
//            $model->update([
//                'amount' => $amount,
//                'payment_scheme' => $down ? 'down' : 'full'
//            ]);
//            return $invoice;
//        }
//        $data = [
//            'booking_id' => $bookingId,
//            'amount' => $amount,
//            'tax' => $this->getTax($amount),
//            'status' => 'pending',
//            'payment_scheme' => $down ? 'down' : 'full'
//        ];
//        $invoice = Invoice::create($data);
//        return $invoice;
//    }

//    private function calculateAmount($invoice, $down = 0)
//    {
//        $total = $invoice['amount'] + $invoice['tax'];
//        if ($down) {
//            return $total / 2;
//        }
//        return $total;
//    }

    public function payment(Request $request, $paymentMethod)
    {
        $url = null;
        \DB::transaction(function () use ($request, $paymentMethod, &$url) {
            $down = 0;
            if ($request->has('down')) {
                $down = $request->get('down');
            }

            // Create appointment
            $transId = uniqid();
            $email = 'alleo.indong@gmail.com';

            $amount = 3280;

            switch ($paymentMethod) {
                case 'over-the-counter':
                    $url = [
                        'url' => $this->overTheCounter($transId)
                    ];
                    break;
                case 'paypal':
                    $url = $this->paypal($amount, $transId, $email);

                    break;
                case 'dragonpay':
                    $url = ['url' => $this->dragonpay($amount, $transId, $email)];
                    break;
                default:
                    $url = [
                        'url' => $this->overTheCounter($transId)
                    ];
            }

        });


        if ($url == null) {
            return response()->json(['Failed to get payment url'], 400);
        }

        return redirect()->away($url);
    }

    private function paypal($amount, $transId, $email)
    {
        $paypal = new Paypal();
        return $paypal->postPayment($transId, $amount);
    }

    private function dragonpay($amount, $transId, $email)
    {
        $dragonpay = new Dragonpay();
        return $dragonpay->setGatewayUrl(env('GATEWAY_HOST'))
            ->setMerchant(env('MERCHANT_ID'))
            ->setKey(env('SECRET_KEY'))
            ->setTransId($transId)
            ->setAmount($amount)
            ->setDescription(env('DESCRIPTION'))
            ->setCcy(env('CCY'))
            ->setEmail($email)
            ->setPayment('bank')
            ->generateUrl();
    }

    private function overTheCounter($transId)
    {
        return url()->to('/transactions/' . $transId);
    }

    public function paypalCallback(Request $request, $transId)
    {
        $input = $request->all();
        $transaction = $this->paypal->success($transId, $input['PayerID'], $input['paymentId']);
        return redirect()->to($this->url);
    }

    public function paypalCancel($transId)
    {
        $transaction = $this->paypal->cancel($transId);
        return redirect()->to($this->url);
    }

    public function dragonpayCallback(Request $request)
    {
        $input = $request->all();
        \Log::info($input);
        try {
            $status = 'pending';
            if ($input['status'] == 'S') {
                $status = 'paid';
            }
            $transaction = Transaction::where('transaction_no', $input['txnid'])->update([
                'external_transaction_no' => $input['refno'],
                'status' => $status
            ]);
            $transaction = Transaction::where('transaction_no', $input['txnid'])->first();
            $invoice = Invoice::where('id', $transaction['invoice_id'])->first();
            if ($status == 'paid') {
                // Check if invoice is full payment
                $invoiceStatus = 'initial';
                if ($invoice['payment_scheme'] == 'full' && $invoice['status'] != 'initial') {
                    $invoiceStatus = 'paid';
                }
                // If invoice has initial status
                if ($invoice['status'] == 'initial') {
                    // change to paid
                    $invoiceStatus = 'paid';
                }
                // Update Invoice
                Invoice::where('id', $transaction['invoice_id'])->update([
                    'status' => $invoiceStatus
                ]);
                $bookingArtist = BookingArtist::where('booking_id', $invoice['booking_id'])->first();
                if ($invoiceStatus == 'paid') {
                    $amount = $invoice['amount'];
                    $this->walletDebit($bookingArtist['artist_id'], $amount - ($amount * 0.20), 'Booking Payment From Booking Id: ' . $invoice['booking_id']);
                }
                $booking = Booking::where('id', $invoice['booking_id'])->update(['status' => 'confirmed']);
            }
        } catch (\Exception $e) {
            return 'error';
        }
        return redirect()->to($this->url);
    }

    public function dragonpayReturnUrl(Request $request)
    {
        $input = $request->all();
        return redirect()->to($this->url);
    }
}