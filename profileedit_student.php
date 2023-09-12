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
    <link rel="stylesheet" href="edit.css">
    <title>User type</title>
</head>
<style>
    #submitButton:disabled {
    opacity: 0.5; 
}
</style>

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
<br>

<link rel="stylesheet" href="style.css">

    <div class="register-container" style="min-height: 60vh;">
        <div class="faded-box register-box" style="width: 56%; height: 62%; 
            border: 2px solid #AF6611;
            background-color: #F9FAFB;"></div>
        <div class="register-box form-box" style="background: #f9f9f9; border: 2px solid #AF6611;height: 67%; width: 53%;">
        <header style="font-size: 150%; padding: 2px">Manage Profile</header>
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
                    <label for="email">First Name</label>
                    <input type="text" name="fname" id="fname" value="<?php echo $res_Fname?>" autocomplete="off">
                    </div>

                    <div class="field input" style="width: 100%;">
                    <label for="email">Last Name</label>
                    <input type="text" name="lname" id="lname"  value="<?php echo $res_Lname?>" autocomplete="off">
                    </div>
                </div>

                <div class="name-row" style="display: flex; align-items: center;">
                    <div class="field input" style="margin-right: 10px; width: 40%;">
                    <label for="email">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname?>"  autocomplete="off">
                    </div>
    
                    <div class="field input" style="width: 60%;">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"  value="<?php echo $res_Email?>"  autocomplete="off">
                    </div>
                </div>


                <div class="field input">
                <input placeholder="New Password" type="password" name="password" id="password" autocomplete="off">
                </div>

                <div class="field input">
                <input placeholder="Confirm Password" type="password" name="confirm" id="confirm" autocomplete="off">
                </div>

                <div class="button-row" style="display: flex; margin-top: 20px; justify-content: right;">
                <button type="button" class="btn" onclick="window.history.back()" name="cancel" value="Cancel" style="margin-right: 10px; background-color: #E24B4B; border-radius: 20px;">Cancel</button>
                <button type="submit" id="submitButton" class="btn" name="submit" value="Submit" style="margin-right: 10px; background-color: #E2AF4B; border-radius: 20px;" disabled>Update</button>
                </div>

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