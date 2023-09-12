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
    <link rel="stylesheet" href="home.css">
    <script src="homescript.js"></script>
    <title>Home</title>
</head>
<body>
    
    <div class="nav" style="padding=2%">
        <div class="logo"><a href="homestudent.php" >
        <img src="logo_light.png" alt="logopng" class="logopng" style="max-width: 30%; padding-top:0px;
            height: auto;">
            </a>
        </div>
        <ul class="menu">
            <li><a class="#" href="homestudent.php">Home</a></li>
            <li><a class="#" href="#">About</a></li>
            <li><a class="#" href="#">Games</a></li>
            <li><a class="#" href="periodictable.php">Periodic Table</a></li>

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
    <header>Hello,<b><?php echo $res_Uname ?>!</b></header><br>

    <div class="container">
        <header><b>Introduction</b></header>
        <div class="intro-container">
            <a href="profileedit_student.php" class="box" onclick="unlockColumn(this, 1)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Origins of the Periodic Table</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 2)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Names, Symbols, & Atomic number of the Elements</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 3)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Groups and Periods in the Periodic Table</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 4)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Elements, Compounds, and Mixtures</div>
                </div>
            </a>
        </div>
    <br>
        
    <header style="display: flex; justify-content: space-between; ">
    <b>Lessons</b>
    <a href="element_lessons.php"><u style="font-size:1vw">See All</u></a>
</header>
        <div class="intro-container">
            <a href="" class="box locked" onclick="unlockColumn(this, 5)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Hydrogen</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 6)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Helium</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 7)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Lithium</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 8)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Beryllium</div>
                </div>
            </a>
        </div>
    </div>
    </div>
        
    </main>
    <div class="intro-container">
        <a href="php/logout.php"><button class="btn">Log Out</button></a>
    </div> 
    <script src="homescript.js"></script>
</body>
</html>