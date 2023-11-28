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
            background-image: url('images/puzzlebg.png'); 
        }

        .nav{
            background: linear-gradient(-45deg, #f5ceff8e, #7b4dff8e, #ff4df87e);
        }

        .retry-button {
            position: absolute;
            border: none;
            border-radius: 30px; /* Remove circular border */
            padding: 10px; /* Adjust padding as needed */
            cursor: pointer;
            top: 89%;
            right: 50%;
            background: #fff;
            margin: -9px auto;
        }

        .retry-button img {
            width: 30px; /* Adjust icon size as needed */
            height: 30px; /* Adjust icon size as needed */
        }


        .outer-rounded-square {
            width: 80vw;
            height: 80vw;
            max-width: 900px;
            max-height: 500px;
            background: linear-gradient(0deg, #040305, #ff2f73);
            border-radius: 50px;
            border: solid 5px #fff;
            margin: 40px auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            box-sizing: border-box;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            overflow: hidden;
        }

        .inner-rounded-square {
            width: 80vw;
            height: 80vw;
            max-width: 660px;
            max-height: 190px;
            background: radial-gradient(ellipse at center, #ff2f73, #ff2f73, #040305); /* Center color is #ff2f73 */
            border-radius: 60px;
            border: solid 5px #fff;
            box-sizing: border-box;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-content: space-around;
            margin: 70px auto 45px auto; /* Adjust margins as needed */
            padding: 20px;
            overflow: hidden;
            background-size: 100% 100%;
        }


        .periodic-table {
            display: grid;
            grid-template-columns: repeat(18, 1fr);
            gap: 4px;
            max-width: 100%;
            width: auto;
            padding: 5px;
            box-sizing: border-box;
            justify-content: start;
        }

        .element {
            width: 3vw;
            height: 3vw;
            background-color: #ccc;
            color: #292929;
            border: 1px solid #edb0ce;
            border-radius: 5px;
            text-align: center;
            line-height: 40px;
            font-size: 0.8em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
            user-select: none;
            font-family: 'Sigmar One', cursive, sans-serif;
            opacity: .7;
        }

        .draggable-element {
            width: 40px;
            height: 40px;
            background-color: #000;
            color: #fff;
            border: 1px solid #fff;
            text-align: center;
            border-radius: 5px;
            line-height: 40px;
            cursor: pointer;
            margin: 2px;
            font-size: 0.8em;
            draggable: true;
            font-family: 'Sigmar One', cursive, sans-serif;
        }

        .element.La, .element.Ce, .element.Pr, .element.Nd, .element.Pm, .element.Sm, .element.Eu, .element.Gd, .element.Tb, .element.Dy, .element.Ho, .element.Er, .element.Tm, .element.Yb, .element.Lu {
            background: #edb0ce;
            margin-right: 5px;
        }
        .element.Ac, .element.Th, .element.Pa,
        .element.U, .element.Np, .element.Pu,
        .element.Am, .element.Cm, .element.Bk,
        .element.Cf, .element.Es, .element.Fm,
        .element.Md, .element.No, .element.Lr {
            background: #ad8500;
        }

        .element.La {
            grid-row: 8 / span 2;
            grid-column: 4 / span 2;
        }

        .element.Ce {
            grid-row: 8 / span 2;
            grid-column: 5 / span 2;
        }

        .element.Pr {
            grid-row: 8 / span 2;
            grid-column: 6 / span 2;
        }

        .element.Nd {
            grid-row: 8 / span 2;
            grid-column: 7 / span 2;
        }

        .element.Pm {
            grid-row: 8 / span 2;
            grid-column: 8 / span 2;
        }

        .element.Sm {
            grid-row: 8 / span 2;
            grid-column: 9 / span 2;
        }

        .element.Eu {
            grid-row: 8 / span 2;
            grid-column: 10 / span 2;
        }

        .element.Gd {
            grid-row: 8 / span 2;
            grid-column: 11 / span 2;
        }

        .element.Tb {
            grid-row: 8 / span 2;
            grid-column: 12 / span 2;
        }

        .element.Dy {
            grid-row: 8 / span 2;
            grid-column: 13 / span 2;
        }

        .element.Ho {
            grid-row: 8 / span 2;
            grid-column: 14 / span 2;
        }

        .element.Er {
            grid-row: 8 / span 2;
            grid-column: 15 / span 2;
        }

        .element.Tm {
            grid-row: 8 / span 2;
            grid-column: 16 / span 2;
        }

        .element.Yb {
            grid-row: 8 / span 2;
            grid-column: 17 / span 2;
        }

        .element.Lu {
            grid-row: 8 / span 2;
            grid-column: 18 / span 2;
        }

        .element.Ac {
            grid-row: 10 / span 2;
            grid-column: 4 / span 2;
        }

        .element.Th {
            grid-row: 10 / span 2;
            grid-column: 5 / span 2;
        }

        .element.Pa {
            grid-row: 10 / span 2;
            grid-column: 6 / span 2;
        }

        .element.U {
            grid-row: 10 / span 2;
            grid-column: 7 / span 2;
        }

        .element.Np {
            grid-row: 10 / span 2;
            grid-column: 8 / span 2;
        }

        .element.Pu {
            grid-row: 10 / span 2;
            grid-column: 9 / span 2;
        }

        .element.Am {
            grid-row: 10 / span 2;
            grid-column: 10 / span 2;
        }

        .element.Cm {
            grid-row: 10 / span 2;
            grid-column: 11 / span 2;
        }

        .element.Bk {
            grid-row: 10 / span 2;
            grid-column: 12 / span 2;
        }

        .element.Cf {
            grid-row: 10 / span 2;
            grid-column: 13 / span 2;
        }

        .element.Es {
            grid-row: 10/ span 2;
            grid-column: 14 / span 2;
        }

        .element.Fm {
            grid-row: 10 / span 2;
            grid-column: 15 / span 2;
        }

        .element.Md {
            grid-row: 10 / span 2;
            grid-column: 16 / span 2;
        }

        .element.No {
            grid-row: 10 / span 2;
            grid-column: 17 / span 2;
        }

        .element.Lr {
            grid-row: 10 / span 2;
            grid-column: 18 / span 2;
        }


        /* Empty Block in Row 6 */
        .empty-block-row8 {
            grid-row: 9 / span 2;
            grid-column: 5 / span 2;
        }

        /* Empty Block in Row 7 */
        .empty-block-row9 {
            grid-row: 11 / span 2;
            grid-column: 5 / span 2;
        }


        .element-list {
            display: flex;
            flex-wrap: wrap;
            gap: 2px;
            justify-content: center;
            max-width: 100%; /* Make it responsive */
            width: 100%;
        }

        @media (max-width: 768px) {
            .outer-rounded-square {
                /* width: 90vw;
                height: 90vw;
                max-width: 400px;
                max-height: 400px; */
                z-index: 2;
            }

            .inner-rounded-square {
                width: 80%;
                height: 50vw;
                max-height: 200px;
            }
        }

        .tooltip-text {
            display: none;
            position: fixed;
            z-index: 9999;
            color: white;
            font-size: 12px;
            background-color: #192733;
            border-radius: 10px;
            padding: 10px 15px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;

            top: 50%;
        }



        #fade {
            opacity: 0;
            transition: opacity 0.5s;
        }

        .hover-text:hover #fade { 
            opacity: 1; 
        }


        .hover-text {
            position: relative;
            display: inline-block;
            text-align: center;
        }

        h1{
            font-size: 30px;
            text-shadow: 2px 2px 2px #ababab;
            color: #6003b4;
            font-style: bold;
        }
        
        .matched-element {
            opacity: 1; /* Full opacity for matched elements */
        }

    </style>
</head>
<body>

<body>
<div id="stars-popup-container"></div>
<link rel="stylesheet" href="tutorial.css">
<div class="overlay"></div>


</div>
        <audio id="backgroundMusic" autoplay loop>
            <source src="games.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <audio id="correctMatchSound">
            <source src="correct.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <audio id="wrongMatchSound">
            <source src="wrong.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <div class="mute-icon" onclick="toggleMute()">
            <img id="muteImg" src="images/play.png" alt="Mute">
        </div>
    <main>
    <div class="row" style="padding-top: 20px;">
    <a id="backButton">
        <img src="puzzle_back.png" class="back-icon" alt="Back Icon" style="width: 20vh;">
    </a><span><img src="images/puzzlelogo.png" class="iconlogo" style="max-width: 50%;
    min-width: 40%;"></span>

    <div class="row" style="justify-content: right; padding-right: 20px;">
        <img src="logo_dark.png" style="max-width: 25%;
        height: auto; justify-content: right; padding-right: 30px;">
    </div>
</div>

<div id="stars-popup-container">
<div class="stars-and-wrapper">
    <i class="star" id="totalStarsDisplay">★ 0</i>
        <style>
            .star {
                color: #ffd700;
                font-size: 200%;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
                margin-left: 5%;
            }
        </style>
<div class="outer-rounded-square">
<div class="container">
<div class="periodic-table">

<!-- Row 8 -->
<div class="empty-block-row7" data-position="8,1">
    <!-- Empty block, no specific element -->
</div>

<div class="empty-block-row7" data-position="8,2">
    <!-- Empty block, no specific element -->
</div>

<div class="empty-block-row7" data-position="8,3">
    <!-- Empty block, no specific element -->
</div>

<div class="element La hover-text" data-element="La" data-position="8,4">57</div>
<span class="tooltip-text" id="fade-La">Ceramic catalysts and high-strength, lightweight alloys.</span>

<div class="element Ce hover-text" data-element="Ce" data-position="8,5">58</div>
<span class="tooltip-text" id="fade-Ce">Critical component in catalytic converters for vehicles.</span>

<div class="element Pr hover-text" data-element="Pr" data-position="8,6">59</div>
<span class="tooltip-text" id="fade-Pr">Used in magnets, lasers, and certain types of lighting.</span>

<div class="element Nd hover-text" data-element="Nd" data-position="8,7">60</div>
<span class="tooltip-text" id="fade-Nd">Key component in permanent magnets for electric vehicle motors.</span>

<div class="element Pm hover-text" data-element="Pm" data-position="8,8">61</div>
<span class="tooltip-text" id="fade-Pm">Radioactive; used in certain medical imaging devices.</span>

<div class="element Sm hover-text" data-element="Sm" data-position="8,9">62</div>
<span class="tooltip-text" id="fade-Sm">Key component in magnets and control rods for nuclear reactors.</span>

<div class="element Eu hover-text" data-element="Eu" data-position="8,10">63</div>
<span class="tooltip-text" id="fade-Eu">Used in phosphors for color displays in certain devices.</span>

<div class="element Gd hover-text" data-element="Gd" data-position="8,11">64</div>
<span class="tooltip-text" id="fade-Gd">Key component in magnetic resonance imaging (MRI) contrast agents.</span>

<div class="element Tb hover-text" data-element="Tb" data-position="8,12">65</div>
<span class="tooltip-text" id="fade-Tb">Used in phosphors for fluorescent lamps and certain devices.</span>

<div class="element Dy hover-text" data-element="Dy" data-position="8,13">66</div>
<span class="tooltip-text" id="fade-Dy">Key component in powerful magnets for various applications.</span>

<div class="element Ho hover-text" data-element="Ho" data-position="8,14">67</div>
<span class="tooltip-text" id="fade-Ho">Used in magnets for electronic and medical devices.</span>

<div class="element Er hover-text" data-element="Er" data-position="8,15">68</div>
<span class="tooltip-text" id="fade-Er">Key component in lasers and certain types of lighting.</span>

<div class="element Tm hover-text" data-element="Tm" data-position="8,16">69</div>
<span class="tooltip-text" id="fade-Tm">Used in medical imaging devices and portable X-ray machines.</span>

<div class="element Yb hover-text" data-element="Yb" data-position="8,17">70</div>
<span class="tooltip-text" id="fade-Yb">Key component in certain lasers and nuclear medicine.</span>

<div class="element Lu hover-text" data-element="Lu" data-position="8,18">71</div>
<span class="tooltip-text" id="fade-Lu">Used in certain types of medical imaging and cancer treatment.</span>


<!-- ROw 9 -->

<div class="empty-block-row7" data-position="9,1">
    <!-- Empty block, no specific element -->
</div>
<div class="empty-block-row7" data-position="9,2">
    <!-- Empty block, no specific element -->
</div>
<div class="empty-block-row7" data-position="9,3">
    <!-- Empty block, no specific element -->
</div>

<!-- Row 9 -->
<div class="element Ac hover-text" data-element="Ac" data-position="9,4">89</div>
<span class="tooltip-text" id="fade-Ac">Used in radiation therapy for cancer treatment.</span>

<div class="element Th hover-text" data-element="Th" data-position="9,5">90</div>
<span class="tooltip-text" id="fade-Th">Powerful source in nuclear reactors for electricity generation.</span>

<div class="element Pa hover-text" data-element="Pa" data-position="9,6">91</div>
<span class="tooltip-text" id="fade-Pa">Key component in nuclear reactors for electricity generation.</span>

<div class="element U hover-text" data-element="U" data-position="9,7">92</div>
<span class="tooltip-text" id="fade-U">Versatile element for nuclear reactors and nuclear weapons.</span>

<div class="element Np hover-text" data-element="Np" data-position="9,8">93</div>
<span class="tooltip-text" id="fade-Np">Synthetic element used in nuclear reactors and scientific research.</span>

<div class="element Pu hover-text" data-element="Pu" data-position="9,9">94</div>
<span class="tooltip-text" id="fade-Pu">Synthetic element used in nuclear reactors and scientific research.</span>

<div class="element Am hover-text" data-element="Am" data-position="9,10">95</div>
<span class="tooltip-text" id="fade-Am">Synthetic element used in smoke detectors and neutron sources.</span>

<div class="element Cm hover-text" data-element="Cm" data-position="9,11">96</div>
<span class="tooltip-text" id="fade-Cm">Synthetic element used in scientific research and neutron sources.</span>

<div class="element Bk hover-text" data-element="Bk" data-position="9,12">97</div>
<span class="tooltip-text" id="fade-Bk">Synthetic element used in scientific research and neutron sources.</span>

<div class="element Cf hover-text" data-element="Cf" data-position="9,13">98</div>
<span class="tooltip-text" id="fade-Cf">Synthetic element used in scientific research and neutron sources.</span>

<div class="element Es hover-text" data-element="Es" data-position="9,14">99</div>
<span class="tooltip-text" id="fade-Es">Synthetic element used in scientific research and neutron sources.</span>

<div class="element Fm hover-text" data-element="Fm" data-position="9,15">100</div>
<span class="tooltip-text" id="fade-Fm">Synthetic element used in scientific research and neutron sources.</span>

<div class="element Md hover-text" data-element="Md" data-position="9,16">101</div>
<span class="tooltip-text" id="fade-Md">Synthetic element used in scientific research and neutron sources.</span>

<div class="element No hover-text" data-element="No" data-position="9,17">102</div>
<span class="tooltip-text" id="fade-No">Synthetic element used in scientific research and neutron sources.</span>

<div class="element Lr hover-text" data-element="Lr" data-position="9,18">103</div>
<span class="tooltip-text" id="fade-Lr">Synthetic element used in scientific research and neutron sources.</span>

</div>

<div class="inner-rounded-square">
    <div class="element-list">

        <!-- Elements 57-71 (Row 8) -->
        <div class="draggable-element" id="element-La" data-element="La" draggable="true">La</div>
        <div class="draggable-element" id="element-Ce" data-element="Ce" draggable="true">Ce</div>
        <div class="draggable-element" id="element-Pr" data-element="Pr" draggable="true">Pr</div>
        <div class="draggable-element" id="element-Nd" data-element="Nd" draggable="true">Nd</div>
        <div class="draggable-element" id="element-Pm" data-element="Pm" draggable="true">Pm</div>
        <div class="draggable-element" id="element-Sm" data-element="Sm" draggable="true">Sm</div>
        <div class="draggable-element" id="element-Eu" data-element="Eu" draggable="true">Eu</div>
        <div class="draggable-element" id="element-Gd" data-element="Gd" draggable="true">Gd</div>
        <div class="draggable-element" id="element-Tb" data-element="Tb" draggable="true">Tb</div>
        <div class="draggable-element" id="element-Dy" data-element="Dy" draggable="true">Dy</div>
        <div class="draggable-element" id="element-Ho" data-element="Ho" draggable="true">Ho</div>
        <div class="draggable-element" id="element-Er" data-element="Er" draggable="true">Er</div>
        <div class="draggable-element" id="element-Tm" data-element="Tm" draggable="true">Tm</div>
        <div class="draggable-element" id="element-Yb" data-element="Yb" draggable="true">Yb</div>
        <div class="draggable-element" id="element-Lu" data-element="Lu" draggable="true">Lu</div>

        <!-- Elements 89-103 (Row 9) -->
        <div class="draggable-element" id="element-Ac" data-element="Ac" draggable="true">Ac</div>
        <div class="draggable-element" id="element-Th" data-element="Th" draggable="true">Th</div>
        <div class="draggable-element" id="element-Pa" data-element="Pa" draggable="true">Pa</div>
        <div class="draggable-element" id="element-U" data-element="U" draggable="true">U</div>
        <div class="draggable-element" id="element-Np" data-element="Np" draggable="true">Np</div>
        <div class="draggable-element" id="element-Pu" data-element="Pu" draggable="true">Pu</div>
        <div class="draggable-element" id="element-Am" data-element="Am" draggable="true">Am</div>
        <div class="draggable-element" id="element-Cm" data-element="Cm" draggable="true">Cm</div>
        <div class="draggable-element" id="element-Bk" data-element="Bk" draggable="true">Bk</div>
        <div class="draggable-element" id="element-Cf" data-element="Cf" draggable="true">Cf</div>
        <div class="draggable-element" id="element-Es" data-element="Es" draggable="true">Es</div>
        <div class="draggable-element" id="element-Fm" data-element="Fm" draggable="true">Fm</div>
        <div class="draggable-element" id="element-Md" data-element="Md" draggable="true">Md</div>
        <div class="draggable-element" id="element-No" data-element="No" draggable="true">No</div>
        <div class="draggable-element" id="element-Lr" data-element="Lr" draggable="true">Lr</div>
        

            <!-- Repeat for other draggable elements -->
            <a href="puzzle-lvl2.php">
            <button class="retry-button" >
            <!-- onclick="restartGame()" -->
                <img src="images/memory/retry-icon.png" alt="Retry Icon">
            </button></a>

        </div>

        
    </div>
    </div>
</div>
    </main>

<script src="puzzle.js"></script>
    <script>
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        // Select all draggable elements
        const draggableElements = Array.from(document.querySelectorAll('.draggable-element'));

        // Shuffle the array of draggable elements
        const shuffledElements = shuffleArray(draggableElements);

        // Get the container where elements will be appended
        const container = document.querySelector('.element-list');

        // Append the shuffled elements to the container
        shuffledElements.forEach(element => {
            container.appendChild(element);
        });
    </script>
    <script>
    function updateStarDisplay(value = 0) {
        totalStars = Math.max(totalStars + value, 0);
        const totalStarsDiv = document.getElementById("totalStarsDisplay");
        totalStarsDiv.innerHTML = `★ ${totalStars} `;
    }

    function showStarsPopup() {
        console.log('showStarsPopup called');
        // Rest of your existing code for the popup
        const popupContainer = document.getElementById("stars-popup-container");
        const popup = document.createElement("div");
        popup.className = "stars-popup";

        popup.innerHTML = `
            <p>Congratulations! You completed the level with ${totalStars} stars.</p>
            <button id="nextLevelButton">Next Level</button>
        `;

        popupContainer.appendChild(popup);

        const nextLevelButton = popup.querySelector("#nextLevelButton");
        nextLevelButton.addEventListener("click", function () {
            // Navigate to the next level or PHP page
            window.location.href = "gamechoices.php"; // Replace with the appropriate URL
        });
    }

        document.getElementById("backButton").onclick = function() {
            history.back();
        };
    </script>

    <script src="music.js"></script>


</body>
</html>