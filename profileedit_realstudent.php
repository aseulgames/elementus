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
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
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
        width: 10vw; /* Set the width to 100% to cover the entire viewport width */
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
            height: 3.4vw;
            width: 10vw;
            background: #fff;
            border: 0;
            border-radius: 20px;
            color: #e4b723;
            font-size: 1.5vw;
            cursor: pointer;
            transition: all .3s;
            margin-top: 10px;
            padding: 0px 10px;
            box-shadow: 0px 2px 5px rgba(76, 76, 76, 0.2);
        }

        .logopng{
            max-width: 20vw;
            padding-top:0px;
            max-height: 100%; 
            margin-left: 5vw;
        }

        
    </style>
<nav class="nav navbar navbar-expand-lg navbar-light">
        <div class="logo-container">
            <a href="homestudent.php" class="logo navbar-brand">
                <img src="logo_dark.png" alt="logopng" class="logopng">
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
                    <a class="nav-link" href="#">About</a>
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
                <li class="nav-item">
                    <!-- Mute and Unmute Icons -->
                    <!-- <div class="mute-icon" onclick="toggleMute()">
                        <img id="muteImg" src="images/play.png" alt="Mute">
                    </div> -->
                </li>
            </ul>

            </div>
        </div>
    </nav>

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
        <svg width="0" height="0">
            <defs>
                <mask id="circle-mask" x="0" y="0" width="100%" height="100%" maskUnits="objectBoundingBox" maskContentUnits="objectBoundingBox">
                    <circle cx="0.5" cy="0.5" r="0.45" fill="white" /> <!-- Circle mask -->
                </mask>
                <linearGradient id="gradient-border" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color: #ff00ff; stop-opacity: 1" />
                    <stop offset="100%" style="stop-color: #00ffff; stop-opacity: 1" />
                </linearGradient>
            </defs>
        </svg>
    </div>
</div>
    <div class="register-container" style="min-height: 60vh;">
        <div class="register-box form-box">
        <header style="font-size: 150%; padding: 2px; color: #e4b723">Edit Profile</header>
            <?php
            $errorMessages = array(); // Array to store error messages

            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirm'];

                $id = $_SESSION['id'];

                $verify_query = mysqli_query($con, "SELECT Email FROM students WHERE Email='$email' AND Id != $id");
                
                if(mysqli_num_rows($verify_query) != 0){
                    $errorMessages[] = "This email is already used";
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, '.com') === false) {
                    $errorMessages[] = "Please enter a valid email with '@' and '.com'";
                }
                if(strlen($password) != 0){
                    if (strlen($password) < 8) {
                        $errorMessages[] = "Password should be at least 8 characters";
                    }
                    if ($password !== $confirmPassword) {
                        $errorMessages[] = "Passwords do not match";
                    }
                }

                if (empty($errorMessages)) {
                    if($verify_query){
                        // Perform the update operation here
                        if(strlen($password) == 0){
                            mysqli_query($con, "UPDATE students SET FirstName='$fname', LastName='$lname', Username='$username', Email='$email' WHERE Id=$id") or die("Error occurred");
                        } else {
                            mysqli_query($con, "UPDATE students SET FirstName='$fname', LastName='$lname', Username='$username', Email='$email', Password='$password' WHERE Id=$id") or die("Error occurred");
                        }
                        

                        echo "<div class='message'>
                            <p>Profile updated</p>
                        </div><br>";
                        echo "<a href='homestudent.php'><button class='btn'>Home</button>";
                    }
                } else {
                    foreach ($errorMessages as $errorMessage) {
                        echo "<div class='message'>
                            <p>$errorMessage</p>
                        </div><br>";
                    }
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Back</button>";
                }
            } else {
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT*FROM students WHERE Id=$id");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Fname = $result['FirstName'];
                    $res_Lname = $result['LastName'];
                }
        ?>

            <form action="" method="post" id="form">

                <div class="name-row" style="display: flex; align-items: center;">
                    <div class="field input" style="margin-right: 10px; width: 100%;">
                    <label for="email"><b>First Name</b></label>
                    <input type="text" name="fname" id="fname" value="<?php echo $res_Fname?>" autocomplete="off">
                    </div>

                    <div class="field input" style="width: 100%;">
                    <label for="email"><b>Last Name</b></label>
                    <input type="text" name="lname" id="lname"  value="<?php echo $res_Lname?>" autocomplete="off">
                    </div>
                </div>

                <div class="name-row" style="display: flex; align-items: center;">
                    <div class="field input" style="margin-right: 10px; width: 40%;">
                    <label for="email"><b>Username</b></label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname?>"  autocomplete="off">
                    </div>
    
                    <div class="field input" style="width: 60%;">
                    <label for="email"><b>Email</b></label>
                    <input type="text" name="email" id="email"  value="<?php echo $res_Email?>"  autocomplete="off">
                    </div>
                </div>


                <div class="field input">
                <input placeholder="New Password" type="password" name="password" id="password" autocomplete="off">
                </div>

                <div class="field input">
                <input placeholder="Confirm Password" type="password" name="confirm" id="confirm" autocomplete="off">
                </div>

                

                <div class="button-row">


                <div>
                    <button type="button" class="btn" onclick="window.history.back()" name="cancel" value="Cancel" style="margin-right: 10px; background-color: #E24B4B; border-radius: 20px; border: solid #E24B4B; color:#fff;">Cancel</button>
                    <button type="submit" id="submitButton" class="btn" name="submit" value="Submit" style="margin-right: 10px; background-color: #E2AF4B; border-radius: 20px; border: solid #E2AF4B; color:#fff;" disabled>Update</button>
                </div>
            </div>


            <script src="bootstrap/bootstrap.bundle.min.js"></script>
                <script>

                    const form = document.getElementById('form');
                    const fields = form.querySelectorAll('input[type="text"], input[type="password"]');
                    const submitButton = document.getElementById('submitButton');

                    let formChanged = false;

                    // Function to enable or disable the submit button based on form changes
                    function toggleSubmitButton() {
                    formChanged = Array.from(fields).some(field => field.value !== field.defaultValue);
                    submitButton.disabled = !formChanged;
                    }

                    // Add an event listener to each field to detect changes
                    fields.forEach(field => {
                    field.addEventListener('input', toggleSubmitButton);
                    });

                    // Call the toggleSubmitButton function initially to check for changes
                    toggleSubmitButton();


                </script>


                </div>
            </form>
        </div>

        
        <?php } ?>
    </div>
</body>
    
</html>