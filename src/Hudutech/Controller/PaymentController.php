<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/30/17
 * Time: 11:53 AM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\PaymentInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Payment;

class PaymentController implements PaymentInterface
{
    public function create(Payment $payment)
    {
       $db = new DB();
       $conn = $db->connect();
       try{
           $stmt = $conn->prepare("INSERT INTO payments(orderId, txnId, email, amount, paymentStatus)
                                  VALUES (:orderId, :txnId, :email, :amount, :paymentStatus)");
           $stmt->bindValue(":orderId",$payment->getAmount(), \PDO::PARAM_INT);
           $stmt->bindValue(":txnId", $payment->getTxnId(), \PDO::PARAM_STR);
           $stmt->bindValue(":email", $payment->getEmail(), \PDO::PARAM_STR);
           $stmt->bindValue(":amount", $payment->getAmount(), \PDO::PARAM_STR);
           $stmt->bindValue(":paymentStatus", $payment->getPaymentStatus(), \PDO::PARAM_STR);

           if ($stmt->execute()) {
               $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
               $db->closeConnection();
               return $rows;
           } else {
               return [
                   'error' => "Internal Server Error"
               ];
           }


       } catch (\PDOException $e) {
           return [
               "error" => $e->getMessage()
           ];
       }
    }

    public static function delete($txnId)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
           $stmt = $conn->prepare("DELETE FROM payments WHERE txnId=:txnId");

            if ($stmt->execute()) {
                $db->closeConnection();
                return true;
            } else {
                return [
                    'error' => "Internal Server Error"
                ];
            }


        } catch (\PDOException $e) {
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public static function getId($txnId)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("SELECT t.* FROM payments t WHERE t.txnId=:txnId");
            $stmt->bindValue(":$txnId", $txnId);

            if ($stmt->execute()) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $db->closeConnection();
                return $row;
            } else {
                return [
                    'error' => "Internal Server Error"
                ];
            }


        } catch (\PDOException $e) {
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public static function getObject($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("SELECT t.* FROM payments t WHERE t.id=:id");
            $stmt->bindValue(":id", $id);
            $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Payment::class);
            if ($stmt->execute()) {
                $classObject = $stmt->fetch();
                $db->closeConnection();
                return $classObject;
            } else {
                return [
                    'error' => "Internal Server Error"
                ];
            }


        } catch (\PDOException $e) {
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public static function all()
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("SELECT t.* FROM payments t WHERE 1");

            if ($stmt->execute()) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $db->closeConnection();
                return $row;
            } else {
                return [
                    'error' => "Internal Server Error"
                ];
            }

        } catch (\PDOException $e) {
            return [
                "error" => $e->getMessage()
            ];
        }
    }

    public static function calculatePrice($pages, $hours){
        $amount = 0;
        if($hours <=24){
            $amount = $pages * 25;
        }
        if($hours > 24) {
            $amount = $pages * 15;
        }
        return (int)$amount;
    }

}