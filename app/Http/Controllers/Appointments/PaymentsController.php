<?php
namespace App\Http\Controllers\Appointments;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
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

        $this->middleware('auth');
    }

    public function payment(Request $request, $paymentMethod)
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->back();
        }

        $url = null;
        \DB::transaction(function () use ($request, $paymentMethod, $user, &$url) {
//            $input = $request->all();
//
//            // Create appointment
//            $appointment = Appointment::create();

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