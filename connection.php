<?php

$host = "localhost";      
$username = "rentital_root";        
$password = "rentitall@123456";           
$database = "rentital_rentitall"; 


$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "";
}


// $conn->close();
?>
