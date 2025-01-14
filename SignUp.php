<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO account_details (Username, Password, Email, PhoneNumber) 
            VALUES ('" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
