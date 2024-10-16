<?php
require_once("util-db.php");
require_once("model-buildings-with-employees.php");

$pageTitle = "Managers with Employees";
include "view-header.php";
$managers = selectManagers();
include "view-managers-with-employees.php";
include "view-footer.php";
?>
