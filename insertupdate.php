<?php

$host = "localhost";
$user = "root";
$password ="";
$database = "payment";

$id = "";
$fullname = "";
$phonenm = "";
$addresses = "";
$city = "";
$select_box_value = "";
$cardnam = "";
$total = "";
$dates = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['fullname'];
    $posts[2] = $_POST['phonenm'];
    $posts[3] = $_POST['addresses'];
    $posts[4] = $_POST['city'];
    $posts[5] = $_POST['select_box_value'];
    $posts[6] = $_POST['cardnam'];
    $posts[7] = $_POST['total'];
    $posts[8] = $_POST['dates'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM paymenttable WHERE id = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
               

                $id =$row['id'] ;
                $fullname=$row['fullname'] ;
                $phonenm=$row['phonenm'] ;
                $addresses= $row['addresses'] ;
                $city= $row['city'] ;
                $select_box_value= $row['select_box_value'];
                $cardnam= $row['cardnam'];
                $total= $row['total'] ;
                $dates= $row['dates'] ;
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO paymenttable (fullname,phonenm,addresses,city,select_box_value,cardnam,total,dates) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]')";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM paymenttable WHERE id = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE paymenttable SET fullname='$data[1]',phonenm='$data[2]',addresses='$data[3]',city='$data[4]',select_box_value='$data[5]',cardnam='$data[6]',total='$data[7]',dates= '$data[8]' WHERE id= '$data[0]' ";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}



?>


<!DOCTYPE Html>
<html>
    <head>
        <title>PHP INSERT UPDATE DELETE SEARCH</title>
    </head>
    <body>
        <form action="insertupdate.php" method="post">
            <input type="number" name="id" placeholder="Id" value="<?php echo $id;?>"><br><br>
            <input type="text" name="fullname" placeholder=" Name" value="<?php echo $fullname;?>"><br><br>
            <input type="text" name="phonenm" placeholder="Phone" value="<?php echo $phonenm;?>"><br><br>
            <input type="text" name="addresses" placeholder="Address" value="<?php echo $addresses;?>"><br><br>
            <input type="text" name="city" placeholder="City" value="<?php echo $city;?>"><br><br>
            <input type="text" name="select_box_value" placeholder="Card /Account Type" value="<?php echo $select_box_value;?>"><br><br>
            <input type="text" name="cardnam" placeholder="Card/Account Number" value="<?php echo $cardnam;?>"><br><br>
            <input type="number" name="total" placeholder="Total" value="<?php echo $total;?>"><br><br>
            <input type="date" name="dates" placeholder="Date" value="<?php echo $dates;?>"><br><br>

            <div >
                <!-- Input For Add Values To Database-->
                <input  type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
                <!--  For Home -->
                
                <button type="button"><a href="index.html">Home</a></button>
            </div>
        </form>
    </body>
</html>
