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
<!-- Example for one element; repeat for all draggable elements -->
<div class="element H draggable-element" draggable="true" data-state="gas" data-info="H|gas|Hydrogen - The lightest and most abundant element; often involved in forming acids.">
    H
    <div class="tooltip-text" id="fade-H">Hydrogen - The lightest and most abundant element; often involved in forming acids.</div>
</div>
<div class="element He draggable-element" draggable="true" data-state="gas" data-info="He|gas|Helium - Inert gas; used in balloons and as a cooling medium.">
    He
    <div class="tooltip-text" id="fade-He">Helium - Inert gas; used in balloons and as a cooling medium.</div>
</div>
<div class="element Li draggable-element" draggable="true" data-state="solid" data-info="Li|solid|Lithium - Alkali metal; commonly used in batteries.">
    Li
    <div class="tooltip-text" id="fade-Li">Lithium - Alkali metal; commonly used in batteries.</div>
</div>
<div class="element Be draggable-element" draggable="true" data-state="solid" data-info="Be|solid|Beryllium - Lightweight metal; known for its stiffness and strength.">
    Be
    <div class="tooltip-text" id="fade-Be">Beryllium - Lightweight metal; known for its stiffness and strength.</div>
</div>
<div class="element B draggable-element" draggable="true" data-state="solid" data-info="B|solid|Boron - Metalloid; used in various industrial applications.">
    B
    <div class="tooltip-text" id="fade-B">Boron - Metalloid; used in various industrial applications.</div>
</div>
<div class="element C draggable-element" draggable="true" data-state="solid" data-info="C|solid|Carbon - Basis of organic chemistry; forms the foundation of life.">
    C
    <div class="tooltip-text" id="fade-C">Carbon - Basis of organic chemistry; forms the foundation of life.</div>
</div>
<div class="element N draggable-element" draggable="true" data-state="gas" data-info="N|gas|Nitrogen - Gaseous element; essential for life and commonly found in the atmosphere.">
    N
    <div class="tooltip-text" id="fade-N">Nitrogen - Gaseous element; essential for life and commonly found in the atmosphere.</div>
</div>
<div class="element O draggable-element" draggable="true" data-state="gas" data-info="O|gas|Oxygen - Vital for respiration; supports combustion.">
    O
    <div class="tooltip-text" id="fade-O">Oxygen - Vital for respiration; supports combustion.</div>
</div>
<div class="element F draggable-element" draggable="true" data-state="gas" data-info="F|gas|Fluorine - Highly reactive halogen; often used in toothpaste and water fluoridation.">
    F
    <div class="tooltip-text" id="fade-F">Fluorine - Highly reactive halogen; often used in toothpaste and water fluoridation.</div>
</div>
<div class="element Ne draggable-element" draggable="true" data-state="gas" data-info="Ne|gas|Neon - Inert gas; used in neon signs for its vibrant glow.">
    Ne
    <div class="tooltip-text" id="fade-Ne">Neon - Inert gas; used in neon signs for its vibrant glow.</div>
</div>
<div class="element Na draggable-element" draggable="true" data-state="solid" data-info="Na|solid|Sodium - Alkali metal; reacts violently with water.">
    Na
    <div class="tooltip-text" id="fade-Na">Sodium - Alkali metal; reacts violently with water.</div>
</div>
<div class="element Mg draggable-element" draggable="true" data-state="solid" data-info="Mg|solid|Magnesium - Light metal; used in various alloys and medicines.">
    Mg
    <div class="tooltip-text" id="fade-Mg">Magnesium - Light metal; used in various alloys and medicines.</div>
</div>
<div class="element Al draggable-element" draggable="true" data-state="solid" data-info="Al|solid|Aluminum - Light metal; widely used in construction and packaging.">
    Al
    <div class="tooltip-text" id="fade-Al">Aluminum - Light metal; widely used in construction and packaging.</div>
</div>
<div class="element Si draggable-element" draggable="true" data-state="solid" data-info="Si|solid|Silicon - Metalloid; essential component in electronic devices.">
    Si
    <div class="tooltip-text" id="fade-Si">Silicon - Metalloid; essential component in electronic devices.</div>
</div>
<div class="element P draggable-element" draggable="true" data-state="solid" data-info="P|solid|Phosphorus - Essential for life; used in fertilizers and detergents.">
    P
    <div class="tooltip-text" id="fade-P">Phosphorus - Essential for life; used in fertilizers and detergents.</div>
</div>
<div class="element S draggable-element" draggable="true" data-state="solid" data-info="S|solid|Sulfur - Important in various industrial processes; component of amino acids.">
    S
    <div class="tooltip-text" id="fade-S">Sulfur - Important in various industrial processes; component of amino acids.</div>
</div>

<!-- Example for one element; repeat for all draggable elements -->
<div class="element Cl draggable-element" draggable="true" data-state="gas" data-info="Cl|gas|Chlorine - Highly reactive halogen; used in water purification and as a disinfectant.">
    Cl
    <div class="tooltip-text" id="fade-Cl">Chlorine - Highly reactive halogen; used in water purification and as a disinfectant.</div>
