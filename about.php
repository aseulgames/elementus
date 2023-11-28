<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="games.css">
    <script src="homescript.js"></script>
    <title>Games</title>
    <style>
        html, body {
			max-width: 100%;
			overflow-x: hidden;
		}
        
        .bubble {
            z-index: 999;
            position: absolute;
            border-radius: 50%;
            user-select: none; /* Prevent selection of bubble elements */
        }
        
        #board {
            position: relative;
            overflow: hidden; /* Hide overflow content */
        }

        .box {
        /* ... (existing styles) ... */
        width: 100%; /* Adjust this value to control the width of the boxes */
        margin: 0 1%; /* Adjust this value to control the spacing between the boxes */
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #bb8fce; /* Updated background color */
            color: #333; /* Updated text color */
        }

        header {
            background-color: #bb8fce;
            color: #fff;
            padding: 15px; /* Increased padding for better visibility */
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Added box shadow */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 15px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 1.1em; /* Increased font size for better readability */
        }

        .nav {
        background: linear-gradient(-45deg, #d2b4de, #a569bd, #bb8fce); /* Navbar gradient */
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        line-height: 30px;
        z-index: 50;
        padding: 1%;
        padding-right: 3%;
        box-shadow: 0px 2px 5px rgba(76, 76, 76, 0.3);
    }

        main {
            padding: 20px;
        }

        .about-section {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 15px; /* Rounded corners for better visual appeal */
            text-align: center;
            margin-top: 20px; /* Added margin at the top */
        }

        h1 {
            font-size: 3em; /* Increased font size for the main heading */
            margin-bottom: 20px;
            color: #bb8fce; /* Matched the heading color with the navbar */
        }

        .elementus-highlight {
            background-image: linear-gradient(to right, violet, indigo, blue, green, yellow, orange, red);
            -webkit-background-clip: text;
            color: transparent;
            font-weight: bold;
        }

        p {
            color: #555; /* Adjusted text color for better contrast */
            margin-bottom: 15px;
            line-height: 1.6; /* Improved line height for better readability */
        }

        .games-list {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .game-box {
            background-color: #bb8fce;
            color: #fff;
            padding: 20px; /* Increased padding for better touch experience */
            border-radius: 15px;
            text-align: center;
            width: 20%;
            margin: 10px;
            cursor: pointer; /* Added cursor pointer for better interaction */
            transition: background-color 0.3s ease; /* Smooth transition on hover */
        }

        .game-box:hover {
            background-color: #a569bd; /* Darker color on hover */
        }

        .developer-table {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 30px; /* Adjusted margin for better spacing */
        }

        .developer {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Added box shadow for each developer box */
        }

        .img-dev {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            margin-right: 20px;
            object-fit: cover;
        }

        .privacy-policy {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 15px;
            margin-top: 30px; /* Adjusted margin for better spacing */
        }

        .privacy-policy h2 {
            color: #bb8fce;
            margin-bottom: 15px;
        }

        /* Add any additional styles or modifications as needed */

    </style>
</head>

<body>
    <div id="board"></div>
    <audio id="bubbleSound">
        <source src="bubbles.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <!-- Background Music -->
    <audio id="backgroundMusic" autoplay loop>
        <source src="music-default.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <audio id="hoverSound">
        <source src="hover-sound.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <!-- Bootstrap Navbar -->
    <nav class="nav navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div class="logo-container">
                <a href="homestudent.php" class="logo navbar-brand">
                    <img src="logo_dark.png" alt="logopng" class="logopng" style="border-radius:0;">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="menu navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="homestudent.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="games.php">Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="periodictable.php">Periodic Table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profileedit_student.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    $id = $_SESSION['id'];
    $query = mysqli_query($con, "SELECT * FROM students WHERE Id = $id");

    while ($result = mysqli_fetch_assoc($query)) {
        $res_Uname = $result['Username'];
        $res_Email = $result['Email'];
        $res_Fname = $result['FirstName'];
        $res_Lname = $result['LastName'];
        $res_id = $result['Id'];
    }
    ?>

    </header>
    <div class="mute-icon" onclick="toggleMute()">
        <img id="muteImg" src="images/play.png" alt="Mute">
    </div>
    <main>
        <div id="overlay" class="overlay">
            <div class="overlay-content" style="visibility: hidden;">
                <p>Drag your mouse for bubbles!</p>
            </div>
        </div>

        <section class="about-section">
            <h1>About <span class="elementus-highlight">ELEMENTUS</span></h1>
            <p>
                <span class="elementus-highlight">ELEMENTUS</span> is not just a platform; it's an immersive journey into
                the fascinating world of the periodic table of elements. Designed to make learning enjoyable and dynamic,
                <span class="elementus-highlight">ELEMENTUS</span> brings chemistry to life through interactive games,
                challenges, and a user-friendly interface.
            </p>
            <p>
                Dive into the periodic table with engaging activities like 4 Pics 1 Word, Memory Game, Puzzle Game, and
                Fusion Elementia. These games are carefully crafted to enhance your understanding of elements, their
                properties, and their real-world applications.
            </p>
            <div class="games-list">
                <div class="game-box">4 Pics 1 Word</div>
                <div class="game-box">Memory Game</div>
                <div class="game-box">Puzzle Game</div>
                <div class="game-box">Fusion Elementia</div>
            </div>
            <br><br>
            <p>
                Meet the Developers:
            </p>
            <div class="developer-table">
                <div class="developer">
                    <img class="img-dev" src="images/developers/gwy.jpg" alt="Developer 1">
                    <p>
                        <strong>Gwyneth Galang</strong><br>
                        Lead Developer<br>
                    </p>
                </div>
                <div class="developer">
                    <img class="img-dev" src="images/developers/mica.jpg" alt="Developer 2">
                    <p>
                        <strong>Shamaica Lalusis</strong><br>
                        UI/UX Designer<br>
                    </p>
                </div>
                <div class="developer">
                    <img class="img-dev" src="images/developers/ej.jpg" alt="Developer 3">
                    <p>
                        <strong>Edwin Mojares</strong><br>
                        Content Author<br>
                    </p>
                </div>
                <div class="developer">
                    <img class="img-dev" src="developer2.jpg" alt="Developer 4">
                    <p>
                        <strong>Pearl Parafina</strong><br>
                        UI/UX Designer<br>
                    </p>
                </div>
            </div>

            <section class="privacy-policy">
                <h2>Privacy Policy</h2>
                <p>The following privacy policy outlines how user information is collected, used, and shared when using ELEMENTUS. The privacy policy may be updated periodically to reflect changes in practices or legal requirements. Users will be notified of any material changes through the platform or via email.
                <br><br><strong>Collection of Personal Information</strong><br>
                During the sign-up process, <strong>ELEMENTUS</strong> collects personal information, including name, email address, username, and password. This information is voluntarily provided by users and is necessary for the creation and management of user accounts within the CAI.
                <br><br><strong>Usage of Personal Information</strong><br>
                a. Personal information collected is used for authentication, account management, and communication purposes related to ELEMENTUS.
                <br>b. The provided email address may be used to send periodic updates, notifications, or relevant information about ELEMENTUS. Users have the option to unsubscribe from these communications.
                <br><br><strong>Protection of Personal Information</strong><br>
                a. ELEMENTUS implements reasonable security measures to protect personal information from unauthorized access, disclosure, alteration, or destruction.
                <br>b. User accounts are password-protected, and users are encouraged to select strong, unique passwords and keep them confidential.
                <br>c. While ELEMENTUS employs industry-standard security practices, it is important to note that no method of data transmission or storage can guarantee complete security.
                <br><br><strong>Sharing of Information</strong><br>
                ELEMENTUS does not share, rent, or sell personal information to third parties for marketing purposes. However, user information may be shared with third-party service providers to improve the functionality of ELEMENTUS. These providers are required to maintain the confidentiality of the information and use it solely for the purpose of providing requested services.
                <br><br><strong>Data Retention</strong><br>
                Users have the right to access, correct, or delete the personal information collected by ELEMENTUS. Requests for the deletion of personal information will be processed in accordance with applicable laws and regulations.
                <br><br><strong>Contact Information:</strong>
                <strong><b>(elementus0210@gmail.com)</b></strong>
                <strong><b>(+639 474257903)</b></strong><br></p>
            </section>
        </section>
    </main>

    <script src="homescript.js">
        function resizeWindowToImage() {
            var imageContainer = document.getElementById("image-container");
            var image = imageContainer.querySelector("img");
            var imageWidth = image.offsetWidth;
            var imageHeight = image.offsetHeight;

            // Set a buffer for window size
            var buffer = 20;

            // Resize the window based on the image dimensions plus a buffer
            window.resizeTo(imageWidth + buffer, imageHeight + buffer);
        }

        // Call the resize function when the image is loaded
        window.onload = resizeWindowToImage;
    </script>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="bubbles.js"></script>
    <script src="music.js"></script>

</body>
</html>
