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
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    
    <div class="nav">
        <div class="logo"><a href="homestudent.php" >
        <img src="logo_light.png" alt="logopng" class="logopng" style="max-width: 30%; padding-top:0px;
            height: auto;">
            </a>
        </div>
        <ul class="menu">
            <li><a class="#" href="homestudent.php">Home</a></li>
            <li><a class="#" href="#">About</a></li>
            <li><a class="#" href="#">Games</a></li>
            <li><a class="#" href="#">Periodic Table</a></li>

            <?php

            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM students WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Fname = $result['FirstName'];
                $res_Lname = $result['LastName'];
                $res_id = $result['Id'];
            }

            ?>

            <li><a class="#" href="profileedit_student.php">Profile</a></li>
        </ul>
    </div>
    
    </header>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_Uname ?></b></p>
                </div>
            </div>
        </div>
    </main>
    <div class="container">
        <a href="php/logout.php"><button class="btn">Log Out</button></a>
    </div> 

</body>
</html>