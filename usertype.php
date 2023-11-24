<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_try.css">
    <title>User type</title>
</head>

    <style>
        a {
            text-decoration: none;
            color: #000000de;
        }

        .boxes{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            min-height: 60vh;
            padding-top: 50px;
            padding-bottom: 20px;
            transition: transform 0.5s ease;
        }
        
        html, body{
            overflow-x: auto;
        }

    </style>


<div class="row">
    <a href="index.php">
        <img src="usertype_back.png" class="back-icon" alt="Back Icon">
    </a><span class="text-after-icon" style="font-size: 35px"><b>Sign Up</b></span>

    <div class="row" style="justify-content: right; padding-right: 20px;">
        <img src="logo_dark.png" style="max-width: 23%;
        height: auto;">
    </div>

</div>
<body style="background-image: url('usertype_bg.png');">
    
<!-- <p style="padding-top: 50px; display: flex; font-size: 25px;
    align-items: center;
    justify-content: center;">Choose account type</p> -->
    <div class="boxes">
        <a href="student_register.php" class="box form-box icon-student" style="background: #ededed; border: 6px solid #07690B; height: 300px; width: 350px; border-radius: 50px;">
            <header>Student</header>
            <img src="student.png" alt="iconstudent" style="align-items: center; width: 200px; height: 200px;">
        </a>
        <a href="teacher_register.php" class="box form-box icon-teacher" style="background: #ededed; border: 6px solid #07690B; height: 300px; width: 350px; border-radius: 50px;">
            <header>Teacher</header>
            <img src="teacher.png" alt="iconteacher" style="align-items: center; width: 200px; height: 200px;">
        </a>
    </div>
</body>
</html>