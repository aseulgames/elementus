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


<div class="row">
    <div class="row" style="justify-content: left; padding-left: 30px;">
        <img src="logo_dark.png" style="max-width: 23%;
        height: auto;">
    </div>

</div>
<body style="background-image: url('code_bg.png');">
    <div style="display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    min-height: 60vh;
    padding-top: 50px;
    transition: transform 0.5s ease;">
        
        <div class="register-container" style="min-height: 50vh;">
            <div class="form-box register-box2" style="background: #ededed ;height: 40%; width: 40%;">
                <form action="" method="post">
                    <header style="font-size: large; padding-top: 0px; 
                    font-weight: 1000;
                    padding-bottom: 10px;
                    border-bottom: 0px;
                    margin-bottom: 5px;
                    color: #032B60;"><b>Enter teacher's code</b></header>
                        <div class="field input" style="padding-top: 5px;">
                            <input type="number" name="confirm" id="confirm" autocomplete="off" style="background-color: #0DADB4; color: aliceblue;">
                        </div>
                        <div class="button-row" style="display: flex; margin-top: 20px; justify-content: center;">
                            <button type="button" class="btn" name="submit" value="Submit"><b>PROCEED</b></button>
                        </div>
                        <a href="homestudent.php" style="font-size: 15px; padding-top: 5px;
                        color: #6A08C4; 
                        font-weight: 300;
                        align-items: center;
                        justify-content: center;
                        display: flex;"><u>Skip</u></a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>