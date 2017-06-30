<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/16/17
 * Time: 9:02 PM
 */

require_once __DIR__.'/../vendor/autoload.php';

//mode should be passed in the constructor
//otherwise the default live mode will be picked
use \Hudutech\Controller\Paypal_IPN;

$ipn = new Paypal_IPN("sandbox");
$ipn->execute();