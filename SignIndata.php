<?php

session_start();
include("connection.php");

if (isset($_POST['SignIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM account_details WHERE email = '$email' AND password = '$password';";
    $result = mysqli_query($conn, $sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: /rentitall-main/index.html"); 
        exit();
    } else {
        echo "Incorrect Email or Password";
    }
}
?>