</div>
<div class="element Ar draggable-element" draggable="true" data-state="gas" data-info="Ar|gas|Argon - Inert gas; used in various welding and metalworking applications.">
    Ar
    <div class="tooltip-text" id="fade-Ar">Argon - Inert gas; used in various welding and metalworking applications.</div>
</div>
<div class="element K draggable-element" draggable="true" data-state="solid" data-info="K|solid|Potassium - Alkali metal; essential for plant and animal life.">
    K
    <div class="tooltip-text" id="fade-K">Potassium - Alkali metal; essential for plant and animal life.</div>
</div>
<div class="element Ca draggable-element" draggable="true" data-state="solid" data-info="Ca|solid|Calcium - Alkaline earth metal; important for bone and teeth formation.">
    Ca
    <div class="tooltip-text" id="fade-Ca">Calcium - Alkaline earth metal; important for bone and teeth formation.</div>
</div>
<div class="element Sc draggable-element" draggable="true" data-state="solid" data-info="Sc|solid|Scandium - Transition metal; used in aerospace components.">
    Sc
    <div class="tooltip-text" id="fade-Sc">Scandium - Transition metal; used in aerospace components.</div>
</div>
<div class="element Ti draggable-element" draggable="true" data-state="solid" data-info="Ti|solid|Titanium - Transition metal; known for its high strength-to-weight ratio.">
    Ti
    <div class="tooltip-text" id="fade-Ti">Titanium - Transition metal; known for its high strength-to-weight ratio.</div>
</div>
<div class="element V draggable-element" draggable="true" data-state="solid" data-info="V|solid|Vanadium - Transition metal; used in the production of steel alloys.">
    V
    <div class="tooltip-text" id="fade-V">Vanadium - Transition metal; used in the production of steel alloys.</div>
</div>
<div class="element Cr draggable-element" draggable="true" data-state="solid" data-info="Cr|solid|Chromium - Transition metal; adds corrosion resistance to steel.">
    Cr
    <div class="tooltip-text" id="fade-Cr">Chromium - Transition metal; adds corrosion resistance to steel.</div>
</div>
<div class="element Mn draggable-element" draggable="true" data-state="solid" data-info="Mn|solid|Manganese - Transition metal; used in steel production and batteries.">
    Mn
    <div class="tooltip-text" id="fade-Mn">Manganese - Transition metal; used in steel production and batteries.</div>
</div>
<div class="element Fe draggable-element" draggable="true" data-state="solid" data-info="Fe|solid|Iron - Essential for life; widely used in construction and manufacturing.">
    Fe
    <div class="tooltip-text" id="fade-Fe">Iron - Essential for life; widely used in construction and manufacturing.</div>
</div>
<div class="element Ni draggable-element" draggable="true" data-state="solid" data-info="Ni|solid|Nickel - Transition metal; used in alloys and rechargeable batteries.">
    Ni
    <div class="tooltip-text" id="fade-Ni">Nickel - Transition metal; used in alloys and rechargeable batteries.</div>
</div>
<div class="element Co draggable-element" draggable="true" data-state="solid" data-info="Co|solid|Cobalt - Transition metal; used in magnets and rechargeable batteries.">
    Co
    <div class="tooltip-text" id="fade-Co">Cobalt - Transition metal; used in magnets and rechargeable batteries.</div>
</div>
<div class="element Cu draggable-element" draggable="true" data-state="solid" data-info="Cu|solid|Copper - Transition metal; known for its conductivity and used in wiring.">
    Cu
    <div class="tooltip-text" id="fade-Cu">Copper - Transition metal; known for its conductivity and used in wiring.</div>
</div>
<div class="element Zn draggable-element" draggable="true" data-state="solid" data-info="Zn|solid|Zinc - Essential trace element; used in galvanizing and batteries.">
    Zn
    <div class="tooltip-text" id="fade-Zn">Zinc - Essential trace element; used in galvanizing and batteries.</div>
</div>
<div class="element Ga draggable-element" draggable="true" data-state="solid" data-info="Ga|solid|Gallium - Metal; used in electronics and as a component in some LEDs.">
    Ga
    <div class="tooltip-text" id="fade-Ga">Gallium - Metal; used in electronics and as a component in some LEDs.</div>
</div>
<div class="element Ge draggable-element" draggable="true" data-state="solid" data-info="Ge|solid|Germanium - Metalloid; used in semiconductors and fiber optics.">
    Ge
    <div class="tooltip-text" id="fade-Ge">Germanium - Metalloid; used in semiconductors and fiber optics.</div>
</div>



<!-- ... (previous code) -->

<div class="element As draggable-element" draggable="true" data-state="solid" data-info="As|solid|Arsenic - Metalloid; historically used in poisons and medicines.">
    As
    <div class="tooltip-text" id="fade-As">Arsenic - Metalloid; historically used in poisons and medicines.</div>
</div>
<div class="element Se draggable-element" draggable="true" data-state="solid" data-info="Se|solid|Selenium - Essential trace element; used in electronics and photovoltaic cells.">
    Se
    <div class="tooltip-text" id="fade-Se">Selenium - Essential trace element; used in electronics and photovoltaic cells.</div>
