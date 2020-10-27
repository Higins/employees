<?php
/*
 * Manage the table on the main page and its associated pager
 */
require "../../bootstrap.php";
require "../../src/handler/PagerHandler.php";

//returns the requested information based on the page number
if (isset($_REQUEST['pageNumber'])) {
    $pageHandler = new PagerHandler(20, 'Employees');
    echo $pageHandler->indexPage($_REQUEST['pageNumber'], $entityManager);
}
?>


