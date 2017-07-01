<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 01/07/2017
 * Time: 01:51
 */
require_once __DIR__.'/../vendor/autoload.php';

use Hudutech\Controller\PaymentController;
$data = json_decode(file_get_contents('php://input'), true);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $amount = PaymentController::calculatePrice((int)$data['pages'], (int)$data['hours']);

    print_r(json_encode(array(
        "amount"=>$amount
    )));}

