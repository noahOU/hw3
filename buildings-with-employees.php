<?php
require_once("util-db.php");
require_once("model-buildings-with-employees.php");

$pageTitle = "Buildings with Employees";
include "view-header.php";
$buildings = selectBuildings();
include "view-buildings-with-employees.php";
include "view-footer.php";
?>
