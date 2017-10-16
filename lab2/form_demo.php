<?php
/**
 * Created by PhpStorm.
 * User: 001317919
 * Date: 10/11/2017
 * Time: 1:22 PM
 */
$dsn = "mysql:host=localhost; dbname=test";
$username = "test";
$password = "se266";
try {
$db = new PDO($dsn, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("There is problem. GO AWAY!!!");
}
/*if ( isset($_POST['submit'])){
    $submit = $_POST['submit'];
}else{
    $submit = "";
}*/
//$submit = isset($_POST['submit']) ? $_POST['submit'] : ""; //ternary

$submit = $_POST['submit'] ?? ""; //null coalescence operator
if($submit == "Do It"){
    $name = $_POST['name'] ?? "";
    $gender = $_POST['gender'] ?? "NULL";
    $fixed = $_POST['fixed'] ?? false;
    try {
        $sql = $db->prepare("INSERT INTO animals VALUES(null, :name, :gender, :fixed)");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':gender', $gender);
        $sql->bindParam(':fixed', $fixed);
        $sql->execute();
        echo $sql->rowCount() . " rows inserted.";
    } catch(PDOException $e){
        $e->getMessage();
    }
}



?>
<form method="post" action="#">
    name: <input type="text" name="name" /><br />
    gender: M <input type="radio" name="gender" value="M" />
    F <input type="radio" name="gender" value="F" /><br />
    fixed <input type="checkbox" name="fixed" value="true" />
    <input type="submit" name="submit" value="Do It" />
</form>


<?php
$sql=$db-> prepare("SELECT * FROM animals");
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($results) ){
    foreach ($results as $dog){
        print_r($dog);
    }
}










