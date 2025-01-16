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
            font-family: Arial, sans-serif;
        }
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
            background-color: #387478;
            color: white;
            padding: 10px 20px;
            transition: transform 0.3s ease-in-out;
        }
        header.hidden {
            transform: translateY(-100%);
        }
        footer {
            width: 100%;
            height: 170px;
            border: none;
            position: fixed;
            bottom: 0;
            left: 0;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .container {
            margin: 0 auto;
            padding: 20px;
            max-width: 1200px;
            margin-top: 70px;
        }
        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
    </style>
</head>
<body>
    <header id="header">
        <?php include('header.php'); ?>
    </header>

    <div class="container">
        <!-- Your main content here -->
    </div>

    <footer>
        <iframe src="footer.html"></iframe>
    </footer>

    <script>
        let lastScrollTop = 0;
        const header = document.getElementById("header");

        window.addEventListener("scroll", () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                // Scrolling down - hide header
                header.classList.add("hidden");
            } else {
                // Scrolling up - show header
                header.classList.remove("hidden");
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For mobile or overscroll
        });
    </script>
</body>
</html>
