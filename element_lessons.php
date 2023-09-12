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

    <div class="container">
        <header><b>Elements of the Periodic Table</b></header>
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

            <a href="" class="box locked" onclick="unlockColumn(this, 9)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Boron</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 10)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Carbon</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 11)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Nitrogen</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 12)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Oxygen</div>
                </div>
            </a>

            <a href="" class="box locked" onclick="unlockColumn(this, 13)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Flourine</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 14)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Neon</div>
                </div>
            </a>
                        <!-- Elements 11 to 20 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 15)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Sodium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 16)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Magnesium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 17)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Aluminum</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 18)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Silicon</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 19)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Phosphorus</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 20)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Sulfur</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 21)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Chlorine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 22)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Argon</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 23)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Potassium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 24)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Calcium</div>
                </div>
            </a>

                        <!-- Elements 21 to 38 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 25)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Scandium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 26)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Titanium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 27)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Vanadium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 28)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Chromium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 29)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Manganese</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 30)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Iron</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 31)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Cobalt</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 32)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Nickel</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 33)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Copper</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 34)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Zinc</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 35)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Gallium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 36)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Germanium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 37)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Arsenic</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 38)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Selenium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 39)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Bromine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 40)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Krypton</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 41)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Rubidium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 42)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Strontium</div>
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