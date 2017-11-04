<?php
/**
 * Created by PhpStorm.
 * User: gamer
 * Date: 11/4/2017
 * Time: 3:33 PM
 */
function conTest($db, $uName, $pw){
    try {
        $sql = $db->prepare("SELECT * FROM Users"); //selects all the records
        $sql->execute();
        $users = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($users as $user){
            if($uName == $user["UName"] && $pw == $user["PW"]){

                $_SESSION["login"] = true;

            }
        }



    }catch (PDOException $e){
        die($e);
    }
}