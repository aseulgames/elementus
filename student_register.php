<?php
    session_start();

    include("php/config.php");
?>

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
</style>

<body style="background-image: url('studentreg_bg.png');">

    <div class="row">
        <a href="usertype.php">
            <img src="student_back.png" class="back-icon" alt="Back Icon">
        </a><span class="studentregister-text"><b>Sign Up as Student</b></span>

        <div class="row" style="justify-content: right; padding-right: 20px;">
            <img src="logo_dark.png" style="max-width: 23%; height: auto;">
        </div>

    </div>

    <div class="register-container" style="min-height: 60vh;">
        <div class="faded-box register-box"></div>
        <div class="faded-box register-box" style="width: 56%; height: 55%; 
            border: 2px solid #AF6611;
            background-color: #F9FAFB;"></div>
        <div class="register-box form-box" style="background: #ededed; border: 2px solid #AF6611;height: 60%; width: 53%;">
        <?php
        $errorMessages = array(); // Array to store error messages
        $retainedFirstName = '';
        $retainedLastName = '';
        $retainedUsername = '';
        $retainedEmail = '';

        if (isset($_POST['submit'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm'];

            // Verify unique email
            $verify_query = mysqli_query($con, "SELECT Email FROM students WHERE Email='$email'");
            if (mysqli_num_rows($verify_query) != 0) {
                $errorMessages[] = "This email is already used";
            }
            if ($password !== $confirmPassword) {
                $errorMessages[] = "Passwords do not match";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, '.com') === false) {
                $errorMessages[] = "Please enter a valid email with '@' and '.com'";
            }
            if (strlen($password) < 8) {
                $errorMessages[] = "Password must be at least 8 characters long";
            }

            if (!empty($errorMessages)) {

                foreach ($errorMessages as $errorMessage) {
                    echo "<div class='message'>
                            <p>$errorMessage</p>
                        </div><br>";
                }
                echo "<button class='btn' onclick='goBack()'>Back</button>";
                
                $retainedFirstName = $fname;
                $retainedLastName = $lname;
                $retainedUsername = $username;
                $retainedEmail = $email;
            } else {
                mysqli_query($con, "INSERT INTO students(FirstName, LastName, Username, Email, Password) VALUES('$fname', '$lname', '$username', '$email', '$password')") or die("Error occurred");

                echo "<div class='message'>
                        <p>Registration successful</p>
                    </div><br>";
                echo "<a href='index.php'><button class='btn'>Login Now</button>";
            }
        } else {
        ?>    
        <form action="" method="post">

                <div class="name-row" style="display: flex; align-items: center;">
                    <div class="field input" style="margin-right: 10px; width: 100%;">
                        <input placeholder="First Name" type="text" name="fname" id="fname" required style="background-color: #F8D6B3;" value="<?php echo $retainedFirstName ?>">
                    </div>

                    <div class="field input" style="width: 100%;">
                        <input placeholder="Last Name" type="text" name="lname" id="lname" required style="background-color: #F8D6B3;"  value="<?php echo $retainedLastName; ?>">
                    </div>
                </div>

                <div class="name-row" style="display: flex; align-items: center;">
                    <div class="field input" style="margin-right: 10px; width: 40%;">
                        <input placeholder="Username" type="text" name="username" id="username" required style="background-color: #F8D6B3;" value="<?php echo $retainedUsername; ?>">
                    </div>
    
                    <div class="field input" style="width: 60%;">
                        <input placeholder="Email" type="text" name="email" id="email" required style="background-color: #F8D6B3;" value="<?php echo $retainedEmail; ?>">
                    </div>
                </div>


                <div class="field input">
                    <input placeholder="Password" type="password" name="password" id="password" autocomplete="off" required style="background-color: #F8D6B3;">
                </div>

                <div class="field input">
                    <input placeholder="Confirm Password" type="password" name="confirm" id="confirm" autocomplete="off" required style="background-color: #F8D6B3;">
                </div>
                <div class="button-row" style="display: flex; margin-top: 20px; justify-content: right;">
                    <button type="submit" class="btn" onclick="goBack()" name="cancel" value="Cancel" style="margin-right: 10px; background-color: #E24B4B;">Cancel</button>
                    <button type="submit" class="btn" name="submit" value="Submit" style="margin-right: 10px; background-color: #E2AF4B;">Submit</button>
                </div>
                
            </form>
            <?php } ?>
        </div>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>

</body>
</html>