</div>
<div class="element Br draggable-element" draggable="true" data-state="liquid" data-info="Br|liquid|Bromine - Halogen; used as a flame retardant and in photographic chemicals.">
    Br
    <div class="tooltip-text" id="fade-Br">Bromine - Halogen; used as a flame retardant and in photographic chemicals.</div>
</div>
<div class="element Kr draggable-element" draggable="true" data-state="gas" data-info="Kr|gas|Krypton - Noble gas; used in high-powered photographic flashes.">
    Kr
    <div class="tooltip-text" id="fade-Kr">Krypton - Noble gas; used in high-powered photographic flashes.</div>
</div>
<div class="element Rb draggable-element" draggable="true" data-state="solid" data-info="Rb|solid|Rubidium - Alkali metal; used in certain types of atomic clocks.">
    Rb
    <div class="tooltip-text" id="fade-Rb">Rubidium - Alkali metal; used in certain types of atomic clocks.</div>
</div>
<div class="element Sr draggable-element" draggable="true" data-state="solid" data-info="Sr|solid|Strontium - Alkaline earth metal; used in fireworks for its red flame.">
    Sr
    <div class="tooltip-text" id="fade-Sr">Strontium - Alkaline earth metal; used in fireworks for its red flame.</div>
</div>
<div class="element Y draggable-element" draggable="true" data-state="solid" data-info="Y|solid|Yttrium - Transition metal; used in LED technology and lasers.">
    Y
    <div class="tooltip-text" id="fade-Y">Yttrium - Transition metal; used in LED technology and lasers.</div>
</div>
<div class="element Zr draggable-element" draggable="true" data-state="solid" data-info="Zr|solid|Zirconium - Transition metal; used in nuclear reactors and ceramics.">
    Zr
    <div class="tooltip-text" id="fade-Zr">Zirconium - Transition metal; used in nuclear reactors and ceramics.</div>
</div>
<div class="element Nb draggable-element" draggable="true" data-state="solid" data-info="Nb|solid|Niobium - Transition metal; used in superalloys and superconductors.">
    Nb
    <div class="tooltip-text" id="fade-Nb">Niobium - Transition metal; used in superalloys and superconductors.</div>
</div>
<div class="element Mo draggable-element" draggable="true" data-state="solid" data-info="Mo|solid|Molybdenum - Transition metal; used in alloys and as a catalyst.">
    Mo
    <div class="tooltip-text" id="fade-Mo">Molybdenum - Transition metal; used in alloys and as a catalyst.</div>
</div>
<div class="element Tc draggable-element" draggable="true" data-state="solid" data-info="Tc|solid|Technetium - Radioactive metal; used in medical imaging.">
    Tc
    <div class="tooltip-text" id="fade-Tc">Technetium - Radioactive metal; used in medical imaging.</div>
</div>
<div class="element Ru draggable-element" draggable="true" data-state="solid" data-info="Ru|solid|Ruthenium - Transition metal; used in electronics and catalysis.">
    Ru
    <div class="tooltip-text" id="fade-Ru">Ruthenium - Transition metal; used in electronics and catalysis.</div>
</div>
<div class="element Rh draggable-element" draggable="true" data-state="solid" data-info="Rh|solid|Rhodium - Transition metal; used in jewelry and catalytic converters.">
    Rh
    <div class="tooltip-text" id="fade-Rh">Rhodium - Transition metal; used in jewelry and catalytic converters.</div>
</div>
<div class="element Pd draggable-element" draggable="true" data-state="solid" data-info="Pd|solid|Palladium - Noble metal; used in catalysis and electronics.">
    Pd
    <div class="tooltip-text" id="fade-Pd">Palladium - Noble metal; used in catalysis and electronics.</div>
</div>
<div class="element Ag draggable-element" draggable="true" data-state="solid" data-info="Ag|solid|Silver - Noble metal; widely used in jewelry and currency.">
    Ag
    <div class="tooltip-text" id="fade-Ag">Silver - Noble metal; widely used in jewelry and currency.</div>
</div>
<div class="element Cd draggable-element" draggable="true" data-state="solid" data-info="Cd|solid|Cadmium - Transition metal; used in batteries and pigments.">
    Cd
    <div class="tooltip-text" id="fade-Cd">Cadmium - Transition metal; used in batteries and pigments.</div>
</div>
<div class="element In draggable-element" draggable="true" data-state="solid" data-info="In|solid|Indium - Metal; used in electronics and as an alloy with other metals.">
    In
    <div class="tooltip-text" id="fade-In">Indium - Metal; used in electronics and as an alloy with other metals.</div>
</div>
<div class="element Sn draggable-element" draggable="true" data-state="solid" data-info="Sn|solid|Tin - Post-transition metal; used in alloys and as a protective coating.">
    Sn
    <div class="tooltip-text" id="fade-Sn">Tin - Post-transition metal; used in alloys and as a protective coating.</div>
