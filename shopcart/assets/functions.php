<?php
/**
 * Created by PhpStorm.
 * User: gamer
 * Date: 12/6/2017
 * Time: 2:22 AM
 */

function getCat($db){
    try {
        $sql = $db->prepare("SELECT * FROM categories WHERE 0=0");
        $sql->execute();
        $cats = $sql->fetchAll(PDO::FETCH_ASSOC);

        $out = "";
        foreach ($cats as $cat){
            $out .="<option value='".$cat["category_id"]."'>".$cat["category"]."</option>";
        }
        return $out;
    }catch (PDOException $e){
        die("ERROR");
    }
}

function showProd($db,$sort = null){
    try {

        if($sort == null) {
            $sql = $db->prepare("SELECT * FROM products WHERE 0=0");
        }
        if($sort != null){
            $sql = $db->prepare("SELECT * FROM products WHERE category_id=".$sort." ");
        }



        $sql->execute();
        $prods = $sql->fetchAll(PDO::FETCH_ASSOC);



        $out = "<div><table><tr><th>Product</th><th>Price</th><th>Image</th></tr>";
        foreach ($prods as $prod){
            $out .="<tr>";
            $out .="<td>".$prod["product"]."</td>";
            $out .="<td>".$prod["price"]."</td>";
            $out .="<td>".$prod["image"]."</td>";
            $out .="</tr>";
        }
        $out.="</table></div>";
        return $out;
    }catch (PDOException $e){
        die("ERROR");
    }
}

function encrypte($db){
    $path = 'assets/maxresdefault.jpg';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    echo($base64);
    try {
        $sql = $db->prepare("INSERT INTO products VALUES(null, 1, test, 9.90, :image)");
        $sql->bindparam(':image',$base64);
        $sql->execute();
        echo $sql->rowCount() . " rows inserted.";
    } catch(PDOException $e){
        $e->getMessage();
    }
}

function base64_to_jpeg( $base64_string, $output_file ) {
    $ifp = fopen( $output_file, "wb" );
    fwrite( $ifp, base64_decode( $base64_string) );
    fclose( $ifp );
    return( $output_file );
}

function addprod ($db, $cat, $prod, $price){
    try {
        $sql = $db->prepare("INSERT INTO products VALUES(null, :cat, :prod, :price, null)");
        $sql->bindParam(':cat', $cat);
        $sql->bindParam(':prod', $prod);
        $sql->bindParam(':price', $price);
        $sql->execute();
        echo $sql->rowCount() . " rows inserted.";
    } catch(PDOException $e){
        $e->getMessage();
    }
}

function deleteProd($db, $id){

    try {
        $sql = $db->prepare("DELETE FROM products WHERE product_id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        echo $sql->rowCount() . " rows deleted.";
    }catch (PDOException $e){
        die($e/*"problem with the corps table"*/);
    }
}
function updateProd($db, $cat, $prod, $price, $id){
    try {
        $sql = $db->prepare("UPDATE products SET corp = :corp, email = :email, zipcode = :zip, owner = :owner, phone = :phone WHERE id = :id");
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

