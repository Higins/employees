<?php
require "../bootstrap.php";
$employees = $entityManager->getRepository(Employees::class)->findBy(array('emp_no' => $_GET['emp_no']));
$deptemp = $entityManager->getRepository(DeptEmp::class)->findBy(array('emp_no' => $_GET['emp_no']));
$salaries = $entityManager->getRepository(Salaries::class)->findBy(array('emp_no' => $_GET['emp_no']));
$departments = $entityManager->getRepository(Departments::class)->findAll();
$titles = $entityManager->getRepository(Titles::class)->findBy(array('emp_no' => $_GET['emp_no']));

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
    <title>Update</title>
</head>
<body>
<div class="container">
    <form method="post" action="api/employees.php">
        <input type="hidden" name="employees[emp_no]" value="<?php echo $_GET['emp_no']; ?>">
        <div class="form-group">
            <label for="birthDate">Birth date</label>
            <input type="text" class="form-control" id="birthDate" name="employees[birth_date]"
                   value="<?php echo $employees[0]->getBirthDate() ?>">
        </div>
        <div class="form-group">
            <label for="fname">First name</label>
            <input type="text" class="form-control" id="fname" name="employees[first_name]"
                   value="<?php echo $employees[0]->getFirstName() ?>">
        </div>
        <div class="form-group">
            <label for="lname">Last name</label>
            <input type="text" class="form-control" id="lname" name="employees[last_name]"
                   value="<?php echo $employees[0]->getLastName() ?>">
        </div>
        <div class="form-group">
            <label for="hireDate">Hire date</label>
            <input type="text" class="form-control" id="hireDate" name="employees[hire_date]"
                   value="<?php echo $employees[0]->getHireDate() ?>">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="titles[title]"
                   value="<?php echo $titles[0]->getTitle() ?>">
        </div>
        <div class="form-group">
            <label for="hireDate">Gender</label>
            <select class="form-control" id="hireDate" name="employees[gender]">
                <option value="M" <?= ($employees[0]->getGender()) == 'M' ? 'selected' : '' ?>>Male</option>
                <option value="F" <?= ($employees[0]->getGender()) == 'F' ? 'selected' : '' ?>>Famale</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Departments">Departments</label>
            <select class="form-control" id="Departments" name="deptemp[dept_no]">
                <?php
                foreach ($departments as $department) :
                    ?>
                    <option value="<?php echo $department->getDeptNo(); ?>" <?= ($deptemp[0]->getDeptNo() == $department->getDeptNo()) ? 'selected' : '' ?>><?php echo $department->getDeptName(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="salaries">Salaries</label>
            <input type="text" class="form-control" id="salaries" name="salaries[salary]"
                   value="<?php echo $salaries[0]->getSalary() ?>">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

</body>
</html>