</div>
<div class="element Sb draggable-element" draggable="true" data-state="solid" data-info="Sb|solid|Antimony - Metalloid; used in flame retardants and alloys.">
    Sb
    <div class="tooltip-text" id="fade-Sb">Antimony - Metalloid; used in flame retardants and alloys.</div>
</div>
<div class="element Te draggable-element" draggable="true" data-state="solid" data-info="Te|solid|Tellurium - Metalloid; used in semiconductors and solar cells.">
    Te
    <div class="tooltip-text" id="fade-Te">Tellurium - Metalloid; used in semiconductors and solar cells.</div>
</div>


<!-- ... (previous code) -->

<div class="element I draggable-element" draggable="true" data-state="solid" data-info="I|solid|Iodine - Halogen; essential for thyroid function and used in medical applications.">
    I
    <div class="tooltip-text" id="fade-I">Iodine - Halogen; essential for thyroid function and used in medical applications.</div>
</div>
<div class="element Xe draggable-element" draggable="true" data-state="gas" data-info="Xe|gas|Xenon - Noble gas; used in certain types of lighting and medical imaging.">
    Xe
    <div class="tooltip-text" id="fade-Xe">Xenon - Noble gas; used in certain types of lighting and medical imaging.</div>
</div>
<div class="element Cs draggable-element" draggable="true" data-state="solid" data-info="Cs|solid|Cesium - Alkali metal; used in atomic clocks and certain medical applications.">
    Cs
    <div class="tooltip-text" id="fade-Cs">Cesium - Alkali metal; used in atomic clocks and certain medical applications.</div>
</div>
<div class="element Ba draggable-element" draggable="true" data-state="solid" data-info="Ba|solid|Barium - Alkaline earth metal; used in medical imaging and fireworks.">
    Ba
    <div class="tooltip-text" id="fade-Ba">Barium - Alkaline earth metal; used in medical imaging and fireworks.</div>
</div>
<div class="element La draggable-element" draggable="true" data-state="solid" data-info="La|solid|Lanthanum - Lanthanide; used in high-performance optics and catalysts.">
    La
    <div class="tooltip-text" id="fade-La">Lanthanum - Lanthanide; used in high-performance optics and catalysts.</div>
</div>
<div class="element Ce draggable-element" draggable="true" data-state="solid" data-info="Ce|solid|Cerium - Lanthanide; used in catalytic converters and as a polishing agent.">
    Ce
    <div class="tooltip-text" id="fade-Ce">Cerium - Lanthanide; used in catalytic converters and as a polishing agent.</div>
</div>
<div class="element Pr draggable-element" draggable="true" data-state="solid" data-info="Pr|solid|Praseodymium - Lanthanide; used in certain types of magnets and lighting.">
    Pr
    <div class="tooltip-text" id="fade-Pr">Praseodymium - Lanthanide; used in certain types of magnets and lighting.</div>
</div>
<div class="element Nd draggable-element" draggable="true" data-state="solid" data-info="Nd|solid|Neodymium - Lanthanide; used in strong permanent magnets and lasers.">
    Nd
    <div class="tooltip-text" id="fade-Nd">Neodymium - Lanthanide; used in strong permanent magnets and lasers.</div>
</div>
<div class="element Pm draggable-element" draggable="true" data-state="solid" data-info="Pm|solid|Promethium - Radioactive Lanthanide; used in nuclear batteries and gauges.">
    Pm
    <div class="tooltip-text" id="fade-Pm">Promethium - Radioactive Lanthanide; used in nuclear batteries and gauges.</div>
</div>
<div class="element Sm draggable-element" draggable="true" data-state="solid" data-info="Sm|solid|Samarium - Lanthanide; used in magnets, nuclear reactors, and lasers.">
    Sm
    <div class="tooltip-text" id="fade-Sm">Samarium - Lanthanide; used in magnets, nuclear reactors, and lasers.</div>
</div>
<div class="element Eu draggable-element" draggable="true" data-state="solid" data-info="Eu|solid|Europium - Lanthanide; used in phosphors and certain types of lighting.">
    Eu
    <div class="tooltip-text" id="fade-Eu">Europium - Lanthanide; used in phosphors and certain types of lighting.</div>
</div>
<div class="element Gd draggable-element" draggable="true" data-state="solid" data-info="Gd|solid|Gadolinium - Lanthanide; used in medical imaging and nuclear reactors.">
    Gd
    <div class="tooltip-text" id="fade-Gd">Gadolinium - Lanthanide; used in medical imaging and nuclear reactors.</div>
</div>
<div class="element Tb draggable-element" draggable="true" data-state="solid" data-info="Tb|solid|Terbium - Lanthanide; used in certain types of magnets and phosphors.">
    Tb
    <div class="tooltip-text" id="fade-Tb">Terbium - Lanthanide; used in certain types of magnets and phosphors.</div>
</div>
<div class="element Dy draggable-element" draggable="true" data-state="solid" data-info="Dy|solid|Dysprosium - Lanthanide; used in certain types of magnets and lighting.">
    Dy
    <div class="tooltip-text" id="fade-Dy">Dysprosium - Lanthanide; used in certain types of magnets and lighting.</div>
