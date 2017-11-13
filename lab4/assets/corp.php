<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/16/2017
 * Time: 12:15 PM
 */
function getCorpsAsRow ($db, $col, $sortable = null){
    try {
        if($col == null) {
            $sql = $db->prepare("SELECT * FROM corps"); //selects all the records
        }
        if($col != null){
            $sql = $db->prepare("SELECT * FROM corps ORDER BY "."$col"." ASC");
        }
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            if (!$sortable) {

                $table .= "<tr><th>Company</th><th>Incorporation Date</th><th>Email</th><th>ZipCode</th><th>Owner</th><th>Phone</th><th>The Stuffs</th></tr>";

            }
            if ($sortable){

                $table .= "<tr><th><a href='?action=sort&col=corp'>Company</a></th><th><a href='?action=sort&col=incorp_dt'>Incorporation Date</a></th><th><a href='?action=sort&col=Email'>Email</a></th><th><a href='?action=sort&col=ZipCode'>ZipCode</a></th><th><a href='?action=sort&col=Owner'>Owner</a></th><th><a href='?action=sort&col=Phone'>Phone</a></th><th>The Stuffs</th></tr>";
            }
            foreach ($corps as $corp){

                $table .= "<td>" . $corp["corp"]."</td>";

                $table .= " <td>" . $corp["incorp_dt"]."</td>";
                $table .= " <td>" . $corp["email"]."</td>";
                $table .= " <td>" . $corp["zipcode"]."</td>";
                $table .= " <td>" . $corp["owner"]."</td>";
                $table .= " <td>" . $corp["phone"]."</td>";
                $table .= "<td>|<a href='read.php?id=".$corp["id"]."'>View</a>|";
                $table .= "<a href='update.php?id=".$corp["id"]."'>Update</a>|";
                $table .= "<a href='delete.php?id=".$corp["id"]."'>Delete</a>|</td></tr>";

            }

            $table .= "</table>" . PHP_EOL;
        }else{
            $table = "No Corps found";
        }
        return $table;
    }catch (PDOException $e){
        die("problem with the corps table");
    }
}
function readCorp ($db,$id){
    try {
        $sql = $db->prepare("SELECT * FROM corps WHERE id=".$id); //selects the one record to view
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            $table.="<tr><th>Company</th><th>Incorporation Date</th><th>Email</th><th>ZipCode</th><th>Owner</th><th>Phone</th><th>The Stuffs</th></tr>";
            foreach ($corps as $corp){

                    $table .= "<tr><td>" . $corp["corp"]."</td>";

                    $table .= " <td>" . $corp["incorp_dt"]."</td>";
                    $table .= " <td>" . $corp["email"]."</td>";
                    $table .= " <td>" . $corp["zipcode"]."</td>";
                    $table .= " <td>" . $corp["owner"]."</td>";
                    $table .= " <td>" . $corp["phone"]."</td>";
                    $table .= "<td>|<a href='index.php'>View</a>|";
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


function deleteCorp($db, $id){

    try {
        $sql = $db->prepare("DELETE FROM corps WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        echo $sql->rowCount() . " rows deleted.";
    }catch (PDOException $e){
        die($e/*"problem with the corps table"*/);
    }
}





function addCorp ($db, $corp, $email, $zip, $owner, $phone){
    try {
        $sql = $db->prepare("INSERT INTO corps VALUES(null, :corp, now(), :email, :zip, :owner, :phone)");
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zip', $zip);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        echo $sql->rowCount() . " rows inserted.";
    } catch(PDOException $e){
        $e->getMessage();
    }
}

function updateCorp ($db, $corp, $email, $zip, $owner, $phone, $id){
    try {
        $sql = $db->prepare("UPDATE corps SET corp = :corp, email = :email, zipcode = :zip, owner = :owner, phone = :phone WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zip', $zip);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        echo $sql->rowCount() . " rows updated.";
    } catch(PDOException $e){
        $e->getMessage();
    }
}