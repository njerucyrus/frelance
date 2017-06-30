<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/30/17
 * Time: 9:25 AM
 */

namespace Hudutech\Entity;


class Order
{
    private $id;
    private $discipline;
    private $projectType;
    private $pageNo;
    private $referencesNo;
    private $format;
    private $deadline;
    private $attachment1;
    private $attachment2;
    private $attachment3;
    private $attachment4;
    private $attachment5;

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
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * @param mixed $discipline
     */
    public function setDiscipline($discipline)
    {
        $this->discipline = $discipline;
    }

    /**
     * @return mixed
     */
    public function getProjectType()
    {
        return $this->projectType;
    }

    /**
     * @param mixed $projectType
     */
    public function setProjectType($projectType)
    {
        $this->projectType = $projectType;
    }

    /**
     * @return mixed
     */
    public function getPageNo()
    {
        return $this->pageNo;
    }

    /**
     * @param mixed $pageNo
     */
    public function setPageNo($pageNo)
    {
        $this->pageNo = $pageNo;
    }

    /**
     * @return mixed
     */
    public function getReferencesNo()
    {
        return $this->referencesNo;
    }

    /**
     * @param mixed $referencesNo
     */
    public function setReferencesNo($referencesNo)
    {
        $this->referencesNo = $referencesNo;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return mixed
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param mixed $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    /**
     * @return mixed
     */
    public function getAttachment1()
    {
        return $this->attachment1;
    }

    /**
     * @param mixed $attachment1
     */
    public function setAttachment1($attachment1)
    {
        $this->attachment1 = $attachment1;
    }

    /**
     * @return mixed
     */
    public function getAttachment2()
    {
        return $this->attachment2;
    }

    /**
     * @param mixed $attachment2
     */
    public function setAttachment2($attachment2)
    {
        $this->attachment2 = $attachment2;
    }

    /**
     * @return mixed
     */
    public function getAttachment3()
    {
        return $this->attachment3;
    }

    /**
     * @param mixed $attachment3
     */
    public function setAttachment3($attachment3)
    {
        $this->attachment3 = $attachment3;
    }

    /**
     * @return mixed
     */
    public function getAttachment4()
    {
        return $this->attachment4;
    }

    /**
     * @param mixed $attachment4
     */
    public function setAttachment4($attachment4)
    {
        $this->attachment4 = $attachment4;
    }

    /**
     * @return mixed
     */
    public function getAttachment5()
    {
        return $this->attachment5;
    }

    /**
     * @param mixed $attachment5
     */
    public function setAttachment5($attachment5)
    {
        $this->attachment5 = $attachment5;
    }


}