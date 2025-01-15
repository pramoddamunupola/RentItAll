<?php
session_start(); // Start the session

include("connection.php");

if (isset($_POST['SignIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check the user's credentials
    $sql = "SELECT * FROM account_details WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && $result->num_rows > 0) {
        // If the user is found, fetch the row
        $row = $result->fetch_assoc();

        // Store username and email in session
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['email'] = $row['email'];

        // Redirect to index.php after successful login
        header("Location: index.php");
        exit();
    } else {
        // Display error message and a button to redirect back to SignIn.php
        echo "
        <html>
        <body>
        <div style='text-align: left; margin-top: 20px;'>
            <p style='color: red;'>Incorrect Email or Password.</p>
            <button type='button' 
                onclick=\"window.location.href='SignIn.php';\" 
                style='padding: 10px 20px; background-color: rgb(5, 81, 16); color: white; border: none; border-radius: 5px; cursor: pointer;'>
                Back to Sign In
            </button>
        </div>
        </body>
        </html>
        ";
    }
}
?>
