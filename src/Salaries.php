<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="salaries")
 */
class Salaries
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $emp_no;
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $salary;
    /**
     * @ORM\Column(type="date")
     */
    protected $from_date;
    /**
     * @ORM\Column(type="date")
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
    public function getSalary()
    {
        return $this->salary;
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
     * @param $salary
     * @return mixed
     */
    public function setSalary($salary)
    {
        return $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getFromDate()
    {
       return $this->from_date;
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
     * @return mixed
     */
    public function setFromDate($from_date)
    {
       return $this->from_date = $from_date;
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