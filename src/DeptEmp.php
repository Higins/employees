<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dept_emp")
 */
class DeptEmp
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $emp_no;
    /**
     * @ORM\Column(type="string")
     */
    protected $dept_no;
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
    public function getDeptNo()
    {
       return $this->dept_no;
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
     * @param $dept_no
     * @return mixed
     */
    public function setDeptNo($dept_no)
    {
       return $this->dept_no = $dept_no;
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