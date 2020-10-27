<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="departments")
 */
class Departments {
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $dept_no;
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $dept_name;

    /**
     * @return mixed
     */
    public function getDeptNo()
    {
        return $this->dept_no;
    }

    /**
     * @return mixed
     */
    public function getDeptName()
    {
        return $this->dept_name;
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
     * @param $dept_name
     * @return mixed
     */
    public function setDeptName($dept_name)
    {
        return $this->dept_name = $dept_name;
    }
}