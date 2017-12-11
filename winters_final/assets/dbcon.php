<?php
/**
 Jesse Winters
 */
function dbcon()
{
    $dsn = "mysql:host=localhost; dbname=phpclassfall2017";
    $username = "PHPClassFall2017";
    $password = "SE266";
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("error connecting to database");
    }
}
