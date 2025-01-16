<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* CSS remains unchanged */
        body {
            margin: 0;
            border: none;
            left: 0;
            justify-items: center;
            align-items: center;
            background-color: green;
            background-size: cover;
            background-size: 100% 80%;
        }
        header {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            
        }
        footer {
            height: 170px;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #243642;
            z-index: 90;
        }
        iframe {
            width: 100%;
            border: none;
            padding: 0;
            height: 170px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, auto);
            margin-left: 5%;
            margin-right: 5%;
            gap: 20px;
            row-gap: 30%;
            column-gap: 5%;
            width: 90%;
            max-width: 1000px;
            max-height: 800px;
            flex-wrap: wrap;
            font-size: larger;

        }
        .name {
            grid-column: 1;
            grid-row: 1;
        }
        .contact {
            grid-column: 1;
            grid-row: 2;
            height: 120%;
        }
        .description {
            grid-column: 2 / span 2;
            grid-row: 1;
        }
        .category {
            grid-column: 2;
            grid-row: 2;
        }
        .location {
            grid-column: 3;
            grid-row: 2;
        }
        input {
            width: 100%;
            height: 50%;
            max-width: 300px;
            background-color: lightgray;
            border: none;
        }
        select {
            width: 100%;
            height: 70%;
            max-width: 300px;
            background-color: lightgrey;
            border: none;
        }
        textarea {
            width: 100%;
            height: 100%;
            resize: none;
            box-sizing: border-box;
            background-color: lightgrey;
            border: none;
        }
        .imagebox {
            display: flex;
            background-color: lightgrey;
            margin-top: 100px;
            flex-wrap: wrap;
            width: 90%;
            max-width: 1000px;
            justify-content: center;
            box-sizing: border-box;
            padding: 1%;
            border-radius: 2%;
        }
        h4 {
            margin: 1%;
            color: #053f18;
        }
        .imagebox input {
            width: 18%;
            height: 100%;
            object-fit: cover;
            aspect-ratio: 1/1;
            background-color: #ddd;
            background-size: cover;
            background-position: center;
            cursor: pointer;
        }
        .addbottons {
            display: flex;
            flex-direction: column;
            width: 17%;
            margin-top: 1%;
            border-radius: 2%;
        }
        button {
            background-color: rgb(163, 67, 67);
            border: none;
            cursor: pointer;
            color: white;
            min-height: 30px;
            border-radius: 2%;
        }
        button:hover{
            background-color: rgb(163, 50, 67);
        }
        .savemenu {
            display: flex;
            flex-wrap: wrap;
            width: 90%;
            max-width: 1000px;
            justify-content: right;
            box-sizing: border-box;
            gap: 2%;
            margin-top: 20px;
        }
        .savemenu button {
            width: 13%;
            border-radius: 10%;
        }
    </style>
</head>
<header>
<?php 
session_start(); 
include("header.php"); 