</div>
<div class="element Ho draggable-element" draggable="true" data-state="solid" data-info="Ho|solid|Holmium - Lanthanide; used in certain types of magnets and nuclear reactors.">
    Ho
    <div class="tooltip-text" id="fade-Ho">Holmium - Lanthanide; used in certain types of magnets and nuclear reactors.</div>
</div>
<div class="element Er draggable-element" draggable="true" data-state="solid" data-info="Er|solid|Erbium - Lanthanide; used in certain types of lasers and nuclear reactors.">
    Er
    <div class="tooltip-text" id="fade-Er">Erbium - Lanthanide; used in certain types of lasers and nuclear reactors.</div>
</div>

<div class="element Tm draggable-element" draggable="true" data-state="solid" data-info="Tm|solid|Thulium - Lanthanide; used in certain types of lasers and portable X-ray devices.">
    Tm
    <div class="tooltip-text" id="fade-Tm">Thulium - Lanthanide; used in certain types of lasers and portable X-ray devices.</div>
</div>
<div class="element Yb draggable-element" draggable="true" data-state="solid" data-info="Yb|solid|Ytterbium - Lanthanide; used in certain types of lasers and nuclear reactors.">
    Yb
    <div class="tooltip-text" id="fade-Yb">Ytterbium - Lanthanide; used in certain types of lasers and nuclear reactors.</div>
</div>
<div class="element Lu draggable-element" draggable="true" data-state="solid" data-info="Lu|solid|Lutetium - Lanthanide; used in certain types of lasers and as a catalyst.">
    Lu
    <div class="tooltip-text" id="fade-Lu">Lutetium - Lanthanide; used in certain types of lasers and as a catalyst.</div>
</div>
<div class="element Hf draggable-element" draggable="true" data-state="solid" data-info="Hf|solid|Hafnium - Transition metal; used in nuclear reactors and certain types of alloys.">
    Hf
    <div class="tooltip-text" id="fade-Hf">Hafnium - Transition metal; used in nuclear reactors and certain types of alloys.</div>
</div>
<div class="element Ta draggable-element" draggable="true" data-state="solid" data-info="Ta|solid|Tantalum - Transition metal; used in electronics and as a component in some alloys.">
    Ta
    <div class="tooltip-text" id="fade-Ta">Tantalum - Transition metal; used in electronics and as a component in some alloys.</div>
</div>
<div class="element W draggable-element" draggable="true" data-state="solid" data-info="W|solid|Tungsten - Transition metal; known for its high melting point and used in lightbulb filaments.">
    W
    <div class="tooltip-text" id="fade-W">Tungsten - Transition metal; known for its high melting point and used in lightbulb filaments.</div>
</div>
<div class="element Re draggable-element" draggable="true" data-state="solid" data-info="Re|solid|Rhenium - Transition metal; used in high-temperature superalloys and catalysts.">
    Re
    <div class="tooltip-text" id="fade-Re">Rhenium - Transition metal; used in high-temperature superalloys and catalysts.</div>
</div>
<div class="element Os draggable-element" draggable="true" data-state="solid" data-info="Os|solid|Osmium - Transition metal; densest naturally occurring element; used in certain alloys.">
    Os
    <div class="tooltip-text" id="fade-Os">Osmium - Transition metal; densest naturally occurring element; used in certain alloys.</div>
</div>
<div class="element Ir draggable-element" draggable="true" data-state="solid" data-info="Ir|solid|Iridium - Transition metal; used in spark plugs, electronics, and certain types of pens.">
    Ir
    <div class="tooltip-text" id="fade-Ir">Iridium - Transition metal; used in spark plugs, electronics, and certain types of pens.</div>
</div>
<div class="element Pt draggable-element" draggable="true" data-state="solid" data-info="Pt|solid|Platinum - Noble metal; used in jewelry, catalytic converters, and certain medical devices.">
    Pt
    <div class="tooltip-text" id="fade-Pt">Platinum - Noble metal; used in jewelry, catalytic converters, and certain medical devices.</div>
</div>
<div class="element Au draggable-element" draggable="true" data-state="solid" data-info="Au|solid|Gold - Noble metal; widely used in jewelry, electronics, and as a form of currency.">
    Au
    <div class="tooltip-text" id="fade-Au">Gold - Noble metal; widely used in jewelry, electronics, and as a form of currency.</div>
</div>
<div class="element Hg draggable-element" draggable="true" data-state="liquid" data-info="Hg|liquid|Mercury - Transition metal; liquid at room temperature; used in thermometers and certain types of switches.">
    Hg
    <div class="tooltip-text" id="fade-Hg">Mercury - Transition metal; liquid at room temperature; used in thermometers and certain types of switches.</div>
</div>
<div class="element Tl draggable-element" draggable="true" data-state="solid" data-info="Tl|solid|Thallium - Post-transition metal; used in electronics and as a component in some superconductors.">
    Tl
    <div class="tooltip-text" id="fade-Tl">Thallium - Post-transition metal; used in electronics and as a component in some superconductors.</div>
</div>




