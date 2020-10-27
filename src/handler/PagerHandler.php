<?php

use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class PagerHandler
 * basic operations for scrolling and displaying the table
 */
class PagerHandler
{
    /**
     * @var
     * how much data should be on a page
     */
    public $pageSize;
    /**
     * @var
     * entity setting
     */
    public $entity;

    /**
     * PagerHandler constructor.
     * @param $pageSize
     * @param $entity
     */
    public function __construct($pageSize, $entity)
    {
        $this->pageSize = $pageSize;
        $this->entity = $entity;
    }

    /**
     * @param $page
     * @param EntityManagerInterface $entityManager
     * @return false|string
     * generates data related to the page
     */
    public function indexPage($page, EntityManagerInterface $entityManager)
    {
        $entity = $entityManager->getRepository($this->entity)->createQueryBuilder('e')->getQuery();
        $paginator = new Paginator($entity);
        $currentPage = $page ?? 1;
        $records = $paginator
            ->getQuery()
            ->setFirstResult($this->pageSize * ($currentPage - 1))
            ->setMaxResults($this->pageSize)
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        $returnData = [];
        foreach ($records as $record) {
            $info = [
                'position' => $this->getPosition($record['emp_no'],$entityManager),
                'salary' => $this->getSalary($record['emp_no'],$entityManager),
                'class' => $this->getClass($record['emp_no'],$entityManager),
            ];
            $returnData[] = array_merge($record, $info);
        }
        $data = [
            'items' => $returnData
        ];
        return json_encode($data);
    }

    /**
     * @param $employees_id
     * @param EntityManagerInterface $entityManager
     * @return mixed
     * returns her/his position on the basis of the employee
     */
    public function getPosition($employees_id, EntityManagerInterface $entityManager)
    {
        $deptEmp = $entityManager->getRepository(DeptEmp::class)->findBy(array('emp_no' => $employees_id));
        $departments = $entityManager->getRepository(Departments::class)->findBy(array('dept_no' => $deptEmp[0]->getDeptNo()));
        return $departments[0]->getDeptName();
    }

    /**
     * @param $employees_id
     * @param EntityManagerInterface $entityManager
     * @return mixed
     * returns her/his salary on the basis of the employee
     */
    public function getSalary($employees_id, EntityManagerInterface $entityManager)
    {
        $salaries = $entityManager->getRepository(Salaries::class)->findBy(array('emp_no' => $employees_id));
        return $salaries[0]->getSalary();
    }

    /**
     * @param $employees_id
     * @param EntityManagerInterface $entityManager
     * @return mixed
     * returns her/his class on the basis of the employee
     */
    public function getClass($employees_id, EntityManagerInterface $entityManager)
    {
        $title = $entityManager->getRepository(Titles::class)->findBy(array('emp_no' => $employees_id));
        return $title[0]->getTitle();
    }

}