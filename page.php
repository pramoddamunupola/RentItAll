<?php

session_start();


include("connection.php");


$name = $location = $description = $contact = "";
$images = []; 


if (isset($_GET['id'])) {
    $itemId = intval($_GET['id']); 

    
    $query = "SELECT * FROM items WHERE id = $itemId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);
        $name = htmlspecialchars($item['name']);
        $location = htmlspecialchars($item['location']);
        $description = htmlspecialchars($item['description']);
        $contact = htmlspecialchars($item['contact']);

        
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
            width: 400px;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .thumbnail-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .thumbnail-container img {
            width: 60px;
            height: 60px;
            object-fit: cover;
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

       
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            position: relative;
            margin: auto;
            padding: 0;
            max-width: 80%;
            max-height: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            color: white;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.5);
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <script>
        
        function switchImage(src, thumbnail) {
            const mainImage = document.querySelector('.main-image');
            const thumbnails = document.querySelectorAll('.thumbnail-container img');

            mainImage.src = src;

            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            thumbnail.classList.add('active');
        }

        function openModal(src) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');

            modal.style.display = "block";
            modalImg.src = src;
        }

        function closeModal() {
            document.getElementById('imageModal').style.display = "none";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1><?php echo $name; ?></h1>
        <div class="image-gallery">
            
            <img class="main-image" src="<?php echo $images[0]; ?>" alt="Main Item Image" onclick="openModal(this.src)">

           
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

        
        <a href="browse.php" class="back-btn">Back to Browse</a>
    </div>

    
    <div id="imageModal" class="modal">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <img id="modalImage" alt="Expanded Item Image">
        </div>
    </div>
</body>
</html>