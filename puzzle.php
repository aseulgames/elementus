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
            margin: -12px auto;
        }

        .retry-button img {
            width: 35px; /* Adjust icon size as needed */
            height: 35px; /* Adjust icon size as needed */
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
            width: 60vw;
            height: 60vw;
            max-width: 630px;
            max-height: 180px;
            background: radial-gradient(ellipse at center, #ff2f73, #ff2f73, #040305); /* Center color is #ff2f73 */
            border-radius: 60px;
            border: solid 5px #fff;
            box-sizing: border-box;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-content: space-around;
            margin: 5px auto 45px auto; /* Adjust margins as needed */
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

        .element.H,
        .element.He,
        .element.Li,
        .element.Be,
        .element.B,
        .element.C,
        .element.N,
        .element.O,
        .element.F,
        .element.Ne,
        .element.Na,
        .element.Mg,
        .element.Al,
        .element.Si,
        .element.P,
        .element.S,
        .element.Cl,
        .element.Ar,
        .element.K,
        .element.Ca,
        .element.Sc,
        .element.Ti,
        .element.V,
        .element.Cr,
        .element.Mn,
        .element.Fe,
        .element.Co,
        .element.Ni,
        .element.Cu,
        .element.Zn,
        .element.Ga,
        .element.Ge,
        .element.As,
        .element.Se,
        .element.Br,
        .element.Kr {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .element.H, .element.Li, .element.Na, .element.K,
        .element.C, .element.N, .element.O, .element.P,
        .element.S, .element.Se{
            background: #70bcca;
        }

        .element.He, .element.Ne, .element.Ar, .element.Kr{
            background: #d85041;
        }

        .element.B, .element.Si, .element.Ge, .element.As{
            background: #716dc2;
        }

        .element.Al, .element.Ga{
            background: #0b967c;
        }

        .element.F, .element.Cl, .element.Br{
            background: #a6a6a6;
        }

        .element.Be, .element.Mg, .element.Ca{
            background: #63bb5d;
        }

        .element.Sc,
        .element.Ti,
        .element.V,
        .element.Cr,
        .element.Mn,
        .element.Fe,
        .element.Co,
        .element.Ni,
        .element.Cu,
        .element.Zn{
            background: #ee8561;
        }

        .element.H {
            grid-row: 1 / span 2;
            grid-column: 1 / span 2;
        }

        .element.He {
            grid-row: 1 / span 2;
            grid-column: 36 / span 7;
        }

        /* Third Row Elements */
        .element.Na {
            grid-row: 5 / span 2;
            grid-column: 1 / span 2;
        }

        .element.Mg {
            grid-row: 5 / span 2;
            grid-column: 3 / span 2;
        }
        .element.Al {
            grid-row: 5 / span 2;
            grid-column: 26 / span 2;
        }

        .element.Si {
            grid-row: 5 / span 2;
            grid-column: 28 / span 2;
        }

        .element.P {
            grid-row: 5 / span 2;
            grid-column: 30 / span 2;
        }

        .element.S {
            grid-row: 5 / span 2;
            grid-column: 32 / span 2;
        }

        .element.Cl {
            grid-row: 5 / span 2;
            grid-column: 34 / span 2;
        }

        .element.Ar {
            grid-row: 5 / span 2;
            grid-column: 36 / span 7;
        }

        /* Second Row Elements */
        .element.Li {
            grid-row: 3 / span 2;
            grid-column: 1 / span 2;
        }

        .element.Be {
            grid-row: 3 / span 2;
            grid-column: 3 / span 2;
        }
        .element.B {
            grid-row: 3 / span 2;
            grid-column: 26 / span 2;
        }

        .element.C {
            grid-row: 3 / span 2;
            grid-column: 28 / span 2;
        }

        .element.N {
            grid-row: 3 / span 2;
            grid-column: 30 / span 2;
        }

        .element.O {
            grid-row: 3 / span 2;
            grid-column: 32 / span 2;
        }

        .element.F {
            grid-row: 3 / span 2;
            grid-column: 34 / span 2;
        }

        .element.Ne {
            grid-row: 3 / span 2;
            grid-column: 36 / span 7;
        }

        /* row 4*/
        .element.K {
        grid-row: 7 / span 2;
        grid-column: 1 / span 2;
        }

        .element.Ca {
            grid-row: 7 / span 2;
            grid-column: 3 / span 2;
        }

        .element.Sc {
            grid-row: 7/ span 2;
            grid-column: 5   / span 2;
        }

        .element.Ti {
            grid-row: 7 / span 2;
            grid-column: 7 / span 2;
        }

        .element.V {
            grid-row: 7 / span 2;
            grid-column: 9 / span 2;
        }

        .element.Cr {
            grid-row: 7 / span 2;
            grid-column: 11 / span 2;
        }

        .element.Mn {
            grid-row: 7/ span 2;
            grid-column: 13 / span 2;
        }

        .element.Fe {
            grid-row: 7 / span 2;
            grid-column: 15 / span 2;
        }

        .element.Co {
            grid-row: 7 / span 2;
            grid-column: 17 / span 2;
        }

        .element.Ni {
            grid-row: 7 / span 2;
            grid-column: 19 / span 2;
        }

        .element.Cu {
            grid-row: 7 / span 2;
            grid-column: 21 / span 2;
        }

        .element.Zn {
            grid-row: 7 / span 2;
            grid-column: 23 / span 2;
        }

        .element.Ga {
            grid-row: 7 / span 2;
            grid-column: 26 / span 2;
        }

        .element.Ge {
            grid-row: 7 / span 2;
            grid-column: 28 / span 2;
        }

        .element.As {
            grid-row: 7 / span 2;
            grid-column: 30 / span 2;
        }

        .element.Se {
            grid-row: 7 / span 2;
            grid-column: 32 / span 2;
        }

        .element.Br {
            grid-row: 7 / span 2;
            grid-column: 34 / span 2;
        }

        .element.Kr {
            grid-row: 7 / span 2;
            grid-column: 36 / span 2;
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
                width: 70%;
                height: 40vw;
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
            opacity: 1;!important;
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


<link rel="stylesheet" href="tutorial.css">
<div class="overlay"></div>

<div class="popup">
<button id="close">&times;</button>
<h1 class="title">How to Play?</h1>
<div class="tutorial-content">
    <ul>
    
        <li><strong>Empty Periodic Table:</strong> There is will be a table resembling the periodic table but with empty spaces for element symbols. The goal is to drag and drop the element symbols into their respective positions on the table.</strong></li>
        <li><strong>Hints: </strong> Hover over the empty spaces on the table to reveal hints about the element.</li>
        <li><strong>Drag and Drop:</strong> Drag the element symbol to the correct empty space on the table. Release the mouse button to drop the element symbol into the empty space.</li>
        <li><strong>Win the Game:</strong> Successfully place all element symbols into their correct positions to complete the puzzle.</li>
    
      </ul>
    <img src="images/puzzle_tut_img.png" alt="Tutorial Image" class="tutorial-img">
</div>
<input type="button" value="Got It!" id="okay" class="btn">

<style>
    .popup{
      background: linear-gradient(135deg, #ff7e72, #a62c2b);
    }

    #close, #okay {
        background-color: #880816;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 1vw;
        transition: 0.3s;
    }

    #close:hover, #okay:hover {
        background-color: #880816;
        color: #fff;
    }

    h1{
        font-size: 30px;
        text-shadow: 2px 2px 2px #ababab;
        color: #880816;
        font-style: bold;
    }

    .tutorial-img{
        height: 12vw;
        text-align: center;
    }
</style>
</div>
        <audio id="backgroundMusic" autoplay loop>
            <source src="game-music.mp3" type="audio/mpeg">
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
</div>
<div class="outer-rounded-square">
<div class="container">
<div class="periodic-table">
    <!-- Row 1 -->
    
    
    
    
    
    
    <div class="element H hover-text" data-element="H" data-position="1,1">1</div>
    <span class="tooltip-text" id="fade-H">The lightest and most abundant element in the universe.</span>

    <div class="element He hover-text" data-element="He" data-position="1,18">2</div>
    <span class="tooltip-text" id="fade-He">Named after the Greek god of the Sun, Helios.</span>
    <!-- Row 2 -->
    <div class="element Li hover-text" data-element="Li" data-position="2,1">3</div>
    <span class="tooltip-text" id="fade-Li">Used in rechargeable batteries and mood-stabilizing medication.</span>

    <div class="element Be hover-text" data-element="Be" data-position="2,2">4</div>
    <span class="tooltip-text" id="fade-Be">Lightweight metal used in aerospace components.</span>
    
    <!-- Row 2 -->
    <div class="element B hover-text" data-element="B" data-position="2,13">5</div>
    <span class="tooltip-text" id="fade-B">Found in borax; used in detergents and fiberglass.</span>

    <div class="element C hover-text" data-element="C" data-position="2,14">6</div>
    <span class="tooltip-text" id="fade-C">Basis of organic chemistry; essential for life on Earth.</span>

    <div class="element N hover-text" data-element="N" data-position="2,15">7</div>
    <span class="tooltip-text" id="fade-N">Makes up 78% of Earth's atmosphere; vital for plant growth.</span>

    <div class="element O hover-text" data-element="O" data-position="2,16">8</div>
    <span class="tooltip-text" id="fade-O">A vital element for life.</span>

    <div class="element F hover-text" data-element="F" data-position="2,17">9</div>
    <span class="tooltip-text" id="fade-F">Highly reactive; used in toothpaste and non-stick coatings.</span>

    <div class="element Ne hover-text" data-element="Ne" data-position="2,18">10</div>
    <span class="tooltip-text" id="fade-Ne">A noble gas with a distinct reddish-orange glow.</span>

    <!-- Row 3 -->
    <div class="element Na hover-text" data-element="Na" data-position="3,1">11</div>
    <span class="tooltip-text" id="fade-Na">Reacts violently with water; used in streetlights.</span>

    <div class="element Mg hover-text" data-element="Mg" data-position="3,2">12</div>
    <span class="tooltip-text" id="fade-Mg">Essential for biological processes; found in chlorophyll.</span>

    <div class="element Al hover-text" data-element="Al" data-position="3,13">13</div>
    <span class="tooltip-text" id="fade-Al">Lightweight metal; widely used in aerospace and packaging.</span>

    <div class="element Si hover-text" data-element="Si" data-position="3,14">14</div>
    <span class="tooltip-text" id="fade-Si">Main component of semiconductors; found in sand and quartz.</span>

    <div class="element P hover-text" data-element="P" data-position="3,15">15</div>
    <span class="tooltip-text" id="fade-P">Essential for DNA, RNA, and ATP; used in fertilizers.</span>

    <div class="element S hover-text" data-element="S" data-position="3,16">16</div>
    <span class="tooltip-text" id="fade-S">Important in proteins and vitamins; gives characteristic smell to rotten eggs.</span>

    <div class="element Cl hover-text" data-element="Cl" data-position="3,17">17</div>
    <span class="tooltip-text" id="fade-Cl">Disinfectant; used in PVC, cleaning products, and bleach.</span>

    <div class="element Ar hover-text" data-element="Ar" data-position="3,18">18</div>
    <span class="tooltip-text" id="fade-Ar">Inert gas; used in welding, electric bulbs, and lasers.</span>

    <!-- Row 4 -->
    <div class="element K hover-text" data-element="K" data-position="4,19">19</div>
    <span class="tooltip-text" id="fade-K">Essential for nerve function; found in bananas and potatoes.</span>

    <div class="element Ca hover-text" data-element="Ca" data-position="4,20">20</div>
    <span class="tooltip-text" id="fade-Ca">Important for bone and teeth health; used in construction materials.</span>

    <div class="element Sc hover-text" data-element="Sc" data-position="4,21">21</div>
    <span class="tooltip-text" id="fade-Sc">Lightweight metal; used in aerospace components.</span>

    <div class="element Ti hover-text" data-element="Ti" data-position="4,22">22</div>
    <span class="tooltip-text" id="fade-Ti">Strong, corrosion-resistant metal; used in aircraft and spacecraft.</span>

    <div class="element V hover-text" data-element="V" data-position="4,23">23</div>
    <span class="tooltip-text" id="fade-V">Used in steel alloys for high-strength applications.</span>

    <div class="element Cr hover-text" data-element="Cr" data-position="4,24">24</div>
    <span class="tooltip-text" id="fade-Cr">Adds hardness to steel; used in stainless steel and chrome plating.</span>

    <div class="element Mn hover-text" data-element="Mn" data-position="4,25">25</div>
    <span class="tooltip-text" id="fade-Mn">Essential trace element; used in steel production.</span>

    <div class="element Fe hover-text" data-element="Fe" data-position="4,26">26</div>
    <span class="tooltip-text" id="fade-Fe">Most common metal on Earth; used in construction and manufacturing.</span>

    <div class="element Co hover-text" data-element="Co" data-position="4,27">27</div>
    <span class="tooltip-text" id="fade-Co">Used in magnets, rechargeable batteries, and aircraft engines.</span>

    <div class="element Ni hover-text" data-element="Ni" data-position="4,28">28</div>
    <span class="tooltip-text" id="fade-Ni">Used in coins, magnets, and corrosion-resistant alloys.</span>

    <div class="element Cu hover-text" data-element="Cu" data-position="4,29">29</div>
    <span class="tooltip-text" id="fade-Cu">Excellent conductor of electricity; used in wires and plumbing.</span>

    <div class="element Zn hover-text" data-element="Zn" data-position="4,30">30</div>
    <span class="tooltip-text" id="fade-Zn">Essential mineral; used in galvanizing steel and batteries.</span>

    <div class="element Ga hover-text" data-element="Ga" data-position="4,31">31</div>
    <span class="tooltip-text" id="fade-Ga">Low melting point; used in LEDs and solar panels.</span>

    <div class="element Ge hover-text" data-element="Ge" data-position="4,32">32</div>
    <span class="tooltip-text" id="fade-Ge">Semiconducting material; used in transistors and optics.</span>

    <div class="element As hover-text" data-element="As" data-position="4,33">33</div>
    <span class="tooltip-text" id="fade-As">Poisonous element; used in semiconductors and wood preservatives.</span>

    <div class="element Se hover-text" data-element="Se" data-position="4,34">34</div>
    <span class="tooltip-text" id="fade-Se">Essential trace element; used in electronics and photovoltaic cells.</span>

    <div class="element Br hover-text" data-element="Br" data-position="4,35">35</div>
    <span class="tooltip-text" id="fade-Br">Dark red-brown liquid; used in flame retardants and photography.</span>

    <div class="element Kr hover-text" data-element="Kr" data-position="4,36">36</div>
    <span class="tooltip-text" id="fade-Kr">Inert gas; used in high-powered photographic flashes.</span>


    <!-- ... Repeat for other rows -->
</div>

        <div class="inner-rounded-square">
        <div class="element-list">
            <!-- Create draggable elements -->
            <div class="draggable-element" id="element-potassium" data-element="K" draggable="true">K</div>
            <div class="draggable-element" id="element-calcium" data-element="Ca" draggable="true">Ca</div>
            <div class="draggable-element" id="element-scandium" data-element="Sc" draggable="true">Sc</div>
            <div class="draggable-element" id="element-titanium" data-element="Ti" draggable="true">Ti</div>
            <div class="draggable-element" id="element-vanadium" data-element="V" draggable="true">V</div>
            <div class="draggable-element" id="element-chromium" data-element="Cr" draggable="true">Cr</div>
            <div class="draggable-element" id="element-manganese" data-element="Mn" draggable="true">Mn</div>
            <div class="draggable-element" id="element-iron" data-element="Fe" draggable="true">Fe</div>
            <div class="draggable-element" id="element-cobalt" data-element="Co" draggable="true">Co</div>
            <div class="draggable-element" id="element-nickel" data-element="Ni" draggable="true">Ni</div>
            <div class="draggable-element" id="element-copper" data-element="Cu" draggable="true">Cu</div>
            <div class="draggable-element" id="element-zinc" data-element="Zn" draggable="true">Zn</div>
            <div class="draggable-element" id="element-gallium" data-element="Ga" draggable="true">Ga</div>
            <div class="draggable-element" id="element-germanium" data-element="Ge" draggable="true">Ge</div>
            <div class="draggable-element" id="element-arsenic" data-element="As" draggable="true">As</div>
            <div class="draggable-element" id="element-selenium" data-element="Se" draggable="true">Se</div>
            <div class="draggable-element" id="element-bromine" data-element="Br" draggable="true">Br</div>
            <div class="draggable-element" id="element-krypton" data-element="Kr" draggable="true">Kr</div>

            <div class="draggable-element" id="element-hydrogen" data-element="Li" draggable="true">Li</div>
            <div class="draggable-element" id="element-helium" data-element="Be" draggable="true">Be</div>
            <div class="draggable-element" id="element-hydrogen" data-element="B" draggable="true">B</div>
            <div class="draggable-element" id="element-helium" data-element="C" draggable="true">C</div>
            <div class="draggable-element" id="element-hydrogen" data-element="N" draggable="true">N</div>
            <div class="draggable-element" id="element-helium" data-element="O" draggable="true">O</div>
            <div class="draggable-element" id="element-hydrogen" data-element="F" draggable="true">F</div>
            <div class="draggable-element" id="element-helium" data-element="Ne" draggable="true">Ne</div>

            <div class="draggable-element" id="element-hydrogen" data-element="H" draggable="true">H</div>
            <div class="draggable-element" id="element-helium" data-element="He" draggable="true">He</div>


            <div class="draggable-element" id="element-hydrogen" data-element="Na" draggable="true">Na</div>
            <div class="draggable-element" id="element-helium" data-element="Mg" draggable="true">Mg</div>
            <div class="draggable-element" id="element-hydrogen" data-element="Al" draggable="true">Al</div>
            <div class="draggable-element" id="element-helium" data-element="Si" draggable="true">Si</div>
            <div class="draggable-element" id="element-hydrogen" data-element="P" draggable="true">P</div>
            <div class="draggable-element" id="element-helium" data-element="S" draggable="true">S</div>
            <div class="draggable-element" id="element-hydrogen" data-element="Cl" draggable="true">Cl</div>
            <div class="draggable-element" id="element-helium" data-element="Ar" draggable="true">Ar</div>



            <!-- Repeat for other draggable elements -->
            <a href="puzzle.php">
            <button class="retry-button" >
            <!-- onclick="restartGame()" -->
                <img src="images/memory/retry-icon.png" alt="Retry Icon">
            </button></a>

        </div>

        
    </div>
    </div>
</div>
    </main>
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
        document.getElementById("backButton").onclick = function() {
            history.back();
        };
    </script>

    <script src="puzzle.js"></script>

    <script src="music.js"></script>


</body>
</html>