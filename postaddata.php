<?php
session_start(); 
include("connection.php");

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verify the database connection
    if ($conn === false) {
        die("ERROR: Could not connect to the database.");
    }

    // Ensure the user is logged in
    if (!isset($_SESSION['Username'])) {
        die("ERROR: You must be logged in to add a post.");
    }

    // Retrieve and sanitize form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $email = mysqli_real_escape_string($conn, $_SESSION['Username']); // Logged-in user's email

    // Insert item into the database (item_id is auto-incremented)
    $sql = "INSERT INTO items (name, description, category, location, contact, Email) 
            VALUES ('$title', '$description', '$category', '$location', '$contact', '$email')";

    if (mysqli_query($conn, $sql)) {
        // Get the last inserted item ID
        $item_id = mysqli_insert_id($conn);

        // Upload directory for images
        $uploadDir = "uploads/";

        // Ensure the uploads folder exists
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                die("Failed to create upload directory.");
            }
        }

        // Array to store file paths of uploaded images
        $imagePaths = [];

        // Iterate over uploaded files
        foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
            if (!empty($tmpName)) {
                // Check for any file upload errors
                if ($_FILES['images']['error'][$key] != 0) {
                    echo "Error uploading file " . $_FILES['images']['name'][$key] . ": " . $_FILES['images']['error'][$key];
                    continue; // Skip to the next file
                }

                // Generate unique file name and path
                $fileName = uniqid() . "-" . basename($_FILES['images']['name'][$key]);
                $filePath = $uploadDir . $fileName;

                // Attempt to move the uploaded file to the uploads directory
                if (move_uploaded_file($tmpName, $filePath)) {
                    $imagePaths[] = $filePath;
                } else {
                    echo "Failed to upload file " . $_FILES['images']['name'][$key];
                }
            }
        }

        // Fill missing image slots with NULL if fewer than 5 images are uploaded
        while (count($imagePaths) < 5) {
            $imagePaths[] = null;
        }

        // Update item with image paths in the database
        $sqlImages = "UPDATE items SET image1 = ?, image2 = ?, image3 = ?, image4 = ?, image5 = ? WHERE id = ?";
        $stmt = $conn->prepare($sqlImages);
        $stmt->bind_param(
            "sssssi",
            $imagePaths[0],
            $imagePaths[1],
            $imagePaths[2],
            $imagePaths[3],
            $imagePaths[4],
            $item_id
        );

        if ($stmt->execute()) {
            echo "Item and images uploaded successfully!";
        } else {
            echo "Error saving images: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error saving item: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
