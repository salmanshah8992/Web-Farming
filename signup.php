<?php

$mysqli = new mysqli("localhost", "root", "", "payment");
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 else{
// Print host information
//echo "Connect Successfully. Host info: " . $mysqli->host_info;


// define variables and set to empty values
if (isset($_POST['submit'])){
    $a = $_POST["first_name"];
    $b = $_POST["last_name"];

    $c =$_POST["gender"];
  
    $d = $_POST["email"];
  
    $e = $_POST["phone"];
    $f = $_POST["img"];

    $g = $_POST["psw"];
 
    $h = $_POST["psw_repet"];
    $i = $_POST["remember"];



$sql="INSERT INTO signups (first_name,last_name,gender,email,phone,img,psw,psw_repet,remember) VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i')";


$mysqli->query($sql);
}
header("Location:  index.html");
}
$mysqli->close();

?>