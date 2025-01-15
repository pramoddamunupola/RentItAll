<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Replace with your actual database validation logic
    $correct_email = "user@example.com";
    $correct_password = "password123";

    if ($email === $correct_email && $password === $correct_password) {
        // Successful login logic
        header("Location: dashboard.php"); // Replace "dashboard.php" with your target page
        exit();
    } else {
        // Redirect back to the login page with an error message
        $error = "Invalid username or password";
        header("Location: SignIn.html?error=" . urlencode($error));
        exit();
    }
}
?>
