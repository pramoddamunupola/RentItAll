<?php 
    $con = mysqli_connect("localhost","root",""); 
if (!$con) { 
    die('Could not connect: ' . mysqli_error($con)); 
} 

    mysqli_select_db($con , "my_db"); 
    $sql="INSERT INTO account_details (Username, Password, Email,PhoneNumber) 
    VALUES 
        ('$_POST[username]','$_POST[password]','$_POST[email]', '$_POST[phone]')"; 

if (!mysqli_query($con, $sql)) { 
    die('Error: ' . mysqli_error($con)); 
} 

echo "1 record added";
mysqli_close($con) 
?> 