<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/30/17
 * Time: 10:10 AM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\OrderInterface;
use Hudutech\Entity\Order;

class OrderController implements OrderInterface
{
    public function create(Order $order)
    {
        // TODO: Implement create() method.
    }

    public function update(Order $order, $id)
    {
        // TODO: Implement update() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function getId($id)
    {
        // TODO: Implement getId() method.
    }

    public static function getObject($id)
    {
        // TODO: Implement getObject() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }


}