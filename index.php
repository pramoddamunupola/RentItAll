<?php 
session_start(); // Start the session at the beginning of the script
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url(recources/background.png);
      background-position: center;
      height: 100vh; /* Ensure the body takes up the full screen height */
      display: flex;
      flex-direction: column;
      background-size: cover;
    }
    
    /* Styling for the header iframe */
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 9999;
       /* Ensures the header is always on top */
    }

    /* Footer styling */
    footer {
      height: 170px;
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #243642; /* Change background color as needed */
      z-index: 90; /* Ensures the footer is below the header */
    }
    
    iframe {
      width: 100%;
      border: none;
      padding: 0;
      height: 170px;
      background-color: rgb(180, 62, 62);
    }

    /* Optional: Make the content area take up the remaining space */
    .content {
      flex: 5;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: white;
      font-size: 24px;
      font-family: Arial;
    }

    /* Search bar styling */
    .search-bar {
      display: flex;
    }

    .search-bar input {
      width: 600px;
      font-size: 14px;
      padding: 10px;
      background-color: whitesmoke;
      border: none;
      border-radius: 5px 0 0 5px;
    }

    .search-bar button {
      padding: 14px 20px;
      border-radius: 0 5px 5px 0;
      border: none;
      color: white;
      background-color: rgb(126, 39, 39);
      font-size: 14px;
      cursor: pointer;
    }

    /*style*/
    .catagories { 
      display: flex;
      justify-content: center;
      margin-top: 20px;
      gap: 20px;
      background-color: rgba(255, 255, 255, 0.4);
      padding: 15px;
    }

    .catagory {
      width: 100px;
      height: 100px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 15px;
      text-align: center;
      background-color: rgb(126, 39, 39);
      border: none;
      border-radius: 4px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease; /* Smooth animation */
    }

    .catagory:hover {
      transform: scale(1.1); /* Enlarges the button to 1.2x its original size */
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); /* Adds a stronger shadow */
    }

    a {
      color: white;
    }
    
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <?php include("header.php"); ?>
  </header>

  <!-- Main content area -->
  <div class="content">
    <p>
      <?php
      // Check if the user is logged in
      if (isset($_SESSION['Username'])) {
          echo "Hello, " . $_SESSION['Username'] . "! Welcome back.";
      } else {
          echo "Welcome! Please <a href='SignIn.php'>Sign In</a> to start renting.";
      }
      ?>
    </p>
  
    <!-- Search bar -->
    <div class="search-bar">
      <form id="search" action="browse.php" method="get">
        <input type="text" name="search" placeholder="What do you want for rent?" />
        <button type="submit">Search</button>
      </form>
    </div>
  
    <!-- Categories -->
    <div class="catagories">
      <a href="browse.php?category=vehicles">
        <div class="catagory">Vehicles</div>
      </a>
      <a href="browse.php?category=property">
        <div class="catagory">Property</div>
      </a>
      <a href="browse.php?category=tools">
        <div class="catagory">Tools</div>
      </a>
      <a href="browse.php?category=party_items">
        <div class="catagory">Party Items</div>
      </a>
      <a href="browse.php?category=others">
        <div class="catagory">Others</div>
      </a>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <iframe src="footer.html"></iframe>
  </footer>
</body>
</html>
