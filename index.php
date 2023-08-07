<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_try.css">
    <title>Login</title>
    
    
</head>
<body style="background-image: url('login_bg.png');">
    
    <div class="container">
        <div class="box form-box">

        <?php
            include("php/config.php");
            $errorMessage = "";
            if (isset($_POST['submit'])) {
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $occupation = mysqli_real_escape_string($con, $_POST['occupation']);

                
                if($occupation == 'teacher'){
                    $result = mysqli_query($con, "SELECT * FROM teachers WHERE Email='$email' AND Password='$password'") or die("Error");
                    $row = mysqli_fetch_assoc($result);

                    if (is_array($row) && !empty($row)) {
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['fname'] = $row['FirstName'];
                        $_SESSION['lname'] = $row['LastName'];
                        $_SESSION['id'] = $row['Id'];
                
                         header("Location: hometeacher.php");
                         exit();
                    } else {
                        echo "<div style='color: aliceblue;'>
                        <p>Wrong Email or Password</p>
                        </div><br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Back</button>";
                    }
                }

                if($occupation == 'student'){
                    $result = mysqli_query($con, "SELECT * FROM students WHERE Email='$email' AND Password='$password'") or die("Error");
                    $row = mysqli_fetch_assoc($result);

                    if (is_array($row) && !empty($row)) {
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['fname'] = $row['FirstName'];
                        $_SESSION['lname'] = $row['LastName'];
                        $_SESSION['id'] = $row['Id'];
                
                        header("Location: entercode.php");
                        exit();
                        
                    } else {
                        echo "<div style='color: aliceblue;'>
                        <p>Wrong Email or Password</p>
                        </div><br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Back</button>";
                    }
                }
                } else {
            
            ?>
            <div class="row" style="display: flex; justify-content: center; align-items: center;;">
                <div class="logo-row" style="text-align: center;">
                    <img src="logo_light.png" alt="logopng" class="logopng" style="max-width: 50%;
                    height: auto;">
                </div>
            </div>

            
        <p class="logintext">Login as</p>
        <div class='button-box'>
            <button class='toggle-student' type='button' onclick='showForm("student")' id="student-btn" value="student">Student</button>
            <button class='toggle-teacher' type='button' onclick='showForm("teacher")' id="teacher-btn" value="teacher">Teacher</button>
        </div>
<!--Student Login Form-->
        <div id="student-form" class="login-form" style="display: none;">
                <form action="" method="post">
                    <div class="field input">
                        <label for="email" style="font-size: 15px; color: aliceblue;">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password" style="font-size: 15px; color: aliceblue;">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <input type="hidden" name="occupation" id="occupation" value="student">

                    <div class="field" style="align-items: center;">
                        <input type="submit" class="btn" name="submit" value="LOGIN" required>
                    </div>

                </form>
            </div>

            <div id="teacher-form" class="login-form" style="display: none;">
                <form action="" method="post">
                    <div class="field input">
                        <label for="email" style="font-size: 15px; color: aliceblue;">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password" style="font-size: 15px; color: aliceblue;">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <input type="hidden" name="occupation" id="occupation" value="teacher">

                    <div class="field" style="align-items: center;">
                        <input type="submit" class="btn" name="submit" value="LOGIN" required>
                    </div>
                </form>
            </div>

        <div class="logintext">
                Don't have an account? 
        </div>
        <a class="signup_text" href="usertype.php">Sign-Up</a>
        <?php } ?>
    </div>

    <script>
    function showForm(formType) {

        const studentForm = document.getElementById("student-form");
        const teacherForm = document.getElementById("teacher-form");
        const studentBtn = document.getElementById("student-btn");
        const teacherBtn = document.getElementById("teacher-btn");
        
        if (formType === "student") {
            studentForm.style.display = "block";
            teacherForm.style.display = "none";
            document.getElementById("occupation").value = studentBtn.value;
            studentBtn.classList.add('active');
            teacherBtn.classList.remove('active');
        } else if (formType === "teacher") {
            studentForm.style.display = "none";
            teacherForm.style.display = "block";
            document.getElementById("occupation").value = teacherBtn.value;
            studentBtn.classList.remove('active');
            teacherBtn.classList.add('active');
        }
    }
    </script>
</body>
</html>