<div class="element Pb draggable-element" draggable="true" data-state="solid" data-info="Pb|solid|Lead - Post-transition metal; used in batteries, construction, and certain types of radiation shielding.">
    Pb
    <div class="tooltip-text" id="fade-Pb">Lead - Post-transition metal; used in batteries, construction, and certain types of radiation shielding.</div>
</div>
<div class="element Bi draggable-element" draggable="true" data-state="solid" data-info="Bi|solid|Bismuth - Post-transition metal; used in pharmaceuticals, cosmetics, and certain alloys.">
    Bi
    <div class="tooltip-text" id="fade-Bi">Bismuth - Post-transition metal; used in pharmaceuticals, cosmetics, and certain alloys.</div>
</div>
<div class="element Po draggable-element" draggable="true" data-state="solid" data-info="Po|solid|Polonium - Radioactive post-transition metal; rare and has few applications, but used in certain types of devices.">
    Po
    <div class="tooltip-text" id="fade-Po">Polonium - Radioactive post-transition metal; rare and has few applications, but used in certain types of devices.</div>
</div>
<div class="element At draggable-element" draggable="true" data-state="solid" data-info="At|solid|Astatine - Halogen; extremely rare and highly radioactive; has no significant uses.">
    At
    <div class="tooltip-text" id="fade-At">Astatine - Halogen; extremely rare and highly radioactive; has no significant uses.</div>
</div>

<div class="element Rn draggable-element" draggable="true" data-state="gas" data-info="Rn|gas|Radon - Noble Gas; a radioactive gas used in some medical applications.">
    Rn
    <div class="tooltip-text" id="fade-Rn">Radon - Noble Gas; a radioactive gas used in some medical applications.</div>
</div>

<div class="element Fr draggable-element" draggable="true" data-state="solid" data-info="Fr|solid|Francium - Alkali Metal; highly radioactive, with limited industrial uses.">
    Fr
    <div class="tooltip-text" id="fade-Fr">Francium - Alkali Metal; highly radioactive, with limited industrial uses.</div>
</div>
<div class="element Ra draggable-element" draggable="true" data-state="solid" data-info="Ra|solid|Radium - Alkaline Earth Metal; historically used in self-luminous paint and medical treatments.">
    Ra
    <div class="tooltip-text" id="fade-Ra">Radium - Alkaline Earth Metal; historically used in self-luminous paint and medical treatments.</div>
</div>
<div class="element Ac draggable-element" draggable="true" data-state="solid" data-info="Ac|solid|Actinium - Actinide; used in radiation therapy and neutron sources.">
    Ac
    <div class="tooltip-text" id="fade-Ac">Actinium - Actinide; used in radiation therapy and neutron sources.</div>
</div>
<div class="element Rf draggable-element" draggable="true" data-state="solid" data-info="Rf|solid|Rutherfordium - Transactinide; synthetic element, limited practical applications.">
    Rf
    <div class="tooltip-text" id="fade-Rf">Rutherfordium - Transactinide; synthetic element, limited practical applications.</div>
</div>
<div class="element Db draggable-element" draggable="true" data-state="solid" data-info="Db|solid|Dubnium - Transactinide; synthetic element, limited practical applications.">
    Db
    <div class="tooltip-text" id="fade-Db">Dubnium - Transactinide; synthetic element, limited practical applications.</div>
</div>
<div class="element Sg draggable-element" draggable="true" data-state="solid" data-info="Sg|solid|Seaborgium - Transactinide; synthetic element, limited practical applications.">
    Sg
    <div class="tooltip-text" id="fade-Sg">Seaborgium - Transactinide; synthetic element, limited practical applications.</div>
</div>
<div class="element Bh draggable-element" draggable="true" data-state="solid" data-info="Bh|solid|Bohrium - Transactinide; synthetic element, limited practical applications.">
    Bh
    <div class="tooltip-text" id="fade-Bh">Bohrium - Transactinide; synthetic element, limited practical applications.</div>
</div>
<div class="element Hs draggable-element" draggable="true" data-state="solid" data-info="Hs|solid|Hassium - Transactinide; synthetic element, limited practical applications.">
    Hs
    <div class="tooltip-text" id="fade-Hs">Hassium - Transactinide; synthetic element, limited practical applications.</div>
</div>
<div class="element Mt draggable-element" draggable="true" data-state="solid" data-info="Mt|solid|Meitnerium - Transactinide; synthetic element, limited practical applications.">
    Mt
    <div class="tooltip-text" id="fade-Mt">Meitnerium - Transactinide; synthetic element, limited practical applications.</div>
</div>
<div class="element Ds draggable-element" draggable="true" data-state="solid" data-info="Ds|solid|Darmstadtium - Transactinide; synthetic element, limited practical applications.">
    Ds
    <div class="tooltip-text" id="fade-Ds">Darmstadtium - Transactinide; synthetic element, limited practical applications.</div>
</div>
<div class="element Rg draggable-element" draggable="true" data-state="solid" data-info="Rg|solid|Roentgenium - Transactinide; synthetic element, limited practical applications.">
    Rg
    <div class="tooltip-text" id="fade-Rg">Roentgenium - Transactinide; synthetic element, limited practical applications.</div>
