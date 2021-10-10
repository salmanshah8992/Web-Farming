<?php

$link = mysqli_connect("localhost", "root","", "payment");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
echo "Successfufly";

$sql="SELECT * FROM  paymenttable";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
        echo "<table border=1 >";
        echo "<tr>";
        
        echo "<th>আইডি</th>";
        echo "<th>নাম</th>";
        echo "<th>ফোন নম্বর</th>";
        echo "<th>ঠিকানা</th>";
        echo "<th>শহর</th>";
        echo "<th>কার্ড /অ্যাকাউন্ট এর ধরন</th>";
        echo "<th>কার্ড /অ্যাকাউন্ট এর নম্বর</th>";
        echo "<th>সর্বমোট</th>";
        echo "<th>তারিখ</th>";
    echo "</tr>";
    echo "</tr>";
        

       echo "</tr>";
    

    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td>" . $row['id'] ."</td>";
            echo "<td>" . $row['fullname'] ."</td>";
            echo "<td>" . $row['phonenm'] . "</td>";
            echo "<td>" . $row['addresses'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['select_box_value'] . "</td>";
            echo "<td>" . $row['cardnam'] . "</td>";
            echo "<td>" . $row['total'] . "</td>";
            echo "<td>" . $row['dates'] . "</td>";
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
