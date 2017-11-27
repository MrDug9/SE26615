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
</form>

<?php

function siteFind($URL){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $out = curl_exec($ch);
    curl_close($ch);
    return($out);
}

function

?>
