<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/16/2017
 * Time: 12:15 PM
 */
function getCorpsAsRow ($db){
    try {
        $sql = $db->prepare("SELECT * FROM corps");
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            foreach ($corps as $corp){

                $table .="<tr><td><label for='Name'>Company:</label> ".$corp["corp"];
                $table .="|<a href='read.php?id=".$corp["id"]."'>Read</a>|";
                $table .="<a href='update.php?id=".$corp["id"]."'>Update</a>|";
                $table .="<a href='delete.php?id=".$corp["id"]."'>Delete</a>|</td></tr>";

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
function readCorp ($db,$id){
    try {
        $sql = $db->prepare("SELECT * FROM corps");
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            foreach ($corps as $corp){
                if ($corp["id"] == $id) {
                    $table .= "<tr><td><label for='Name'>Company:</label> " . $corp["corp"];

                    $table .= " <label for='incorp'>Incorporation Date:</label> " . $corp["incorp_dt"];
                    $table .= " <label for='email'>Email:</label> " . $corp["email"];
                    $table .= " <label for='zip'>Zipcode:</label> " . $corp["zipcode"];
                    $table .= " <label for='owner'>Owner:</label> " . $corp["owner"];
                    $table .= " <label for='phone'>Phone Number:</label> " . $corp["phone"];
                    $table .= "|<a href='read.php'>Read</a>|";
                    $table .= "<a href='update.php'>Update</a>|";
                    $table .= "<a href='delete.php'>Delete</a>|</td></tr>";
                }
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