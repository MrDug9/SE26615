<?php
/**
 Jesse Winters
 */
function addCon ($db, $email, $phone, $heard, $contact, $comments){
    try {
        $sql = $db->prepare("INSERT INTO account VALUES(null, :email, :phone, :heard, :contact, :comments)");
        $sql->bindParam(':email', $email);
        $sql->bindParam(':phone', $phone);
        $sql->bindParam(':heard', $heard);
        $sql->bindParam(':contact', $contact);
        $sql->bindParam(':comments', $comments);
        $sql->execute();
        echo $sql->rowCount() . " rows inserted.";
    } catch(PDOException $e){
        $e->getMessage();
    }
} //adds contacts to database

function viewCon ($db){
    try {
        $sql = $db->prepare("SELECT * FROM account"); //selects all the records
        $sql->execute();
        $acounts = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($sql->rowCount() > 0) {
            $table = "<table>" . PHP_EOL;
            $table .= "<tr><th>ID</th><th>Email</th><th>Phone</th><th>Heard</th><th>Contact</th><th>Comments</th></tr>";
            foreach ($acounts as $acount){


                $table .= "<tr><td>".$acount["id"]."</td>";
                $table .= "<td>".$acount["email"]."</td>";
                $table .= "<td>".$acount["phone"]."</td>";
                $table .= "<td>".$acount["heard"]."</td>";
                $table .= "<td>".$acount["contact"]."</td>";
                $table .= "<td>".$acount["comments"]."</td></tr>";

            }

            $table .= "</table>" . PHP_EOL;
        }else{
            $table = "No Accounts found";
        }
        return $table;
    }catch (PDOException $e){
        die("problem with the Account table");
    }
} //Pulls contacts into table to view