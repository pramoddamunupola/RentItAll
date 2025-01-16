<?php
// Start session if needed
session_start();

// Include database connection
include("connection.php");

// Initialize variables
$name = $location = $description = $contact = "";
$images = []; // Array to hold image paths

// Get the item ID from the URL
if (isset($_GET['id'])) {
    $itemId = intval($_GET['id']); // Ensure the ID is an integer

    // Query to fetch the item's details
    $query = "SELECT * FROM items WHERE id = $itemId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);
        $name = htmlspecialchars($item['name']);
        $location = htmlspecialchars($item['location']);
        $description = htmlspecialchars($item['description']);
        $contact = htmlspecialchars($item['contact']);

        // Gather image paths if available
        for ($i = 1; $i <= 5; $i++) {
            $imageKey = "image" . $i;
            if (!empty($item[$imageKey])) {
                $images[] = htmlspecialchars($item[$imageKey]);
            }
        }
    } else {
        echo "<p>Item not found.</p>";
        exit();
    }
} else {
    echo "<p>No item ID provided.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?></title>
    <style>
        /* General Reset and Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url('recources/background1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #333;
            line-height: 1.6;
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 26px;
            margin-bottom: 20px;
            color: #444;
            text-align: center;
        }

        .image-gallery {
            display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
        }

        .main-image {
            width: 400px; /* Fixed width */
    height: 300px; /* Fixed height */
    object-fit: cover; /* Maintain aspect ratio while covering the box */
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .thumbnail-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .thumbnail-container img {
            width: 60px; /* Fixed width for thumbnails */
    height: 60px; /* Fixed height for thumbnails */
    object-fit: cover; /* Maintain aspect ratio while covering the box */
    border-radius: 6px;
    cursor: pointer;
    border: 2px solid transparent;
    transition: border-color 0.3s;
        }

        .thumbnail-container img:hover,
        .thumbnail-container img.active {
            border-color: #387478;
        }

        .details-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .details-table th, .details-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .details-table th {
            background: #f4f4f4;
            color: #555;
        }

        .details-table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .details-table tr:hover {
            background: #f1f1f1;
        }

        .back-btn {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background: #387478;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s ease;
            text-align: center;
        }

        .back-btn:hover {
            background: #285f5e;
        }
    </style>
    <script>
        // JavaScript to handle image preview switching
        function switchImage(src, thumbnail) {
            const mainImage = document.querySelector('.main-image');
            const thumbnails = document.querySelectorAll('.thumbnail-container img');

            mainImage.src = src;

            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            thumbnail.classList.add('active');
        }
    </script>
</head>
<body>
    <div class="container">
        <h1><?php echo $name; ?></h1>
        <div class="image-gallery">
            <!-- Main Image -->
            <img class="main-image" src="<?php echo $images[0]; ?>" alt="Main Item Image">

            <!-- Thumbnails -->
            <div class="thumbnail-container">
                <?php foreach ($images as $index => $imagePath): ?>
                    <img 
                        src="<?php echo $imagePath; ?>" 
                        alt="Thumbnail <?php echo $index + 1; ?>" 
                        class="<?php echo $index === 0 ? 'active' : ''; ?>" 
                        onclick="switchImage('<?php echo $imagePath; ?>', this)">
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Details Table -->
        <table class="details-table">
            <tr>
                <th>Name</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>Location</th>
                <td><?php echo $location; ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php echo $description; ?></td>
            </tr>
            <tr>
                <th>Contact</th>
                <td><?php echo $contact; ?></td>
            </tr>
        </table>

        <!-- Back Button -->
        <a href="browse.php" class="back-btn">Back to Browse</a>
    </div>
</body>
</html>
