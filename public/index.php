<?php
require "../bootstrap.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://www.tablefilter.com/tablefilter/tablefilter.js"></script>
    <script src="js/sorttable.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js"></script>

    <title>Index</title>
</head>
<body>
<div id="wrapper" class="container">
    <input type="search" class="form-control search-data-table" data-table="search-table" placeholder="Filter">
    <table class="table search-table" id="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Full Name</th>
            <th scope="col">Current position</th>
            <th scope="col">Current salary</th>
            <th scope="col">Current class</th>
            <th scope="col" class="no-sort">Operations</th>
        </tr>
        </thead>
        <tbody id="rows">
        </tbody>
    </table>
    <nav>
        <ul class="pagination" id="page-numbers"></ul>
    </nav>
</div>
</body>
</html>