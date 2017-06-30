<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/30/17
 * Time: 10:10 AM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\OrderInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Order;

class OrderController implements OrderInterface
{
    public function create(Order $order)
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("INSERT INTO orders(clientEmail,discipline, projectType, pageNo,
                                     format,referencesNo, deadline, attachment1, attachment2,
                                      attachment3,attachment4, attachment5, orderStatus)
                                     VALUES (:clientEmail,:discipline, :projectType, :pageNo,
                                      :format,referencesNo, :deadline, :attachment1, :attachment2, 
                                      :attachment3, :attachment4, :attachment5, :orderStatus)
                                      ");

            $stmt->bindValue(":clientEmail", $order->getClientEmail(), \PDO::PARAM_STR);
            $stmt->bindValue(":discipline", $order->getDiscipline(), \PDO::PARAM_STR);
            $stmt->bindValue(":projectType", $order->getProjectType(), \PDO::PARAM_STR);
            $stmt->bindValue(":pageNo", $order->getPageNo(), \PDO::PARAM_STR);
            $stmt->bindValue(":format", $order->getFormat(), \PDO::PARAM_STR);
            $stmt->bindValue(":referencesNo", $order->getReferencesNo(), \PDO::PARAM_INT);
            $stmt->bindValue(":deadline", $order->getDeadline(), \PDO::PARAM_STR);
            $stmt->bindValue(":attachment1", $order->getAttachment1(), \PDO::PARAM_STR);
            $stmt->bindValue(":attachment2", $order->getAttachment2(), \PDO::PARAM_STR);
            $stmt->bindValue(":attachment3", $order->getAttachment3(), \PDO::PARAM_STR);
            $stmt->bindValue(":attachment4", $order->getAttachment4(), \PDO::PARAM_STR);
            $stmt->bindValue(":attachment5", $order->getAttachment5(), \PDO::PARAM_STR);
            $stmt->bindValue(":orderStatus", $order->getOrderStatus(), \PDO::PARAM_STR);

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

    public function update(Order $order, $id)
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("UPDATE orders SET clientEmail=:clientEmail, discipline=:deadline,projectType=:projectType,
                                  pageNo=:pageNo,format=:format, referencesNo=:referencesNo, deadline=:deadline,
                                   attachment1=:attachment1, attachment2=:attachment2,attachment3=:attachment3,
                                   attachment4=:attachment4, attachment5=:attachment5, orderStatus=:orderStatus
                                   WHERE id=:id
                                   ");

            $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
            $stmt->bindValue(":clientEmail", $order->getClientEmail(), \PDO::PARAM_STR);
            $stmt->bindValue(":discipline", $order->getDiscipline(), \PDO::PARAM_STR);
            $stmt->bindValue(":projectType", $order->getProjectType(), \PDO::PARAM_STR);
            $stmt->bindValue(":pageNo", $order->getPageNo(), \PDO::PARAM_STR);
            $stmt->bindValue(":format", $order->getFormat(), \PDO::PARAM_STR);
            $stmt->bindValue(":referencesNo", $order->getReferencesNo(), \PDO::PARAM_INT);
            $stmt->bindValue(":deadline", $order->getDeadline(), \PDO::PARAM_STR);
            $stmt->bindValue(":attachment1", $order->getAttachment1(), \PDO::PARAM_STR);
            $stmt->bindValue(":attachment2", $order->getAttachment2(), \PDO::PARAM_STR);
            $stmt->bindValue(":attachment3", $order->getAttachment3(), \PDO::PARAM_STR);
            $stmt->bindValue(":attachment4", $order->getAttachment4(), \PDO::PARAM_STR);
            $stmt->bindValue(":attachment5", $order->getAttachment5(), \PDO::PARAM_STR);
            $stmt->bindValue(":orderStatus", $order->getOrderStatus(), \PDO::PARAM_STR);

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

    public static function delete($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("DELETE FROM orders WHERE id=:id");
            $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
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

    public static function getId($id)
    {
        $db = new DB();
        $conn = $db->connect();

        try{

            $stmt = $conn->prepare("SELECT t.* FROM orders t WHERE t.id=:id");
            $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
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

            $stmt = $conn->prepare("SELECT t.* FROM orders t WHERE t.id=:id");
            $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
            $stmt->setFetchMode(\PDO::FETCH_CLASS |\PDO::FETCH_PROPS_LATE, Order::class);
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

            $stmt = $conn->prepare("SELECT t.* FROM orders t WHERE 1");
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


}