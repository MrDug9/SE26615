<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/11/2017
 * Time: 1:22 PM
 */
$dsn = "mysql:host=localhost; dbname=test";
$username = "test";
$password = "se266";
try {
$db = new PDO($dsn, $username, $password);
} catch (PDOException $e){
    die("There is problem. GO AWAY!!!");
}

?>
<form method="post" action="#">
    name: <input type="text" name="name" /><br />
    gender: M <input type="radio" name="gender" value="M" />
    F <input type="radio" name="gender" value="M" /><br />
    fixed <input type="checkbox" name="fixed" value="T" />
    <input type="submit" name="submit" value="Do It" />
</form>