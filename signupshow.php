<?php

$link = mysqli_connect("localhost", "root","", "payment");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
echo "Successfufly";

$sql="SELECT * FROM  signups";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
        echo "<table border=1 >";
        echo "<tr>";
        
        echo "<th>আইডি</th>";
        echo "<th>First_Name</th>";
        echo "<th>Last_Name</th>";
        echo "<th>Gender</th>";
        echo "<th>Email</th>";
        echo "<th>Phone Number</th>";
        echo "<th>Add Image</th>";
        echo "<th>Password</th>";
        echo "<th>Re_Password</th>";
        echo "<th>Remember me</th>";
       
    echo "</tr>";
    echo "</tr>";
        

       echo "</tr>";
    

    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td>" . $row['id'] ."</td>";
            echo "<td>" . $row['first_name'] ."</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['img'] . "</td>";
            echo "<td>" . $row['psw'] . "</td>";
            echo "<td>" . $row['psw_repet'] . "</td>";
            echo "<td>" . $row['remember'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
   
    mysqli_free_result($result);
} else{
    echo "No records matching your query were found.";
}
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


mysqli_close($link);
?>
