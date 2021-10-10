<?php

$mysqli = new mysqli("localhost", "root", "", "payment");
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 else{
// Print host information
echo "Connect Successfully. Host info: " . $mysqli->host_info;
 }

// define variables and set to empty values
if (isset($_POST['submit'])){
    $a = $_POST["fullname"];
    $b = $_POST["phonenm"];

    $c = $_POST["addresses"];

    $d = $_POST["city"];
  
    $e =$_POST["select_box_value"];
  
    $f = $_POST["cardnam"];
  
    $g = $_POST["total"];
    $h = $_POST["dates"];

    


$sql="INSERT INTO paymenttable (fullname,phonenm,addresses,city,select_box_value,cardnam,total,dates) VALUES ('$a','$b','$c','$d','$e','$f','$g','$h')";


$mysqli->query($sql);
}
$mysqli->close();

?>
