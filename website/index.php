<?php
/**
 * Created by PhpStorm.
 * User: gamer
 * Date: 10/29/2017
 * Time: 10:15 AM
 */
session_start();
$_SESSION["login"] = false;
require_once ("assets/dbcon.php");
require_once ("assets/func.php");
$db = dbcon();




$title = "Home";
$presName = "FILLER";
$sargName = "FILLER";
$secName = "FILLER";
$treaName = "FILLER";
$viceName = "FILLER";
$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
include ("assets/header.php");
if($_SESSION["login"] == false){
    include_once("assets/login.php");
    $uName = filter_input(INPUT_POST, "uname", FILTER_SANITIZE_STRING);
    $pw = filter_input(INPUT_POST, "pw", FILTER_SANITIZE_STRING);
}



//include_once ("assets/carousel.php");


switch ($action){
    case('log'):
        echo(conTest($db,$uName, $pw));
    case('login'):

    case('home'):

        include ("assets/carousel.php");

}
include ("assets/footer.php");
