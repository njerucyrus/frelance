<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/30/17
 * Time: 11:52 AM
 */

namespace Hudutech\AppInterface;


use Hudutech\Entity\Payment;

interface PaymentInterface extends BaseInterface
{
 public function create(Payment $payment);
}