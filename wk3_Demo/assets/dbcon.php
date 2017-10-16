<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/16/2017
 * Time: 12:08 PM
 */
function dbcon()
{
    $dsn = "mysql:host=localhost; dbname=test";
    $username = "test";
    $password = "se266";
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("There is problem. GO AWAY!!!");
    }
}
