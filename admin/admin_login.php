<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$con = mysqli_connect("localhost", "root", "", "elementus_log") or die("Can't connect");

$errorMessage = "";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM admins WHERE Username='$username' AND Password='$password'") or die("Error: " . mysqli_error($con));

    $numRows = mysqli_num_rows($result);

    if ($numRows == 1) {
        $admin = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $admin['Id'];
        $_SESSION['admin_username'] = $admin['Username'];

        header("Location: admin_home.php");
        exit();
    } else {
        $errorMessage = "Wrong Username or Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Login</title>
</head>

<body style="background-image: url('login_bg.png');">

    <div class="container">
        <div class="box form-box">
            <div class="row" style="display: flex; justify-content: center; align-items: center;">
                <div class="logo-row" style="text-align: center;">
                    <img src="logo.png" alt="logopng" class="logopng" style="max-width: 50%; height: auto;">
                </div>
            </div>

            <p class="logintext">Admin Login</p>
            <div class='button-box'>
                <div id="admin-form" class="login-form">
                    <form action="" method="post">
                        <div class="field input">
                            <label for="username" style="font-size: 15px;">Username</label>
                            <input type="text" name="username" id="username" autocomplete="off" required>
                        </div>

                        <div class="field input">
                            <label for="password" style="font-size: 15px;">Password</label>
                            <input type="password" name="password" id="password" autocomplete="off" required>
                        </div>

                        <div class="field" style="align-items: center;">
                            <input type="submit" class="btn" name="submit" value="LOGIN" required>
                        </div>
                    </form>
                </div>
                <?php
                if (!empty($errorMessage)) {
                    echo "<div style='color: red;'>
                        <p>Wrong Username or Password</p>
                        </div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Back</button>";
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        function showForm(formType) {
            const adminForm = document.getElementById("admin-form");

            if (formType === "admin") {
                adminForm.style.display = "block";
            }
        }
    </script>
</body>
</html>
