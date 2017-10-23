<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/23/2017
 * Time: 11:39 AM
 */
require_once ("assets/dbcon.php");
require_once ("assets/corp.php");
include_once("assets/header.php");
?><a href="add.php">Add Company</a> <?php
$db=dbcon();
echo(getCorpsAsRow($db));

include_once("assets/footer.php");
?>