<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/23/2017
 * Time: 12:19 PM
 */
require_once ("assets/dbcon.php");
require_once ("assets/corp.php");
include_once("assets/header.php");
$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING)??filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING)?? "";
$db=dbcon();
echo(readCorp($db,$id));

include_once("assets/footer.php");