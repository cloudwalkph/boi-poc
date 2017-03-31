<?php
namespace App\BOI\Services\Payment;

use App\Http\Controllers\Controller;
use PayPal\Api\Sale;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class Paypal extends Controller
{
    private $_api_context;

    public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function postPayment($id, $totalamount)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Booking Payment')// item name
        ->setCurrency('PHP')
            ->setQuantity(1)
            ->setPrice($totalamount); // unit price

        // add item to list
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('PHP')
            ->setTotal($totalamount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setInvoiceNumber($id)
            ->setItemList($item_list)
            ->setDescription('Booking payment for vireef');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(url('/payments/' . $id . '/paypal'))
            ->setCancelUrl(url('/payments/' . $id . '/paypal/cancel'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                print_r($err_data);
                exit;
            } else {
                die('Some error occur, sorry for inconvenience');
            }
        }

        $redirect_url = '';
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        return $redirect_url;
    }

    public function success($transactionId, $payerId, $paymentId)
    {
        try {
            $payment_id = $paymentId;
            $payment = Payment::get($payment_id, $this->_api_context);
            $execution = new PaymentExecution();
            $execution->setPayerId($payerId);
            $result = $payment->execute($execution, $this->_api_context);
//            $transaction = VireefTransaction::where('transaction_no', $transactionId)->update([
//                'external_transaction_no' => $paymentId,
//                'status' => 'paid'
//            ]);
//            $transaction = VireefTransaction::where('transaction_no', $transactionId)->first();
//            $invoice = VireefInvoice::where('id', $transaction['invoice_id'])->first();
//            $bookingArtist = BookingArtist::where('booking_id', $invoice['booking_id'])->first();
            // Check if invoice is full payment
            $invoiceStatus = 'initial';
//            if ($invoice['payment_scheme'] == 'full' && $invoice['status'] != 'initial') {
//                $invoiceStatus = 'paid';
//            }
            // If invoice has initial status
//            if ($invoice['status'] == 'initial') {
//                // change to paid
//                $invoiceStatus = 'paid';
//            }
            // Update Invoice
//            VireefInvoice::where('id', $transaction['invoice_id'])->update([
//                'status' => $invoiceStatus
//            ]);
//            if ($invoiceStatus == 'paid') {
//                $amount = $invoice['amount'];
//                $this->walletDebit($bookingArtist['artist_id'], $amount - ($amount * 0.20), 'Booking Payment From Booking Id: ' . $invoice['booking_id']);
//            }
//            $booking = Booking::where('id', $invoice['booking_id'])->update(['status' => 'confirmed']);
        } catch (PayPalConnectionException $e) {
            return false;
        }
        return true;
    }

    public function cancel($transactionId)
    {
        // Get transaction by $id from session
//        $transaction = VireefTransaction::where('transaction_no', $transactionId)
//            ->update(['status' => 'cancelled']);
        //return
        return $transactionId;
    }

    public function refund($paymentId)
    {
        $payment = Payment::get($paymentId, $this->_api_context);
        $transactions = $payment->getTransactions();
        $relatedResources = $transactions[0]->getRelatedResources();
        $sale = $relatedResources[0]->getSale();
        $saleId = $sale->getId();
        try {
            $sale = Sale::get($saleId, $this->_api_context);
        } catch (\Exception $e) {
            \Log::info('Failed to refund payment with paymentId: ' . $paymentId);
        }
    }
}