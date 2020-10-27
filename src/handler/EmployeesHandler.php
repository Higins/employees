<?php

use Doctrine\ORM\EntityManagerInterface;

/**
 * Class EmployeesHandler
 * basic operations used in the keypad, it performs the update and deletion of employees
 */
class EmployeesHandler
{
    /**
     * @param $employees_id
     * @param EntityManagerInterface $entityManager
     * @param $data
     * @return bool
     * @throws \Doctrine\DBAL\ConnectionException
     * updating employees based on incoming information if something doesn’t change doesn’t change it
     */
    public function updateEmployees($employees_id, EntityManagerInterface $entityManager, $data)
    {
        $entityManager->getConnection()->beginTransaction();
        try {
            $employees = $entityManager->getRepository('Employees')->findOneBy(['emp_no' => $employees_id]);
            $employees->setBirthDate($data['employees']['birth_date']);
            $employees->setFirstName($data['employees']['first_name']);
            $employees->setLastName($data['employees']['last_name']);
            $employees->setGender($data['employees']['gender']);
            $employees->setHireDate($data['employees']['hire_date']);
            $entityManager->persist($employees);
            $entityManager->flush();
            $deptEmp = $entityManager->getRepository('DeptEmp')->findOneBy(['emp_no' => $employees_id]);
            $deptEmp->setDeptNo($data['deptemp']['dept_no']);
            $entityManager->persist($deptEmp);
            $entityManager->flush();
            $salaries = $entityManager->getRepository('Salaries')->findOneBy(['emp_no' => $employees_id]);
            $salaries->setSalary($data['salaries']['salary']);
            $entityManager->persist($salaries);
            $entityManager->flush();
            $title = $entityManager->getRepository('Titles')->findOneBy(['emp_no' => $employees_id]);
            $title->setTitle($data['titles']['title']);
            $entityManager->persist($title);
            $entityManager->flush();
            $entityManager->getConnection()->commit();
            return true;
        } catch (Exception $exception) {
            $entityManager->getConnection()->rollBack();
            throw $exception;
        }

    }

    /**
     * @param $employees_id
     * @param EntityManagerInterface $entityManager
     * @return bool
     * delete employees by ID used from all databases
     */
    public function deleteEmployees($employees_id, EntityManagerInterface $entityManager)
    {
        $employees = $entityManager->getRepository('Employees')->findOneBy(['emp_no' => $employees_id]);
        $deptEmp = $entityManager->getRepository('DeptEmp')->findOneBy(['emp_no' => $employees_id]);
        $salaries = $entityManager->getRepository('Salaries')->findOneBy(['emp_no' => $employees_id]);
        $deptManager = $entityManager->getRepository('DeptManager')->findOneBy(['emp_no' => $employees_id]);
        $titles = $entityManager->getRepository('Titles')->findOneBy(['emp_no' => $employees_id]);
        if ($employees) {
            $entityManager->remove($employees);
            $entityManager->flush();
        }
        if ($deptEmp) {
            $entityManager->remove($deptEmp);
            $entityManager->flush();
        }
        if ($salaries) {
            $entityManager->remove($salaries);
            $entityManager->flush();
        }
        if ($deptManager) {
            $entityManager->remove($deptManager);
            $entityManager->flush();
        }
        if ($titles) {
            $entityManager->remove($titles);
            $entityManager->flush();
        }
        return true;
    }

}