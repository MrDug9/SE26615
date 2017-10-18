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
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING) ?? "";
$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING) ?? "";
$dob = filter_input(INPUT_POST, 'dob', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[MF]$/'))) ?? "";
$height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_BOOLEAN) ?? false;
switch ($action){
    case "Add":
        addActor($db, $fname, $lname, $dob, $height);
        break;
}
include_once("assets/actorform.php");
include_once("assets/footer.php");