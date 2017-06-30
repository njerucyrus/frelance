<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/30/17
 * Time: 11:28 AM
 */

namespace Hudutech\Entity;


class Payment
{
    private $id;
    private $orderId;
    private $txnId;
    private $email;
    private $amount;
    private $paymentStatus;
    private $datePaid;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return mixed
     */
    public function getTxnId()
    {
        return $this->txnId;
    }

    /**
     * @param mixed $txnId
     */
    public function setTxnId($txnId)
    {
        $this->txnId = $txnId;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * @param mixed $paymentStatus
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
    }

    /**
     * @return mixed
     */
    public function getDatePaid()
    {
        return $this->datePaid;
    }

    /**
     * @param mixed $datePaid
     */
    public function setDatePaid($datePaid)
    {
        $this->datePaid = $datePaid;
    }

}