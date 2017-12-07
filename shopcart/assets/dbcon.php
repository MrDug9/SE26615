<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/30/2017
 * Time: 1:01 PM
 */
function dbcon()
{
    $dsn = "mysql:host=localhost; dbname=phpclassfall2017";
    $username = "PHPClassFall2017";
    $password = "classpass";
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die($e/*"error connecting to database"*/);
    }
}
