<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/25/2017
 * Time: 2:13 PM
 */
$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING)??filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING)?? "";
$db = dbcon();
try {
    $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $corps = $sql->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("problem with the corps table");
}
$form = "<form method='post' action='#'>" . PHP_EOL;
foreach ($corps as $corp) {

    $form .= "<label for='corp'>Company</label><input type='text' name='corp' value='" . $corp["corp"]."' /><br /> ";
    $form .= "<label for='email'>Email</label><input type='text' name='email' value='" . $corp['email'] . "' /><br />";
    $form .= "<label for='zip'>Zipcode</label><input type='text' name='zip' value='" . $corp['zipcode'] . "' /><br />";
    $form .= "<label for='owner'>Owner</label><input type='text' name='owner' value='" . $corp['owner'] . "' /><br />";
    $form .= "<label for='phone'>Phone Number</label><input type='text' name='phone' value='" . $corp['phone'] . "'/><br />";
    $form .= "<input type='submit' name='action' value='Submit' />";


}

$form .= "</form>" . PHP_EOL;
echo( $form);
?>