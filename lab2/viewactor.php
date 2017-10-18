<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/18/2017
 * Time: 12:35 PM
 */
require_once ("assets/dbcon.php");
require_once("assets/actors.php");
include_once("assets/header.php");
$db = dbcon();
echo( getActorsAsTable($db));
include_once ("assets/footer.php");