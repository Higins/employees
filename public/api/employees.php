<?php
/*
 * conducting operations with employees
 */
require "../../bootstrap.php";
require "../../src/handler/EmployeesHandler.php";

//update an existing employee
if (isset($_REQUEST['employees'])) {
    $updateEmployees = new EmployeesHandler();
    if ($updateEmployees->updateEmployees($_POST['employees']['emp_no'], $entityManager, $_POST)) {
        header('Location: http://localhost/');
        exit();
    }
}

//delete an existing employee
if (isset($_REQUEST['delete'])) {
    $updateEmployees = new EmployeesHandler();
    if ($updateEmployees->deleteEmployees($_REQUEST['delete'], $entityManager)) {
        header('Location: http://localhost/');
        exit();
    }
}