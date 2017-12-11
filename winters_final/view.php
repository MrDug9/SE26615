<?php
/**
 Jesse Winters
 */
require_once ("assets/dbcon.php");
require_once ("assets/functions.php");
include_once ("assets/header.php");


echo(viewCon(dbcon())); //runs the view function



include_once ("assets/footer.php");