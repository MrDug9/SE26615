<?php
require_once ("assets/dbcon.php");
require_once ("assets/dogs.php");
include_once("assets/header.php");
var_dump( getDogsAsTable(dbcon()));
include_once ("assets/footer.php");
?>

