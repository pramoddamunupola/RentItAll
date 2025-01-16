<?php
session_start(); 
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if ($conn === false) {
        die("ERROR: Could not connect to the database.");
    }

    
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $email = $_SESSION['email'];
   
    $sql = "INSERT INTO items (name, description, category, location, contact, Email) 
            VALUES ('$title', '$description', '$category', '$location', '$contact', '$email')";

    if (mysqli_query($conn, $sql)) {
       
        $item_id = mysqli_insert_id($conn);

       
        $uploadDir = "uploads/";

       
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                die("Failed to create upload directory.");
            }
        }

        
        $imagePaths = [];

        
        foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
            if (!empty($tmpName)) {
                
                if ($_FILES['images']['error'][$key] != 0) {
                    echo "Error uploading file " . $_FILES['images']['name'][$key] . ": " . $_FILES['images']['error'][$key];
                    continue; 
                }

               
                $fileName = uniqid() . "-" . basename($_FILES['images']['name'][$key]);
                $filePath = $uploadDir . $fileName;

               
                if (move_uploaded_file($tmpName, $filePath)) {
                    $imagePaths[] = $filePath;
                } else {
                    echo "Failed to upload file " . $_FILES['images']['name'][$key];
                }
            }
        }

        
        while (count($imagePaths) < 5) {
            $imagePaths[] = null;
        }

        
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
        echo "Error saving item.";
    }

    
    mysqli_close($conn);
}
?>}
