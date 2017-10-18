<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/16/2017
 * Time: 12:15 PM
 */
function getActorsAsTable ($db){
    try {
        $sql = $db->prepare("SELECT * FROM actors");
        $sql->execute();
        $actors = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            foreach ($actors as $actor){
                $table  .="<tr><td>" . $actor['firstname'];
                $table  .="</td><td>" . $actor['lastname'];
                $table .="</td><td>" . $actor['dob'];
                $table .="</td><td>" . $actor['height'];
                $table .="</td></tr>";
            }

            $table .= "</table>" . PHP_EOL;
        }else{
            $table = "No actors found";
        }
        return $table;
    }catch (PDOException $e){
        die("problem with the actors table");
    }
}
function addActor ($db, $fname, $lname, $dob, $height){
    try {
        $sql = $db->prepare("INSERT INTO actors VALUES(null, :fname, :lname, :dob, :height)");
        $sql->bindParam(':fname', $fname);
        $sql->bindParam(':lname', $lname);
        $sql->bindParam(':dob', $dob);
        $sql->bindParam(':height', $height);
        $sql->execute();
        echo $sql->rowCount() . " rows inserted.";
    } catch(PDOException $e){
        $e->getMessage();
    }
}