// Check if the user is logged in
if (!isset($_SESSION['Username'])) {
    echo '<script>alert("Please log in to post an item."); window.location.href = "SignIn.php";</script>';
    exit(); // Stop further execution
}
?>
</header>
<body>
    
    <!-- Hidden form -->
    <form id="adForm" action="postaddata.php" method="POST" enctype="multipart/form-data"></form>

    <div class="container">
        <div class="name">
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title" form="adForm">
        </div>
        <div class="contact">
            <label for="contact">Contact</label><br>
            <input type="text" id="contact" name="contact" form="adForm">
        </div>
        <div class="description">
            <label for="description">Description</label><br>
            <textarea id="description" name="description" form="adForm"></textarea>
        </div>
        <div class="category">
            <label for="category">Category</label><br>
            <select id="category" name="category" form="adForm">
                <option value="Vehicles">Vehicles</option>
                <option value="Property">Property</option>
                <option value="Tools">Tools</option>
            </select>
        </div>
        <div class="location">
            <label for="location">Location</label><br>
            <select id="location" name="location" form="adForm">
                <option value="ampara">ampara</option>
                <option value="auradhapura">anuradhapura</option>
                <option value="badulla">badulla</option>
                <option value="batticola">batticola</option>
                <option value="colombo">colombo</option>
                <option value="dalle">galle</option>
                <option value="gampaha">gampaha</option>
                <option value="hambanthota">hambanthota</option>
                <option value="jaffna">jaffna</option>
                <option value="kaluthara">kaluthara</option>
                <option value="kandy">kandy</option>
                <option value="kagalle">kagalle</option>
                <option value="kilinochchi">kilinochchi</option>
                <option value="kurunagale">kurunagale</option>
                <option value="mannar">mannar</option>
                <option value="matale">matale</option>
                <option value="mathara">mathara</option>
                <option value="monaragala">monaragala</option>
                <option value="nullmullathiw">mullathiw</option>
                <option value="Nuwara eliya">Nuwara eliya</option>
                <option value="polonnaruwa">polonnaruwa</option>
                <option value="puttalam">puttalam</option>
                <option value="Rathnapura">Rathnapura</option>
                <option value="Trincomalee">trincomalee</option>
                <option value="vawniya">vawniya</option>
            </select>
        </div>
    </div>

    <div class="imagebox">
        <center>
            <h4>Add item images</h4>
            <div>
                <input type="file" id="image1" name="images[]" accept="image/*" form="adForm">
                <input type="file" id="image2" name="images[]" accept="image/*" form="adForm">
                <input type="file" id="image3" name="images[]" accept="image/*" form="adForm">
                <input type="file" id="image4" name="images[]" accept="image/*" form="adForm">
                <input type="file" id="image5" name="images[]" accept="image/*" form="adForm">
            </div>
        </center>
    </div>

    <div class="savemenu">
        <button type="button" onclick="window.location.reload()">Cancel</button>
        <button type="reset" form="adForm" id="clearButton">Clear</button>
        <button type="submit" form="adForm">Post Ad</button>
    </div>

    <script>
        const imageInputs = document.querySelectorAll('.imagebox input[type="file"]');
        const clearButton = document.querySelector('#clearButton');

        // Preview the image on file selection
        imageInputs.forEach(input => {
            input.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        input.style.backgroundImage = url(${event.target.result});
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        // Clear selected images and reset background
        clearButton.addEventListener('click', () => {
            imageInputs.forEach(input => {
                input.value = ''; // Clear the selected file
                input.style.backgroundImage = ''; // Reset the background image
            });
        });
       </script>

    <script>
        // Add form validation
        document.getElementById('adForm').addEventListener('submit', function (event) {
            let isValid = true; // Track overall validation status
            let errorMessage = ""; // Collect error messages
    
            // Validate Title
            const title = document.getElementById('title').value.trim();
            if (!title) {
                errorMessage += "Title is required.\n";
                isValid = false;
            }
    
            // Validate Contact
            const contactPattern = /^[0-9]{10}$/;
            const contact = document.getElementById('contact').value.trim();
            if (!contactPattern.test(contact)) {
                errorMessage += "Invalid contact format. Use 10 digits (XXXXXXXXXX).\n";
                isValid = false;
            }
    
            // Validate Description
            const description = document.getElementById('description').value.trim();
            if (!description) {
                errorMessage += "Description is required.\n";
                isValid = false;
            }
    
            // Validate Category
            const category = document.getElementById('category').value;
            if (!category) {
                errorMessage += "Category must be selected.\n";
                isValid = false;
            }
    
            // Validate Location
            const location = document.getElementById('location').value;
            if (!location || location === "null") {
                errorMessage += "Location must be selected.\n";
                isValid = false;
            }
    
            // Validate Images
            const imageInputs = document.querySelectorAll('.imagebox input[type="file"]');
            let hasAtLeastOneImage = false;
    
            imageInputs.forEach(input => {
                if (input.files.length > 0) {
                    hasAtLeastOneImage = true; // Check if at least one image is uploaded
                }
            });
    
            if (!hasAtLeastOneImage) {
                errorMessage += "At least one image must be uploaded.\n";
                isValid = false;
            }
    
            // If the form is not valid, prevent submission and show an alert
            if (!isValid) {
                alert("Form validation failed:\n" + errorMessage);
                event.preventDefault();
            }
        });
    </script>
    
    <footer>
        <iframe src="footer.html"></iframe>
    </footer>
</body>
</html>