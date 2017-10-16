<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/11/2017
 * Time: 1:10 PM
 */
$dsn = "mysql:host=localhost; dbname=phpclassfall2017";
$username = "phpclassfall2017";
$password = "classpass";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("There is problem. GO AWAY!!!");
}






?>