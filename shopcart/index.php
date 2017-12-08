<?php
/**
 * Created by PhpStorm.
 * User: gamer
 * Date: 12/5/2017
 * Time: 6:51 PM
 */
require_once ("assets/dbcon.php");
require_once ("assets/functions.php");

include_once ("assets/header.php");
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? NULL;
$cat = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING)?? NULL;
$db = dbcon();


?>
<form method="get" action="index.php">
    <select name="cat">
        <option value="all">All</option>
        <?php echo(getCat($db)) ?>
    </select>
    <input type="submit">
</form>


<?php
        echo(showProd($db,$cat));
?>

