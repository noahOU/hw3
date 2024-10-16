<?php
require_once("util-db.php");
require_once("model-buildings-by-employee.php");

$pageTitle = "Buildings by Employee";
include "view-header.php";
$buildings = selectBuildingsByEmployee($_POST['eid']);
include "view-buildings-by-employee.php";
include "view-footer.php";
?>
