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
    <link rel="stylesheet" href="games.css">
    <script src="homescript.js"></script>
    <title>Games</title>
</head>
<body style="background-image: url('images/gamepage.png');">
    <div class="nav">
    <div class="logo"><a href="homestudent.php" >
        <img src="logo_dark.png" alt="logopng" class="logopng" style="max-width: 40%; padding-top:0px;
            max-height: 100% ;">
            </a>
        </div>
        <ul class="menu">
            <li><a class="#" href="homestudent.php">Home</a></li>
            <li><a class="#" href="#">About</a></li>
            <li><a class="#" href="games.php">Games</a></li>
            <li><a class="#" href="periodictable.php">Periodic Table</a></li>
            <li><a class="#" href="profileedit_student.php">Profile</a></li>

            <?php

            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM students WHERE Id = $id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Fname = $result['FirstName'];
                $res_Lname = $result['LastName'];
                $res_id = $result['Id'];
            }
            ?>

            
        </ul>
    </div>
    
    </header>
    <main>

    <div class="enterimg"><a href="gamechoices.php" >
        <img src="images/enter.png" alt="logopng" class="logopng" style="max-width: 50%;">
            </a>
    </div>
        
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
</body>
</html>