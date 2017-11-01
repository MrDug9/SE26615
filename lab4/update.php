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
include_once("assets/updateForm.php");
$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING)??filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING)?? "";
$db = dbcon();


$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING)??"";
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING)??"";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)??"";
$zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING)??"";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING)?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)??"";
switch ($action){
    case "Submit":
        updateCorp($db, $corp, $email, $zip, $owner, $phone, $id);
        break;
}
?><a href="index.php">View</a> <?php
include_once("assets/footer.php");
?>