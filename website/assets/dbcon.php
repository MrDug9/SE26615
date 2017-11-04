<?php
/**
 * Created by PhpStorm.
 * User: gamer
 * Date: 11/4/2017
 * Time: 3:25 PM
 */
function dbcon()
{
    $dsn = "mysql:host=198.71.227.89:3306; dbname=betaTheaTau";
    $username = "blogBot";
    $password = "C9j7of?4";
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die($e/*"error connecting to database"*/);
    }
}