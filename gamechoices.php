<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="games.css">
    <script src="homescript.js"></script>
    <title>Games</title>
    <style>
        body{
            background-image: url('images/gameschoices.png'); 
        }

        .nav{
            background: linear-gradient(-45deg, #ffa9f9, #fff7ad, #ffa6a6);
        }
    </style>
</head>
<body>
    <header id="headertitle">
        SELECT A GAME YOU'D LIKE TO PLAY
    </header>
    <main>
    <div class="container">
        <br><br><br><br>
        <div class="intro-container">
            <a href="playfourpics.php" class="box boxone <?php echo $lesson_completion[1] ?>" onclick="unlockColumn(this, 1)">
                <div class="box-img" style="background-image: url('images/iconone.png');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="fourpicslogo-img"></div>
                </div>
            </a>
            <a href="playmemory.php" class="box boxtwo <?php echo $lesson_completion[2] ?>" onclick="unlockColumn(this, 2)">
                <div class="box-img" style="background-image: url('images/icontwo.png');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="memorylogo-img"></div>
                </div>
            </a>
            <a href="" class="box boxthree <?php echo $lesson_completion[3] ?>" onclick="unlockColumn(this, 3)">
                <div class="box-img" style="background-image: url('images/iconthree.gif');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="puzzlelogo-img"></div>
                </div>
            </a>
            <a href="" class="box boxfour <?php echo $lesson_completion[4] ?>" onclick="unlockColumn(this, 4)">
                <div class="box-img" style="background-image: url('images/iconfour.png');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="fuselogo-img"></div>
                </div>
            </a>

            
        <div class="button-container">
            <button type="button" class="btn" onclick="window.history.back()" name="cancel" value="Cancel" style="background-color: #E24B4B; border-radius: 20px; border: solid #E24B4B; color:#fff;">Cancel</button>
        </div> 
        </div>
    </div>
    
      
    </main>
    <script src="homescript.js">
    </script>
</body>
</html>