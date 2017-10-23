<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/23/2017
 * Time: 2:03 PM
 */
require_once ("assets/dbcon.php");
require_once ("assets/corp.php");
include_once("assets/header.php");
$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING)??filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING)?? "";
$db = dbcon();
echo(deleteCorp($db,$id));
?><a href="index.php">View</a> <?php
include_once("assets/footer.php");
?>