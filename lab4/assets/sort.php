<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 11/1/2017
 * Time: 1:03 PM
 */
function sortCorp ($db,$){
    try {
        $sql = $db->prepare("SELECT * FROM corps WHERE id=".$id); //selects the one record to view
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            foreach ($corps as $corp){

                $table .= "<tr><td><label for='Name'>Company:</label> " . $corp["corp"];

                $table .= " <label for='incorp'>Incorporation Date:</label> " . $corp["incorp_dt"];
                $table .= " <label for='email'>Email:</label> " . $corp["email"];
                $table .= " <label for='zip'>Zipcode:</label> " . $corp["zipcode"];
                $table .= " <label for='owner'>Owner:</label> " . $corp["owner"];
                $table .= " <label for='phone'>Phone Number:</label> " . $corp["phone"];
                $table .= "|<a href='index.php'>View</a>|";
                $table .= "<a href='update.php?id=".$corp["id"]."'>Update</a>|";
                $table .= "<a href='delete.php?id=".$corp["id"]."'>Delete</a>|</td></tr>";

            }

            $table .= "</table>" . PHP_EOL;
        }else{
            $table = "No corps found";
        }
        return $table;
    }catch (PDOException $e){
        die("problem with the corps table");
    }

}