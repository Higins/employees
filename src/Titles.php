<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="titles")
 */
class Titles
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $emp_no;
    /**
     * @ORM\Column(type="string")
     */
    protected $title;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $from_date;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $to_date;

    /**
     * @return mixed
     */
    public function getEmpNo()
    {
        return $this->emp_no;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return$this->title;
    }

    /**
     * @param $emp_no
     * @return mixed
     */
    public function setEmpNo($emp_no)
    {
        return $this->emp_no = $emp_no;
    }

    /**
     * @param $title
     * @return mixed
     */
    public function setTitle($title)
    {
        return $this->title = $title;
    }

    /**
     *
     */
    public function getFromDate()
    {
        $this->from_date;
    }

    /**
     * @return mixed
     */
    public function getToDate()
    {
        return $this->to_date;
    }

    /**
     * @param $from_date
     */
    public function setFromDate($from_date)
    {
        $this->from_date = $from_date;
    }

    /**
     * @param $to_date
     * @return mixed
     */
    public function setToDate($to_date)
    {
        return $this->to_date = $to_date;
    }
}