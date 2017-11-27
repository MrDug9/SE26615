<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 11/13/2017
 * Time: 12:15 PM
 */
?>
<form method="post" action="#">
    <label for="site">Enter URL</label><input type="text" name="site"/><br />
    <input type="submit" name="action" value="submit" />
    <?php
    echo(makeDD(dbcon()))
    ?>

    <input type="submit" name="action" value="search" />
</form>

<?php

function siteFind($db,$URL){
    try {
        $sql = $db->prepare("SELECT * FROM sites WHERE site= :url");
        $sql->bindParam(':url', $URL);
        $sql->execute();

        if ($sql->rowCount() < 1) {
            $out = 0;
        } else {
            $out = 1;
        }
        return ($out);
    }catch (PDOException $e){
        die($e);
    }
}

function addSite($db, $URL){
    try {
        $sql = $db->prepare("INSERT INTO sites VALUES(null, :site, now())");
        $sql->bindParam(':site', $URL);
        $sql->execute();
        echo $sql->rowCount() . " rows inserted.";
    } catch(PDOException $e){
        $e->getMessage();
    }
}

function makeDD($db){
    try {
        $sql = $db->prepare("SELECT * FROM sites WHERE 0=0");
        $sql->execute();
        $sites = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($sql->rowCount() > 0) {
            $dd = "<select name='ddsite'><option value=''>Select A Site</option>";
            foreach ($sites as $site){
                $dd.= "<option value='".$site['site']."'>".$site['site']."</option>";
            }
            $dd.="</select>".PHP_EOL;
        } else {
            $dd = "ERROR";
        }
        return $dd;
    }catch (PDOException $e){
        die("problem with Table");
    }
}



?>
