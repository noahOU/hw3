<?php
require_once("util-db.php");
require_once("model-employees-by-manager.php");

$pageTitle = "Employees by Manager";
include "view-header.php";
$employees = selectEmployeesByManager($_GET['id']);
include "view-employees-by-manager.php";
include "view-footer.php";
?>
