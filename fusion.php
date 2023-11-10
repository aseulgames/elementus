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
    <link rel="stylesheet" href="fusion.css">
</head>

<body>
<div id="stars-popup-container"></div>
    
<div class="dark-overlay"></div>
    <link rel="stylesheet" href="tutorial.css">
    <div class="overlay"></div>
    

    <div class="popup">
        <button id="close">&times;</button>
        <h1 class="purples">Welcome to the Elemental Fusion Game!</h1>
        Combine elements to discover compounds!
        <ul>
        <li><strong>Drag & Drop:</strong> Drag elements to the reaction area, then elements may <strong>combine</strong> to form compounds.</li>
        <li><strong>Discover Reactions:</strong> Experiment to find compound reactions. The game checks and displays known compounds.</li>
        
        <li><strong>Clear Button:</strong> Use the button to start a new experiment.</li>
        <strong>TIP: Explore combinations. Learn chemical formulas. Have fun experimenting!</strong>
    
      </ul>
        <img src="images/fusion_tut_img.png" alt="Tutorial Image" class="tutorial-img"><br>
        <input type="button" value="Got it!" id="okay" class="btn">
    </div>
    <style>
        .popup{
        background: linear-gradient(135deg, #1a5d40, #57c84d);
        }

        #close, #okay {
            background-color: #1e7b1e;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1vw;
            transition: 0.3s;
        }

        #close:hover, #okay:hover {
            background-color: #1a5d40;
            color: #fff;
        }

        h1{
            font-size: 25px;
            text-shadow: 2px 2px 2px #ababab;
            color: #145214;
            font-style: bold;
        }

        .tutorial-img{
            height: 15vw;
            text-align: center;
        }
    </style>

    
        <audio id="backgroundMusic" autoplay loop>
            <source src="game-music.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <div class="mute-icon" onclick="toggleMute()">
            <img id="muteImg" src="images/play.png" alt="Mute">
        </div>

        <audio id="waterDropSound" preload="auto" src="drop.mp3"></audio>

    <main>
    <div class="row" style="padding-top: 20px;">
    <a id="backButton">
        <img src="images/fusion_back.png" class="back-icon" alt="Back Icon" style="width: 20vh;">
    </a><span><img src="images/fuselogo.png" class="iconlogo" style="max-width: 50%;
    min-width: 40%;"></span>

    <div class="row" style="justify-content: right; padding-right: 20px;">
        <img src="logo_dark.png" style="max-width: 25%;
        height: auto; justify-content: right; padding-right: 30px;">
    </div>

