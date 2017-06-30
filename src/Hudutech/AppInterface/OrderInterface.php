<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/30/17
 * Time: 10:06 AM
 */

namespace Hudutech\AppInterface;


use Hudutech\Entity\Order;

interface OrderInterface extends BaseInterface
{
 public function create(Order $order);
 public function update(Order $order, $id);
}