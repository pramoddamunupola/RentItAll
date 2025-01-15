<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['phone'])) {
        echo "Please fill in all fields!";
    } else {
        // Sanitize and escape input to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        
        // SQL query to insert data into the database
        $sql = "INSERT INTO account_details (Username, Password, Email, PhoneNumber) 
                VALUES ('$username', '$password', '$email', '$phone')";

        if (mysqli_query($conn, $sql)) {
            echo "<html>
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
        </html>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>