</div>
<div class="outer-rounded-square">
<div class="container">
<div class="periodic-table">
        <div class="element H draggable-element" draggable="true" data-state="gas">H</div>
        <div class="element He draggable-element" draggable="true" data-state="gas">He</div>
        <div class="element Li draggable-element" draggable="true" data-state="solid">Li</div>
        <div class="element Be draggable-element" draggable="true" data-state="solid">Be</div>
        <div class="element B draggable-element" draggable="true" data-state="solid">B</div>
        <div class="element C draggable-element" draggable="true" data-state="solid">C</div>
        <div class="element N draggable-element" draggable="true" data-state="gas">N</div>
        <div class="element O draggable-element" draggable="true" data-state="gas">O</div>
        <div class="element F draggable-element" draggable="true" data-state="gas">F</div>
        <div class="element Ne draggable-element" draggable="true" data-state="gas">Ne</div>
        <div class="element Na draggable-element" draggable="true" data-state="solid">Na</div>


        <div class="element Mg draggable-element" draggable="true" data-state="solid">Mg</div>
        <div class="element Al draggable-element" draggable="true" data-state="solid">Al</div>
        <div class="element Si draggable-element" draggable="true" data-state="solid">Si</div>
        <div class="element P draggable-element" draggable="true" data-state="solid">P</div>
        <div class="element S draggable-element" draggable="true" data-state="solid">S</div>
        <div class="element Cl draggable-element" draggable="true" data-state="gas">Cl</div>
        <div class="element Ar draggable-element" draggable="true" data-state="gas">Ar</div>
        <div class="element K draggable-element" draggable="true" data-state="solid">K</div>
        <div class="element Ca draggable-element" draggable="true" data-state="solid">Ca</div>
        <div class="element Sc draggable-element" draggable="true" data-state="solid">Sc</div>
        <div class="element Ti draggable-element" draggable="true" data-state="solid">Ti</div>
        <div class="element V draggable-element" draggable="true" data-state="solid">V</div>
        <div class="element Cr draggable-element" draggable="true" data-state="solid">Cr</div>
        <div class="element Mn draggable-element" draggable="true" data-state="solid">Mn</div>
        <div class="element Fe draggable-element" draggable="true" data-state="solid">Fe</div>
        <div class="element Ni draggable-element" draggable="true" data-state="solid">Ni</div>
        <div class="element Co draggable-element" draggable="true" data-state="solid">Co</div>
        <div class="element Cu draggable-element" draggable="true" data-state="solid">Cu</div>
        <div class="element Zn draggable-element" draggable="true" data-state="solid">Zn</div>
        <div class="element Ga draggable-element" draggable="true" data-state="solid">Ga</div>
        <div class="element Ge draggable-element" draggable="true" data-state="solid">Ge</div>
        <div class="element As draggable-element" draggable="true" data-state="solid">As</div>
        <div class="element Se draggable-element" draggable="true" data-state="solid">Se</div>
        <div class="element Br draggable-element" draggable="true" data-state="liquid">Br</div>
        <div class="element Kr draggable-element" draggable="true" data-state="gas">Kr</div>
        <div class="element Rb draggable-element" draggable="true" data-state="solid">Rb</div>
        <div class="element Sr draggable-element" draggable="true" data-state="solid">Sr</div>
        <div class="element Y draggable-element" draggable="true" data-state="solid">Y</div>
        <div class="element Zr draggable-element" draggable="true" data-state="solid">Zr</div>
        <div class="element Nb draggable-element" draggable="true" data-state="solid">Nb</div>
        <div class="element Mo draggable-element" draggable="true" data-state="solid">Mo</div>
        <div class="element Tc draggable-element" draggable="true" data-state="solid">Tc</div>
        <div class="element Ru draggable-element" draggable="true" data-state="solid">Ru</div>


        <div class="element Rh draggable-element" draggable="true" data-state="solid">Rh</div>
        <div class="element Pd draggable-element" draggable="true" data-state="solid">Pd</div>
        <div class="element Ag draggable-element" draggable="true" data-state="solid">Ag</div>
        <div class="element Cd draggable-element" draggable="true" data-state="solid">Cd</div>
        <div class="element In draggable-element" draggable="true" data-state="solid">In</div>
        <div class="element Sn draggable-element" draggable="true" data-state="solid">Sn</div>
        <div class="element Sb draggable-element" draggable="true" data-state="solid">Sb</div>
        <div class="element Te draggable-element" draggable="true" data-state="solid">Te</div>
        <div class="element I draggable-element" draggable="true" data-state="solid">I</div>
        <div class="element Xe draggable-element" draggable="true" data-state="gas">Xe</div>
        <div class="element Cs draggable-element" draggable="true" data-state="solid">Cs</div>
        <div class="element Ba draggable-element" draggable="true" data-state="solid">Ba</div>
        <div class="element La draggable-element" draggable="true" data-state="solid">La</div>
        <div class="element Ce draggable-element" draggable="true" data-state="solid">Ce</div>
        <div class="element Pr draggable-element" draggable="true" data-state="solid">Pr</div>
        <div class="element Nd draggable-element" draggable="true" data-state="solid">Nd</div>
        <div class="element Pm draggable-element" draggable="true" data-state="solid">Pm</div>
        <div class="element Sm draggable-element" draggable="true" data-state="solid">Sm</div>
        <div class="element Eu draggable-element" draggable="true" data-state="solid">Eu</div>
        <div class="element Gd draggable-element" draggable="true" data-state="solid">Gd</div>
        <div class="element Tb draggable-element" draggable="true" data-state="solid">Tb</div>
        <div class="element Dy draggable-element" draggable="true" data-state="solid">Dy</div>
        <div class="element Ho draggable-element" draggable="true" data-state="solid">Ho</div>
        <div class="element Er draggable-element" draggable="true" data-state="solid">Er</div>
        <div class="element Tm draggable-element" draggable="true" data-state="solid">Tm</div>
        <div class="element Yb draggable-element" draggable="true" data-state="solid">Yb</div>
        <div class="element Lu draggable-element" draggable="true" data-state="solid">Lu</div>
        <div class="element Hf draggable-element" draggable="true" data-state="solid">Hf</div>
        <div class="element Ta draggable-element" draggable="true" data-state="solid">Ta</div>
        <div class="element W draggable-element" draggable="true" data-state="solid">W</div>
        <div class="element Re draggable-element" draggable="true" data-state="solid">Re</div>
        <div class="element Os draggable-element" draggable="true" data-state="solid">Os</div>
        <div class="element Ir draggable-element" draggable="true" data-state="solid">Ir</div>
        <div class="element Pt draggable-element" draggable="true" data-state="solid">Pt</div>
        <div class="element Au draggable-element" draggable="true" data-state="solid">Au</div>
        <div class="element Hg draggable-element" draggable="true" data-state="liquid">Hg</div>
        <div class="element Tl draggable-element" draggable="true" data-state="solid">Tl</div>
        <div class="element Pb draggable-element" draggable="true" data-state="solid">Pb</div>
        <div class="element Bi draggable-element" draggable="true" data-state="solid">Bi</div>
        <div class="element Po draggable-element" draggable="true" data-state="solid">Po</div>
        <div class="element At draggable-element" draggable="true" data-state="solid">At</div>
        <div class="element Rn draggable-element" draggable="true" data-state="gas">Rn</div>



        <div class="element Fr draggable-element" draggable="true" data-state="solid">Fr</div>
        <div class="element Ra draggable-element" draggable="true" data-state="solid">Ra</div>
        <div class="element Ac draggable-element" draggable="true" data-state="solid">Ac</div>
        <div class="element Rf draggable-element" draggable="true" data-state="solid">Rf</div>
        <div class="element Db draggable-element" draggable="true" data-state="solid">Db</div>
        <div class="element Sg draggable-element" draggable="true" data-state="solid">Sg</div>
        <div class="element Bh draggable-element" draggable="true" data-state="solid">Bh</div>
        <div class="element Hs draggable-element" draggable="true" data-state="solid">Hs</div>
        <div class="element Mt draggable-element" draggable="true" data-state="solid">Mt</div>
        <div class="element Ds draggable-element" draggable="true" data-state="solid">Ds</div>
        <div class="element Rg draggable-element" draggable="true" data-state="solid">Rg</div>
        <div class="element Cn draggable-element" draggable="true" data-state="solid">Cn</div>
        <div class="element Nh draggable-element" draggable="true" data-state="solid">Nh</div>
        <div class="element Fl draggable-element" draggable="true" data-state="solid">Fl</div>
        <div class="element Mc draggable-element" draggable="true" data-state="solid">Mc</div>
        <div class="element Lv draggable-element" draggable="true" data-state="solid">Lv</div>
        <div class="element Ts draggable-element" draggable="true" data-state="solid">Ts</div>
        <div class="element Og draggable-element" draggable="true" data-state="solid">Og</div>

        <div class="element Th draggable-element" draggable="true" data-state="solid">Th</div>
        <div class="element Pa draggable-element" draggable="true" data-state="solid">Pa</div>
        <div class="element U draggable-element" draggable="true" data-state="solid">U</div>
        <div class="element Np draggable-element" draggable="true" data-state="solid">Np</div>
        <div class="element Pu draggable-element" draggable="true" data-state="solid">Pu</div>
        <div class="element Am draggable-element" draggable="true" data-state="solid">Am</div>
        <div class="element Cm draggable-element" draggable="true" data-state="solid">Cm</div>
        <div class="element Bk draggable-element" draggable="true" data-state="solid">Bk</div>
        <div class="element Cf draggable-element" draggable="true" data-state="solid">Cf</div>
        <div class="element Es draggable-element" draggable="true" data-state="solid">Es</div>
        <div class="element Fm draggable-element" draggable="true" data-state="solid">Fm</div>
        <div class="element Md draggable-element" draggable="true" data-state="solid">Md</div>
        <div class="element No draggable-element" draggable="true" data-state="solid">No</div>
        <div class="element Lr draggable-element" draggable="true" data-state="solid">Lr</div>

    </div>
    </div>
</div>
    <div class="boxes-container">
                <button class="clear-area">&#10008;</button>
                <div class="reaction-area"></div>
                <div class="goal-box">
                    GOAL: Your Goal Text Here
                </div>
            </div>
    </main>
    <script>
        document.getElementById("backButton").onclick = function() {
            history.back(); 
        };
    </script>

    <script src="puzzle.js"></script>

    <script src="music.js"></script>

    <script src="fusion.js"></script>

</body>
</html>