<?php
$table = "<table>\n";
for ($rows =1;$rows<=10;$rows++){
    $table .= "\t<tr>";
    for($cols=1;$cols<=10;$cols++){
        $table .= "<td>".$rows * $cols."</td>";

    }
    $table .= "</tr>\n";

}
$table .= "</table>\n";





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Grid</title>
</head>
<body>
<?php echo $table; ?>
</body>
</html>