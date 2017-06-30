<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 30/06/2017
 * Time: 22:29
 */

use Hudutech\Entity\Order;
use Hudutech\Controller\OrderController;

$successMsg = '';
$errorMsg = '';

if($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['clientEmail']))
    {
        $order= new Order();
        $order->setClientEmail($_POST['clientEmail']);
        $order->setDiscipline($_POST['discipline']);
        $order->setProjectType($_POST['projectType']);
        $order->setPageNo($_POST['pageNo']);
        $order->setFormat($_POST['format']);
        $order->setReferencesNo($_POST['referencesNo']);
        $order->setDeadline($_POST['deadline']);
        $order->setAttachment1("1");
        $order->setAttachment2("2");
        $order->setAttachment3("3");
        $order->setAttachment4("4");
        $order->setAttachment5("5");
        $order->setOrderStatus("on_progress");



        $orderCtrl = new OrderController();
        $created = $orderCtrl->create($order);
        if ($created === true) {
            $successMsg .= "Order created successfully";
        } elseif (array_key_exists('error', $created)) {
            $errorMsg .= "{$created['error']}";

        }
    } else {
        $errorMsg .= "KEY  FIELDS REQUIRED";
    }
}

?>