<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="employees")
 */
class Employees
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $emp_no;
    /**
     * @ORM\Column(type="string")
     */
    protected $birth_date;
    /**
     * @ORM\Column(type="string")
     */
    protected $first_name;
    /**
     * @ORM\Column(type="string")
     */
    protected $last_name;
    /**
     * @ORM\Column(type="string")
     */
    protected $gender;
    /**
     * @ORM\Column(type="string")
     */
    protected $hire_date;

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getHireDate()
    {
        return $this->hire_date;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

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
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * @param $gender
     * @return mixed
     */
    public function setGender($gender)
    {
        return $this->gender = $gender;
    }

    /**
     * @param $hire_date
     * @return mixed
     */
    public function setHireDate($hire_date)
    {
        return $this->hire_date = $hire_date;
    }

    /**
     * @param $last_name
     * @return mixed
     */
    public function setLastName($last_name)
    {
        return $this->last_name = $last_name;
    }

    /**
     * @param $first_name
     * @return mixed
     */
    public function setFirstName($first_name)
    {
        return $this->first_name = $first_name;
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
     * @param $birth_date
     * @return mixed
     */
    public function setBirthDate($birth_date)
    {
        return $this->birth_date = $birth_date;
    }

}