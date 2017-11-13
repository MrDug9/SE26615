<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/23/2017
 * Time: 11:39 AM
 */
require_once ("assets/dbcon.php");
require_once ("assets/corp.php");
include_once("assets/header.php");
?><a href="add.php">Add Company</a> <a href="?action=sort">Show list</a><?php
$db=dbcon();
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? NULL;
$col=filter_input(INPUT_GET, 'col', FILTER_SANITIZE_STRING) ?? NULL;


switch($action) {
    case 'sort':
        $sortable = true;
        echo getCorpsAsRow($db,$col , $sortable);
        break;
}
include_once("assets/footer.php");
?>