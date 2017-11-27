<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 11/13/2017
 * Time: 12:11 PM
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? NULL;
require_once ("assets/dbcon.php");


include_once ("assets/siteForm.php");
if(isset($_POST['action'])) {

    if($_POST['action'] == "submit") {
        if (!preg_match("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $_POST['site'])) {
            echo "Please enter a valid website";
        } else {
            $sitesFound = siteFind(dbcon(), $_POST['site']);
            if ($sitesFound == 0) {
                $sites = array();
                $file = file_get_contents($_POST['site']);
                echo "<b>" . preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $file, $matches, PREG_OFFSET_CAPTURE) . " link(s) found for </b>\"<a href='" . $_POST['site'] . "'>" . $_POST['site'] . "</a>\"<br><hr>";
                preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $file, $matches, PREG_OFFSET_CAPTURE);
                foreach ($matches as $match) {
                    foreach ($match as $m) {
                        array_push($sites, $m[0]);
                        echo "<a href='" . $m[0] . "'>" . $m[0] . "</a><br>";
                    }
                }
                addSite(dbcon(), $_POST['site']);
            } else {
                echo $_POST['site'] . " already in the database<br>";
                echo $sitesFound;
            }
        }
    }
    if($_POST['action'] == "search") {

        $sites = array();
        $file = file_get_contents($_POST['ddsite']);
        echo "<b>" . preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $file, $matches, PREG_OFFSET_CAPTURE) . " link(s) found for </b>\"<a href='" . $_POST['ddsite'] . "'>" . $_POST['site'] . "</a>\"<br><hr>";
        preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $file, $matches, PREG_OFFSET_CAPTURE);
        foreach ($matches as $match) {
            foreach ($match as $m) {
                array_push($sites, $m[0]);
                echo "<a href='" . $m[0] . "'>" . $m[0] . "</a><br>";
            }
        }
    }

}







