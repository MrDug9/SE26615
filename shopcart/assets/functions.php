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
            $out .="<option value='".$cat["category"]."'>".$cat["category"]."</option>";
        }
        return $out;
    }catch (PDOException $e){
        die("ERROR");
    }
}

function showProd($db){
    try {
        $sql = $db->prepare("SELECT * FROM products WHERE 0=0");
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