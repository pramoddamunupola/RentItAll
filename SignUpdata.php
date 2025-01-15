<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['phone'])) {
        echo "Please fill in all fields!";
    } else {
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        
       
        $sql = "INSERT INTO account_details (Username, Password, Email, PhoneNumber) 
                VALUES ('$username', '$password', '$email', '$phone')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Your account created successfully!!!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>
