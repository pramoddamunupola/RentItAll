<html>
    <head></head>
<body>
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
<br>
<div style="text-align: left; margin-top: 20px;">
    <button type="button" 
        onclick="window.location.href='SignIn.html';" 
        style="padding: 10px 20px; background-color:rgb(26, 71, 19); color: white; border: none; border-radius: 5px; cursor: pointer;">
        Back to Sign In
    </button>
</div>
</body>
</html>