</div>
<div class="element Cn draggable-element" draggable="true" data-state="solid" data-info="Cn|solid|Copernicium - Transactinide; synthetic element, limited practical applications.">
    Cn
    <div class="tooltip-text" id="fade-Cn">Copernicium - Transactinide; synthetic element, limited practical applications.</div>
</div>
<div class="element Nh draggable-element" draggable="true" data-state="solid" data-info="Nh|solid|Nihonium - Synthetic Element; limited practical applications.">
    Nh
    <div class="tooltip-text" id="fade-Nh">Nihonium - Synthetic Element; limited practical applications.</div>
</div>
<div class="element Fl draggable-element" draggable="true" data-state="solid" data-info="Fl|solid|Flerovium - Synthetic Element; limited practical applications.">
    Fl
    <div class="tooltip-text" id="fade-Fl">Flerovium - Synthetic Element; limited practical applications.</div>
</div>

<div class="element Mc draggable-element" draggable="true" data-state="solid" data-info="Mc|solid|Moscovium - Synthetic Element; limited practical applications.">
    Mc
    <div class="tooltip-text" id="fade-Mc">Moscovium - Synthetic Element; limited practical applications.</div>
</div>
<div class="element Lv draggable-element" draggable="true" data-state="solid" data-info="Lv|solid|Livermorium - Synthetic Element; limited practical applications.">
    Lv
    <div class="tooltip-text" id="fade-Lv">Livermorium - Synthetic Element; limited practical applications.</div>
</div>
<div class="element Ts draggable-element" draggable="true" data-state="solid" data-info="Ts|solid|Tennessine - Synthetic Element; limited practical applications.">
    Ts
    <div class="tooltip-text" id="fade-Ts">Tennessine - Synthetic Element; limited practical applications.</div>
</div>
<div class="element Og draggable-element" draggable="true" data-state="solid" data-info="Og|solid|Oganesson - Synthetic Element; limited practical applications.">
    Og
    <div class="tooltip-text" id="fade-Og">Oganesson - Synthetic Element; limited practical applications.</div>
</div>

<div class="element Th draggable-element" draggable="true" data-state="solid" data-info="Th|solid|Thorium - Actinide; potential nuclear fuel, used in certain alloys.">
    Th
    <div class="tooltip-text" id="fade-Th">Thorium - Actinide; potential nuclear fuel, used in certain alloys.</div>
</div>
<div class="element Pa draggable-element" draggable="true" data-state="solid" data-info="Pa|solid|Protactinium - Actinide; used in scientific research, but limited practical applications.">
    Pa
    <div class="tooltip-text" id="fade-Pa">Protactinium - Actinide; used in scientific research, but limited practical applications.</div>
</div>
<div class="element U draggable-element" draggable="true" data-state="solid" data-info="U|solid|Uranium - Actinide; crucial in nuclear power production and weaponry.">
    U
    <div class="tooltip-text" id="fade-U">Uranium - Actinide; crucial in nuclear power production and weaponry.</div>
</div>

<div class="element Np draggable-element" draggable="true" data-state="solid" data-info="Np|solid|Neptunium - Actinide; used in nuclear reactors and some weapons applications.">
    Np
    <div class="tooltip-text" id="fade-Np">Neptunium - Actinide; used in nuclear reactors and some weapons applications.</div>
</div>
<div class="element Pu draggable-element" draggable="true" data-state="solid" data-info="Pu|solid|Plutonium - Actinide; significant in nuclear weapons and nuclear power production.">
    Pu
    <div class="tooltip-text" id="fade-Pu">Plutonium - Actinide; significant in nuclear weapons and nuclear power production.</div>
</div>
<div class="element Am draggable-element" draggable="true" data-state="solid" data-info="Am|solid|Americium - Actinide; used in smoke detectors and some medical applications.">
    Am
    <div class="tooltip-text" id="fade-Am">Americium - Actinide; used in smoke detectors and some medical applications.</div>
</div>
<div class="element Cm draggable-element" draggable="true" data-state="solid" data-info="Cm|solid|Curium - Actinide; used in research and as a neutron source.">
    Cm
    <div class="tooltip-text" id="fade-Cm">Curium - Actinide; used in research and as a neutron source.</div>
</div>
<div class="element Bk draggable-element" draggable="true" data-state="solid" data-info="Bk|solid|Berkelium - Actinide; used in research, no practical applications.">
    Bk
    <div class="tooltip-text" id="fade-Bk">Berkelium - Actinide; used in research, no practical applications.</div>
</div>
<div class="element Cf draggable-element" draggable="true" data-state="solid" data-info="Cf|solid|Californium - Actinide; used in neutron sources and certain types of detectors.">
    Cf
    <div class="tooltip-text" id="fade-Cf">Californium - Actinide; used in neutron sources and certain types of detectors.</div>
</div>
<div class="element Es draggable-element" draggable="true" data-state="solid" data-info="Es|solid|Einsteinium - Actinide; primarily used in research.">
    Es
    <div class="tooltip-text" id="fade-Es">Einsteinium - Actinide; primarily used in research.</div>
