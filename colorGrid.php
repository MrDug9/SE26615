<?php
$table = "<table>\n"; //open the table tag

for ($rows =1;$rows<=10;$rows++){
    $table .= "\t<tr>";
    for($cols=1;$cols<=10;$cols++){
        $hex = "#";
        for($ndx=0;$ndx<6;$ndx++){

            $temp = rand(0,15); //generates the random digit of hex decimal
            if($temp == 10){
                $temp = "A";
            }
            if($temp == 11){
                $temp = "B";
            }
            if($temp == 12){
                $temp = "C";
            }
            if($temp == 13){
                $temp = "D";
            }
            if($temp == 14){
                $temp = "E";
            }
            if($temp == 15) {
                $temp = "F";
            }

            $hex .= $temp; //accumulate hex code
        }
        $table .= "<td style='background-color:".$hex.";'><p>".$hex."</p><p style='color:white';>".$hex."</p></td>";
                        //output colors as style for table
    }
    $table .= "</tr>\n";

}
$table .= "</table>\n"; //close the table tag





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