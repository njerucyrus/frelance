<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/30/17
 * Time: 4:49 PM
 */

namespace Hudutech\Controller;

use Hudutech\Entity\Payment;

class  Paypal_IPN
{
    private $_url;

    public function __construct($mode = 'live')
    {
        if ($mode == 'live') {
            $this->_url = "https://www.paypal.com/cgi-bin/webscr";
        } elseif ($mode == 'sandbox') {
            $this->_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
        }
    }

    public function execute()
    {

        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }

        // Read the post from PayPal system and add 'cmd'
        $req = 'cmd=_notify-validate';
        //$get_magic_quotes_exists = false;
        if (function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }


        $postFields = 'cmd=_notify-validate';
        foreach ($_POST as $key => $value) {
            $postFields .= "&$key=" . urlencode($value);
        }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $this->_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $req,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_HTTPHEADER => array('Connection: Close', 'User-Agent: PremierePesa')
        ));
        $result = curl_exec($ch);

        $tokens = explode("\r\n\r\n", trim($result));
        $result = trim(end($tokens));

        if (strcmp($result, "VERIFIED") == 0 || strcasecmp($result, "VERIFIED") == 0) {

            //Payment data
            $item_number = $_POST['item_number'];
            $txn_id = $_POST['txn_id'];
            $payment_gross = $_POST['mc_gross'];
            $payment_status = $_POST['payment_status'];
            $buyer_email = $_POST['payer_email'];

            if ($payment_status == 'Completed') {

                //Check if payment data exists with the same TXN ID.
                //to avoid duplicate transactions
                $prevPayment = PaymentController::getId($txn_id);
                if (!array_key_exists('error', $prevPayment) && sizeof($prevPayment) > 0) {
                    exit();
                } else {
                    $payment = new Payment();
                    $payment->setEmail($buyer_email);
                    $payment->setOrderId($item_number);
                    $payment->setAmount($payment_gross);
                    $payment->setPaymentStatus($payment_status);
                    $payment->setTxnId($txn_id);

                    $paymentController = new  PaymentController();
                    //create payment and persist it to the database.
                    $paymentController->create($payment);
                }
            } else {
                exit();
            }
        }
        // close curl
        curl_close($ch);

    }
}