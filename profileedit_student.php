<?php
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Manage Profile</title>
</head>
    <style>
    #submitButton:disabled {
        opacity: 0.5; 
    }
    .nav{
        background: linear-gradient(-45deg, #fff466, #fff174, #fff0a0); 
        position: relative;
        z-index: 2;
    }
    
    .register-box {
        box-shadow: 20px 20px 0px #ebb503; 
        background: #f4f4f4;
        margin-left: 30vw;
        min-width: 60vw;
    }

    .register-box header {
        font-size: 100%;
        padding: 2px;
        margin: 0;
    }

    .register-box .btn-container {
        margin-left: auto;
    }

    .gradient-rectangle {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%; /* Set the height to cover the entire viewport height */
        width: 30vh; /* Set the width to 100% to cover the entire viewport width */
        background: linear-gradient(45deg, #fff466, #fff171, #fff0a0, #fffad7);
        border-right: 8px solid #ffe13a;
    }

        .profile-picture-container {
            position: absolute;
            top: 40%; /* Adjust the top position to center the profile picture vertically */
            left: 120%; /* Adjust the left position to center the profile picture horizontally */
            width: 15vw; /* Adjust the width to make it smaller */
            height: 15vw; /* Adjust the height to maintain a square aspect ratio */
            border-radius: 50%;
            overflow: hidden;
            transform: translate(-50%, -50%);
            border: 10px solid #ffe13a;
        }

        .profile-picture {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            mask: url(#circle-mask);
        }

        svg {
            position: absolute;
            width: 0;
            height: 0;
        }

        /* Define circular mask */
        #circle-mask circle {
            fill: white;
        }

        /* Define gradient for the circular border */
        .gradient-border {
            fill: none;
            stroke: url(#gradient-border); /* Apply gradient to stroke */
            stroke-width: 10; /* Set border width */
        }

        .btn{
            height: 38px;
            width: 110px;
            background: #fff;
            border: 0;
            border-radius: 20px;
            color: #e4b723;
            font-size: 17px;
            cursor: pointer;
            transition: all .3s;
            margin-top: 10px;
            padding: 0px 10px;
            box-shadow: 0px 2px 5px rgba(76, 76, 76, 0.2);
        }

        
    </style>
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
</div>
<body>

<br>

<div class="gradient-rectangle">
<div class="profile-picture-container">
        <img src="prfile.jpg" alt="Profile Picture" class="profile-picture">
    </div>
</div>
            

            <div class="register-container" style="min-height: 60vh;">
            <div class="register-box form-box">
            <div class="btn-container">
                    <span><a href="profileedit_realstudent.php"><button class="btn">Edit Profile</button></a></span>
                </div>
                <header style="font-size: 1.3vw; font-weight: normal;">About You</header>
                
            <!-- Display user information -->
            <div class="user-info">
                <div class="info-item">
                    <p><strong>Username:</strong></p>
                </div>
                <div class="info-content">
                    <p><?php echo $res_Uname; ?></p>
                </div>
            </div>
            <div class="user-info">
                <div class="info-item">
                    <p><strong>Email:</strong></p>
                </div>
                <div class="info-content">
                    <p><?php echo $res_Email; ?></p>
                </div>
            </div>
            <div class="user-info">
                <div class="info-item">
                    <p><strong>First Name:</strong></p>
                </div>
                <div class="info-content">
                    <p><?php echo $res_Fname; ?></p>
                </div>
            </div>
            <div class="user-info">
                <div class="info-item">
                    <p><strong>Last Name:</strong></p>
                </div>
                <div class="info-content">
                    <p><?php echo $res_Lname; ?></p>
                </div>
            </div>


            <!-- Button to navigate to edit profile page -->
            <div class="button-row">
                <button onclick="logout()" class="btn" style="color: red;">Log Out</button>
            </div>
        </div>
    </div>


                <script>

                    function logout() {
                        if (confirm("Are you sure you want to log out?")) { // Added parentheses here
                            // Redirect the user after successful logout
                            window.location.href = "php/logout.php";
                        }
                    }

                </script>


                </div>
        </div>
    </div>
</body>
    
</html>