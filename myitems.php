<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Items</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            
        }
        
        header {
           
      top: 0;
      left: 0;
      width: 100%;
    
        }

        footer {
            width: 100%;
            height: 170px;
            position: fixed;
            bottom: 0;
            left: 0;
            border: none;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .container {
            margin: 0 auto;
            margin-top: 140px; /* Adjust to avoid content overlap with the header */
            margin-bottom: 170px; /* Leave space for the footer */
            padding: 20px;
            max-width: 1200px;
            font-family: Arial, sans-serif;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #387478;
            color: white;
            border-radius: 5px;
            border: none;
            padding: 10px 20px;
            font-size: 15px;
            cursor: pointer;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar input {
            width: 300px;
            height: 30px;
            padding-left: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
        }

        .search-bar button {
            background-color: rgb(126, 39, 39);
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            padding: 5px 15px;
            cursor: pointer;
        }

        .body1 {
            display: flex;
            gap: 20px;
        }

        .leftnavigation {
            background-color: #629584;
            color: white;
            padding: 20px;
            border-radius: 5px;
            width: 200px;
        }

        .leftnavigation p {
            margin: 10px 0;
            cursor: pointer;
        }

        .leftnavigation p:hover {
            text-decoration: underline;
        }

        .items {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .item {
            display: flex;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            gap: 15px;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .item img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        .details {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .details p {
            margin: 0;
        }

        .details strong {
            color: #333;
        }
    </style>
</head>
<header>
    <?php include("header.php"); ?>
  </header>
<body>

<div class="container">
    <div class="navigation">
        <button class="back" onclick="history.back()">
            <i class="fa fa-angle-left"></i> Back
        </button>
        <div class="search-bar">
            <form method="GET" action="browse.php">
                <input type="text" name="search" placeholder="Search your items">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="body1">
        <!-- Left Navigation (Categories) -->
        <div class="leftnavigation">
            <h4>Categories</h4>
            <p onclick="window.location.href='browse.php?category=vehicles'">Vehicles</p>
            <p onclick="window.location.href='browse.php?category=properties'">Properties</p>
            <p onclick="window.location.href='browse.php?category=tools'">Tools</p>
            <p onclick="window.location.href='browse.php?category=party_items'">Party Items</p>
            <p onclick="window.location.href='browse.php?category=others'">Others</p>
        </div>

        <!-- Items -->
         <?php 
         if(isset($_SESSION['Username'])){ ?>
            <div class="items">"

          <?php  include("connection.php");
            // Query to fetch item details from the database
            $sql = "SELECT * FROM items WHERE Email = '" . $_SESSION['email'] . "'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Loop through each row and fetch data
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $category = $row['category'];
                    $description = $row['description'];
                    $location = $row['location'];
                    $image = $row['image1'];
                    $contact = $row['contact'];
                    ?>
                    <div class="item">
                        
                        <img src="<?php echo $image; ?>" alt="Item Image">
                        <div class="details">
                            <p><strong>Name:</strong> <?php echo $name; ?></p>
                            <p><strong>Location:</strong> <?php echo $location; ?></p>
                            <p><strong>Description:</strong> <?php echo $description; ?></p>
                            <p><strong>Contact:</strong> <?php echo $contact; ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No items found.</p>";
            }

            // Close the database connection
            mysqli_close($conn);
        } else {  echo"<p>Please sign in to see your items.</p>";}
            ?>
        </div>
    </div>
</div>

<footer>
    <iframe src="footer.html"></iframe>
</footer>

</body>
</html>
