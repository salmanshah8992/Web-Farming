
<?php
    if(isset($_POST['submit'])){

    
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'payment';
    $conn = new mysqli($hostname,$username,$password,$dbname);
    $userphone = trim($_POST['phone']);
    echo $userphone;
    $userpsw = trim($_POST['psw']);
    if($conn->connect_error){
        echo " Connection error !";
    }else{
        //$sql = "SELECT * FROM result_table  WHERE result_table.gmail_id=$userphone AND result_table.gmail_id=$userpsw ."'";  
        $sql = "SELECT * FROM signups WHERE phone='$userphone' &&  psw='$userpsw' "; 
        //echo ($sql);
        $result = mysqli_query($conn, $sql);
        $count = 0;
        while($row = mysqli_fetch_assoc($result)){ 
            $count +=1;
        }

        if($count>0){
            //echo " You Have Successfully Logged in";
            echo ("<script>alert('You Have Successfully Logged in')</script>");            
            header("Location:  cart.html");
            //exit();
        }
        else{
            //echo " You Have Entered Incorrect Password";
            echo ("<script>alert('Entered Incorrect Phone Or Password')</script>");
            //header("Location:  signin.html");
            //exit();
        }
    }
}
?>