</div>
<div class="element Fm draggable-element" draggable="true" data-state="solid" data-info="Fm|solid|Fermium - Actinide; used in research, no practical applications.">
    Fm
    <div class="tooltip-text" id="fade-Fm">Fermium - Actinide; used in research, no practical applications.</div>
</div>
<div class="element Md draggable-element" draggable="true" data-state="solid" data-info="Md|solid|Mendelevium - Actinide; used in research, no practical applications.">
    Md
    <div class="tooltip-text" id="fade-Md">Mendelevium - Actinide; used in research, no practical applications.</div>
</div>
<div class="element No draggable-element" draggable="true" data-state="solid" data-info="No|solid|Nobelium - Actinide; used in research, no practical applications.">
    No
    <div class="tooltip-text" id="fade-No">Nobelium - Actinide; used in research, no practical applications.</div>
</div>
<div class="element Lr draggable-element" draggable="true" data-state="solid" data-info="Lr|solid|Lawrencium - Actinide; used in research, no practical applications.">
    Lr
    <div class="tooltip-text" id="fade-Lr">Lawrencium - Actinide; used in research, no practical applications.</div>
</div>

<!-- ... (remaining code) -->


    </div>
    </div>
</div>
    <div class="boxes-container">
        <button class="clear-area">&#10008;</button>
        <div class="reaction-area"></div>
        <div class="goal-box">
            GOAL:
        </div>
    </div>

    <audio id="successSound" src="correct.mp3" preload="auto"></audio>

    </main>
    <script>
        document.getElementById("backButton").onclick = function() {
            history.back(); 
        };
    </script>

    <script src="puzzle.js"></script>

    <script src="music.js"></script>

    <script src="fusion.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const elementsWithTooltip = document.querySelectorAll('.draggable-element');

        elementsWithTooltip.forEach(element => {
            element.addEventListener('mouseover', function () {
                const tooltip = this.querySelector('.tooltip-text');
                if (tooltip) {
                    const rect = this.getBoundingClientRect();
                    const windowWidth = window.innerWidth;
                    const windowHeight = window.innerHeight;
                    const tooltipWidth = tooltip.offsetWidth;
                    const tooltipHeight = tooltip.offsetHeight;

                    // Calculate the position to center the tooltip slightly to the left and top
                    const left = (windowWidth - tooltipWidth) / 2 - (windowWidth * 0.43); // Centered and 5% from the left
                    const top = (windowHeight - tooltipHeight) / 2 - (windowHeight * 0.5); // Centered and 5% from the top

                    tooltip.style.left = left + 'px';
                    tooltip.style.top = top + 'px';

                    tooltip.style.display = 'block';
                }
            });

            element.addEventListener('mouseout', function () {
                const tooltip = this.querySelector('.tooltip-text');
                if (tooltip) {
                    tooltip.style.display = 'none';
                }
            });
        });
    });
</script>

<script>
        document.addEventListener('DOMContentLoaded', function () {
        const goalBox = document.querySelector('.goal-box');
        let compoundsGoal = ['H2O', 'CO2', 'NH3']; // Add more compounds as needed
        let currentGoalIndex = 0;
        let elementsInReaction = []; // Initialize the array
        const reactionArea = document.querySelector('.reaction-area');

        function changeGoal() {
        currentGoalIndex++;
        if (currentGoalIndex >= goals.length) {
            currentGoalIndex = 0;
        }
        currentGoal = goals[currentGoalIndex];
        goalBox.textContent = currentGoal.goalTitle;
        }

        function updateGoal() {
            const currentGoal = compoundsGoal[currentGoalIndex];
            goalBox.textContent = `GOAL: ${currentGoal} (${getCompoundName(currentGoal)})`;
        }

        function getCompoundName(compound) {
            const compoundNames = {
                'H2O': 'Water',
                'CO2': 'Carbon dioxide',
                'NH3': 'Ammonia' // Add more compounds as needed
            };

            return compoundNames[compound] || '';
        }

        function playSuccessSound() {
            const successSound = document.getElementById("successSound");
            successSound.play();
        }

        reactionArea.addEventListener('drop', function (event) {
            event.preventDefault();
            const data = event.dataTransfer.getData('text/plain');
            const [symbol, state] = data.split('|');

            const element = {
                symbol: symbol,
                state: state,
                icon: stateIcons[state]
            };

            elementsInReaction.push(element);

            for (const compound of compoundsGoal) {
                if (elementsInReaction.length === compound.length && canCombine(elementsInReaction, compound.split(''))) {
                    playSuccessSound();
                    elementsInReaction = []; // Reset elements after successful combination
                    currentGoalIndex++;

                    if (currentGoalIndex < compoundsGoal.length) {
                        updateGoal();
                    } else {
                        goalBox.textContent = "Congratulations! You've completed all goals.";
                        // Add logic for when all goals are completed
                    }

                    break;
                }
            }
        });
        updateGoal();
    });
</script>
</body>
</html>