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
            max-width: 700px;
            max-height: 230px;
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

        .element.Rb, .element.Cs, .element.Fr{
            background: #70bcca;
        }

        .element.Xe, .element.Rn, .element.Og{
            background: #d85041;
        }

        .element.Sb, .element.Te{
            background: #716dc2;
        }

        .element.In, .element.Sn,.element.Tl, .element.Pb,.element.Bi, .element.Po{
            background: #0b967c;
        }

        .element.I, .element.At{
            background: #a6a6a6;
        }

        .element.Sr, .element.Ba, .element.Ra{
            background: #63bb5d;
        }

         /* Elements 39-48 */
        .element.Y, .element.Zr, .element.Nb, .element.Mo, .element.Tc,
        .element.Ru, .element.Rh, .element.Pd, .element.Ag, .element.Cd {
            background: #ee8561;
        }

        /* Elements 72-80 */
        .element.Hf, .element.Ta, .element.W, .element.Re, .element.Os,
        .element.Ir, .element.Pt, .element.Au, .element.Hg {
            background: #ee8561;
        }

        /* Elements 104-108 */
        .element.Rf, .element.Db, .element.Sg, .element.Bh, .element.Hs {
            background: #ee8561;
        }

        /* Element 112 */
        .element.Cn {
            background: #ee8561;
        }

        /* Elements 109-111 */
        .element.Mt, .element.Ds, .element.Rg {
            background: #FFE39E;
        }

        /* Elements 113-117 */
        .element.Nh, .element.Fl, .element.Mc, .element.Lv, .element.Ts, .element.Og {
            background: #FFE39E;
        }



        /* Fourth Row Elements */
        .element.Rb {
            grid-row: 1 / span 2;
            grid-column: 1 / span 2;
        }

        .element.Sr {
            grid-row: 1 / span 2;
            grid-column: 3 / span 2;
        }

        .element.Y {
            grid-row: 1/ span 2;
            grid-column: 5 / span 2;
        }

        .element.Zr {
            grid-row: 1 / span 2;
            grid-column: 7 / span 2;
        }

        .element.Nb {
            grid-row: 1 / span 2;
            grid-column: 9 / span 2;
        }

        .element.Mo {
            grid-row: 1 / span 2;
            grid-column: 11 / span 2;
        }

        .element.Tc {
            grid-row: 1 / span 2;
            grid-column: 13 / span 2;
        }

        .element.Ru {
            grid-row: 1 / span 2;
            grid-column: 15 / span 2;
        }

        .element.Rh {
            grid-row: 1 / span 2;
            grid-column: 17 / span 2;
        }

        .element.Pd {
            grid-row: 1/ span 2;
            grid-column: 19 / span 2;
        }

        .element.Ag {
            grid-row: 1 / span 2;
            grid-column: 21 / span 2;
        }

        .element.Cd {
            grid-row: 1/ span 2;
            grid-column: 23 / span 2;
        }

        .element.In {
            grid-row: 1 / span 2;
            grid-column: 25 / span 2;
        }

        .element.Sn {
            grid-row: 1 / span 2;
            grid-column: 27 / span 2;
        }

        .element.Sb {
            grid-row: 1 / span 2;
            grid-column: 29 / span 2;
        }

        .element.Te {
            grid-row: 1 / span 2;
            grid-column: 31  / span 2;
        }

        .element.I {
            grid-row: 1/ span 2;
            grid-column: 33 / span 2;
        }

        .element.Xe {
            grid-row: 1 / span 2;
            grid-column: 35 / span 7;
        }

        /* Row 6 Elements */
        .element.Cs {
            grid-row: 3/ span 2;
            grid-column: 1 / span 2;
        }

        .element.Ba {
            grid-row: 3 / span 2;
            grid-column: 3 / span 2;
        }

        .empty-block {
            grid-row: 3 / span 2;
            grid-column: 5 / span 2;
        }

        .element.Hf {
            grid-row: 3 / span 2;
            grid-column: 7 / span 2;
        }

        .element.Ta {
            grid-row: 3 / span 2;
            grid-column: 9 / span 2;
        }

        .element.W {
            grid-row: 3 / span 2;
            grid-column: 11 / span 2;
        }

        .element.Re {
            grid-row: 3 / span 2;
            grid-column: 13 / span 2;
        }

        .element.Os {
            grid-row: 3 / span 2;
            grid-column: 15 / span 2;
        }

        .element.Ir {
            grid-row: 3 / span 2;
            grid-column: 17 / span 2;
        }

        .element.Pt {
            grid-row: 3 / span 2;
            grid-column: 19 / span 2;
        }

        .element.Au {
            grid-row: 3 / span 2;
            grid-column: 21 / span 2;
        }

        .element.Hg {
            grid-row: 3 / span 2;
            grid-column: 23 / span 2;
        }

        .element.Tl {
            grid-row: 3/ span 2;
            grid-column: 25 / span 2;
        }

        .element.Pb {
            grid-row: 3 / span 2;
            grid-column: 27 / span 2;
        }

        .element.Bi {
            grid-row: 3 / span 2;
            grid-column: 29 / span 2;
        }

        .element.Po {
            grid-row: 3 / span 2;
            grid-column: 31 / span 2;
        }

        .element.At {
            grid-row: 3 / span 2;
            grid-column: 33 / span 2;
        }

        .element.Rn {
            grid-row: 3 / span 2;
            grid-column: 35 / span 2;
        }

        /* Row 7 Elements */
        .element.Fr {
            grid-row: 5 / span 2;
            grid-column: 1 / span 2;
        }

        .element.Ra {
            grid-row: 5 / span 2;
            grid-column: 3 / span 2;
        }

        .empty-block {
            grid-row: 5 / span 2;
            grid-column: 5 / span 2;
        }

        .element.Rf {
            grid-row: 5 / span 2;
            grid-column: 7 / span 2;
        }

        .element.Db {
            grid-row: 5 / span 2;
            grid-column: 9 / span 2;
        }

        .element.Sg {
            grid-row: 5 / span 2;
            grid-column: 11 / span 2;
        }

        .element.Bh {
            grid-row: 5 / span 2;
            grid-column: 13 / span 2;
        }

        .element.Hs {
            grid-row: 5 / span 2;
            grid-column: 15 / span 2;
        }

        .element.Mt {
            grid-row: 5 / span 2;
            grid-column: 17 / span 2;
        }

        .element.Ds {
            grid-row: 5 / span 2;
            grid-column: 19 / span 2;
        }

        .element.Rg {
            grid-row: 5 / span 2;
            grid-column: 21 / span 2;
        }

        .element.Cn {
            grid-row: 5 / span 2;
            grid-column: 23 / span 2;
        }

        .element.Nh {
            grid-row: 5 / span 2;
            grid-column: 25 / span 2;
        }

        .element.Fl {
            grid-row: 5 / span 2;
            grid-column: 27 / span 2;
        }

        .element.Mc {
            grid-row: 5 / span 2;
            grid-column: 29 / span 2;
        }

        .element.Lv {
            grid-row: 5 / span 2;
            grid-column: 31 / span 2;
        }

        .element.Ts {
            grid-row: 5 / span 2;
            grid-column: 33 / span 2;
        }

        .element.Og {
            grid-row: 5 / span 2;
            grid-column: 35 / span 2;
        }

        /* Empty Block in Row 6 */
        .empty-block-row6 {
            grid-row: 9 / span 2;
            grid-column: 5 / span 2;
        }

        /* Empty Block in Row 7 */
        .empty-block-row7 {
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
    <!-- Row 5 -->
<div class="element Rb hover-text" data-element="Rb" data-position="5,1">37</div>
<span class="tooltip-text" id="fade-Rb">Soft, silvery-white metallic element; reacts violently with water.</span>

<div class="element Sr hover-text" data-element="Sr" data-position="5,2">38</div>
<span class="tooltip-text" id="fade-Sr">Alkaline earth metal; used in fireworks for a bright red color.</span>

<div class="element Y hover-text" data-element="Y" data-position="5,3">39</div>
<span class="tooltip-text" id="fade-Y">Transition metal; used in alloys for aircraft and spacecraft.</span>

<div class="element Zr hover-text" data-element="Zr" data-position="5,4">40</div>
<span class="tooltip-text" id="fade-Zr">Refractory metal; used in nuclear reactors and spacecraft.</span>

<div class="element Nb hover-text" data-element="Nb" data-position="5,5">41</div>
<span class="tooltip-text" id="fade-Nb">Soft, silvery metal; used in superalloys for jet engines.</span>

<div class="element Mo hover-text" data-element="Mo" data-position="5,6">42</div>
<span class="tooltip-text" id="fade-Mo">Silvery-gray metal; used in high-strength steel alloys.</span>

<div class="element Tc hover-text" data-element="Tc" data-position="5,7">43</div>
<span class="tooltip-text" id="fade-Tc">Radioactive metal; has no stable isotopes.</span>

<div class="element Ru hover-text" data-element="Ru" data-position="5,8">44</div>
<span class="tooltip-text" id="fade-Ru">Hard, white metal; used as a catalyst in the chemical industry.</span>

<div class="element Rh hover-text" data-element="Rh" data-position="5,9">45</div>
<span class="tooltip-text" id="fade-Rh">Rare, silvery-white metal; used in catalytic converters.</span>

<div class="element Pd hover-text" data-element="Pd" data-position="5,10">46</div>
<span class="tooltip-text" id="fade-Pd">Soft, silvery-white metal; used in catalytic converters and electronics.</span>

<div class="element Ag hover-text" data-element="Ag" data-position="5,11">47</div>
<span class="tooltip-text" id="fade-Ag">Precious metal; widely used in jewelry and silverware.</span>

<div class="element Cd hover-text" data-element="Cd" data-position="5,12">48</div>
<span class="tooltip-text" id="fade-Cd">Soft, bluish-white metal; used in batteries and pigments.</span>

<div class="element In hover-text" data-element="In" data-position="5,13">49</div>
<span class="tooltip-text" id="fade-In">Soft, malleable metal; used in electronics and solar panels.</span>

<div class="element Sn hover-text" data-element="Sn" data-position="5,14">50</div>
<span class="tooltip-text" id="fade-Sn">Malleable metal; used in alloys and as a protective coating on steel.</span>

<div class="element Sb hover-text" data-element="Sb" data-position="5,15">51</div>
<span class="tooltip-text" id="fade-Sb">Metalloid; used in flame retardants and as a component in some alloys.</span>

<div class="element Te hover-text" data-element="Te" data-position="5,16">52</div>
<span class="tooltip-text" id="fade-Te">Metalloid; used in solar panels and some electronic devices.</span>

<div class="element I hover-text" data-element="I" data-position="5,17">53</div>
<span class="tooltip-text" id="fade-I">Halogen; essential for thyroid function; used in medicine and photography.</span>

<div class="element Xe hover-text" data-element="Xe" data-position="5,18">54</div>
<span class="tooltip-text" id="fade-Xe">Noble gas; used in certain types of lighting and medical imaging.</span>


<!-- Row 6 -->
<div class="element Cs hover-text" data-element="Cs" data-position="6,1">55</div>
<span class="tooltip-text" id="fade-Cs">Alkali metal; used in atomic clocks and certain medical treatments.</span>

<div class="element Ba hover-text" data-element="Ba" data-position="6,2">56</div>
<span class="tooltip-text" id="fade-Ba">Alkaline earth metal; used in fluorescent lighting and medical imaging.</span>

<div class="empty-block-row6">

</div>

<div class="element Hf hover-text" data-element="Hf" data-position="6,4">72</div>
<span class="tooltip-text" id="fade-Hf">Refractory metal; used in aerospace and nuclear applications.</span>

<div class="element Ta hover-text" data-element="Ta" data-position="6,5">73</div>
<span class="tooltip-text" id="fade-Ta">Heavy metal; used in electronic components and medical devices.</span>

<div class="element W hover-text" data-element="W" data-position="6,6">74</div>
<span class="tooltip-text" id="fade-W">Heavy metal; used in electrical contacts, bulbs, and aerospace.</span>

<div class="element Re hover-text" data-element="Re" data-position="6,7">75</div>
<span class="tooltip-text" id="fade-Re">Rare, dense metal; used in catalysts and electronic components.</span>

<div class="element Os hover-text" data-element="Os" data-position="6,8">76</div>
<span class="tooltip-text" id="fade-Os">Dense, hard metal; used in electrical contacts and fountain pen tips.</span>

<div class="element Ir hover-text" data-element="Ir" data-position="6,9">77</div>
<span class="tooltip-text" id="fade-Ir">Dense, corrosion-resistant metal; used in electrical contacts and spark plugs.</span>

<div class="element Pt hover-text" data-element="Pt" data-position="6,10">78</div>
<span class="tooltip-text" id="fade-Pt">Precious metal; used in jewelry, catalytic converters, and electronics.</span>

<div class="element Au hover-text" data-element="Au" data-position="6,11">79</div>
<span class="tooltip-text" id="fade-Au">Precious metal; widely used in jewelry and currency.</span>

<div class="element Hg hover-text" data-element="Hg" data-position="6,12">80</div>
<span class="tooltip-text" id="fade-Hg">Liquid metal; used in thermometers, barometers, and some electrical switches.</span>

<div class="element Tl hover-text" data-element="Tl" data-position="6,13">81</div>
<span class="tooltip-text" id="fade-Tl">Soft, malleable metal; used in electronics and certain medical treatments.</span>

<div class="element Pb hover-text" data-element="Pb" data-position="6,14">82</div>
<span class="tooltip-text" id="fade-Pb">Heavy metal; used in batteries, radiation shielding, and plumbing.</span>

<div class="element Bi hover-text" data-element="Bi" data-position="6,15">83</div>
<span class="tooltip-text" id="fade-Bi">Heavy metal; used in medicines, pigments, and certain alloys.</span>

<div class="element Po hover-text" data-element="Po" data-position="6,16">84</div>
<span class="tooltip-text" id="fade-Po">Radioactive metal; used in nuclear reactors.</span>

<div class="element At hover-text" data-element="At" data-position="6,17">85</div>
<span class="tooltip-text" id="fade-At">Radioactive halogen; has no stable isotopes.</span>

<div class="element Rn hover-text" data-element="Rn" data-position="6,18">86</div>
<span class="tooltip-text" id="fade-Rn">Noble gas; used in certain types of lighting and medical imaging.</span>


<!-- Row 7 -->
<div class="element Fr hover-text" data-element="Fr" data-position="7,1">87</div>
<span class="tooltip-text" id="fade-Fr">A highly reactive element used in advanced energy research.</span>

<div class="element Ra hover-text" data-element="Ra" data-position="7,2">88</div>
<span class="tooltip-text" id="fade-Ra">A radioactive metal with luminescent properties, once used in ancient practices.</span>

<div class="empty-block-row7">
    <!-- Empty block, no specific element -->
</div>

<div class="element Rf hover-text" data-element="Rf" data-position="7,4">104</div>
<span class="tooltip-text" id="fade-Rf">A revolutionary metal known for its role in advanced technologies.</span>

<div class="element Db hover-text" data-element="Db" data-position="7,5">105</div>
<span class="tooltip-text" id="fade-Db">A dazzling metal with unique magnetic properties.</span>

<div class="element Sg hover-text" data-element="Sg" data-position="7,6">106</div>
<span class="tooltip-text" id="fade-Sg">A spectacular element renowned for stunning visual effects.</span>

<div class="element Bh hover-text" data-element="Bh" data-position="7,7">107</div>
<span class="tooltip-text" id="fade-Bh">A breathtaking metal used in cutting-edge architecture.</span>

<div class="element Hs hover-text" data-element="Hs" data-position="7,8">108</div>
<span class="tooltip-text" id="fade-Hs">A harmonious element with unique sound conductivity.</span>

<div class="element Mt hover-text" data-element="Mt" data-position="7,9">109</div>
<span class="tooltip-text" id="fade-Mt">A masterful element with trace amounts produced, unlocking secrets in various scientific disciplines.</span>

<div class="element Ds hover-text" data-element="Ds" data-position="7,10">110</div>
<span class="tooltip-text" id="fade-Ds">A distinguished synthetic element with trace amounts, contributing to scientific discoveries.</span>

<div class="element Rg hover-text" data-element="Rg" data-position="7,11">111</div>
<span class="tooltip-text" id="fade-Rg">A radiant synthetic element, illuminating new possibilities in scientific exploration.</span>

<div class="element Cn hover-text" data-element="Cn" data-position="7,12">112</div>
<span class="tooltip-text" id="fade-Cn">A captivating synthetic element, inspiring curiosity and innovation in scientific communities.</span>

<div class="element Nh hover-text" data-element="Nh" data-position="7,13">113</div>
<span class="tooltip-text" id="fade-Nh">A noble synthetic element, contributing to the pursuit of knowledge and understanding.</span>

<div class="element Fl hover-text" data-element="Fl" data-position="7,14">114</div>
<span class="tooltip-text" id="fade-Fl">A fascinating synthetic element with trace amounts, pushing the boundaries of scientific inquiry.</span>

<div class="element Mc hover-text" data-element="Mc" data-position="7,15">115</div>
<span class="tooltip-text" id="fade-Mc">A marvelous synthetic element, opening doors to new realms of scientific understanding.</span>

<div class="element Lv hover-text" data-element="Lv" data-position="7,16">116</div>
<span class="tooltip-text" id="fade-Lv">A luminous synthetic element, contributing to the enlightenment of scientific frontiers.</span>

<div class="element Ts hover-text" data-element="Ts" data-position="7,17">117</div>
<span class="tooltip-text" id="fade-Ts">A trailblazing synthetic element, marking the path for future scientific exploration and discovery.</span>

<div class="element Og hover-text" data-element="Og" data-position="7,18">118</div>
<span class="tooltip-text" id="fade-Og">A synthetic element with trace amounts, pushing the boundaries of scientific knowledge and innovation.</span>


</div>

<div class="inner-rounded-square">
    <div class="element-list">
        <!-- Create draggable elements -->
        <div class="draggable-element" id="element-Rb" data-element="Rb" draggable="true">Rb</div>
        <div class="draggable-element" id="element-Sr" data-element="Sr" draggable="true">Sr</div>
        <div class="draggable-element" id="element-Y" data-element="Y" draggable="true">Y</div>
        <div class="draggable-element" id="element-Zr" data-element="Zr" draggable="true">Zr</div>
        <div class="draggable-element" id="element-Nb" data-element="Nb" draggable="true">Nb</div>
        <div class="draggable-element" id="element-Mo" data-element="Mo" draggable="true">Mo</div>
        <div class="draggable-element" id="element-Tc" data-element="Tc" draggable="true">Tc</div>
        <div class="draggable-element" id="element-Ru" data-element="Ru" draggable="true">Ru</div>
        <div class="draggable-element" id="element-Rh" data-element="Rh" draggable="true">Rh</div>
        <div class="draggable-element" id="element-Pd" data-element="Pd" draggable="true">Pd</div>

        <div class="draggable-element" id="element-Ag" data-element="Ag" draggable="true">Ag</div>
        <div class="draggable-element" id="element-Cd" data-element="Cd" draggable="true">Cd</div>
        <div class="draggable-element" id="element-In" data-element="In" draggable="true">In</div>
        <div class="draggable-element" id="element-Sn" data-element="Sn" draggable="true">Sn</div>
        <div class="draggable-element" id="element-Sb" data-element="Sb" draggable="true">Sb</div>
        <div class="draggable-element" id="element-Te" data-element="Te" draggable="true">Te</div>
        <div class="draggable-element" id="element-I" data-element="I" draggable="true">I</div>
        <div class="draggable-element" id="element-Xe" data-element="Xe" draggable="true">Xe</div>

        <div class="draggable-element" id="element-Cs" data-element="Cs" draggable="true">Cs</div>
        <div class="draggable-element" id="element-Ba" data-element="Ba" draggable="true">Ba</div>
        <div class="draggable-element" id="element-Hf" data-element="Hf" draggable="true">Hf</div>
        <div class="draggable-element" id="element-Ta" data-element="Ta" draggable="true">Ta</div>
        <div class="draggable-element" id="element-W" data-element="W" draggable="true">W</div>
        <div class="draggable-element" id="element-Re" data-element="Re" draggable="true">Re</div>
        <div class="draggable-element" id="element-Os" data-element="Os" draggable="true">Os</div>
        <div class="draggable-element" id="element-Ir" data-element="Ir" draggable="true">Ir</div>
        <div class="draggable-element" id="element-Pt" data-element="Pt" draggable="true">Pt</div>
        <div class="draggable-element" id="element-Au" data-element="Au" draggable="true">Au</div>
        <div class="draggable-element" id="element-Hg" data-element="Hg" draggable="true">Hg</div>
        <div class="draggable-element" id="element-Tl" data-element="Tl" draggable="true">Tl</div>
        <div class="draggable-element" id="element-Pb" data-element="Pb" draggable="true">Pb</div>
        <div class="draggable-element" id="element-Bi" data-element="Bi" draggable="true">Bi</div>
        <div class="draggable-element" id="element-Po" data-element="Po" draggable="true">Po</div>
        <div class="draggable-element" id="element-At" data-element="At" draggable="true">At</div>
        <div class="draggable-element" id="element-Rn" data-element="Rn" draggable="true">Rn</div>

        <div class="draggable-element" id="element-Fr" data-element="Fr" draggable="true">Fr</div>
        <div class="draggable-element" id="element-Ra" data-element="Ra" draggable="true">Ra</div>
        <div class="draggable-element" id="element-Rf" data-element="Rf" draggable="true">Rf</div>
        <div class="draggable-element" id="element-Db" data-element="Db" draggable="true">Db</div>
        <div class="draggable-element" id="element-Sg" data-element="Sg" draggable="true">Sg</div>
        <div class="draggable-element" id="element-Bh" data-element="Bh" draggable="true">Bh</div>
        <div class="draggable-element" id="element-Hs" data-element="Hs" draggable="true">Hs</div>
        <div class="draggable-element" id="element-Mt" data-element="Mt" draggable="true">Mt</div>
        <div class="draggable-element" id="element-Ds" data-element="Ds" draggable="true">Ds</div>
        <div class="draggable-element" id="element-Rg" data-element="Rg" draggable="true">Rg</div>
        <div class="draggable-element" id="element-Cn" data-element="Cn" draggable="true">Cn</div>
        <div class="draggable-element" id="element-Nh" data-element="Nh" draggable="true">Nh</div>
        <div class="draggable-element" id="element-Fl" data-element="Fl" draggable="true">Fl</div>
        <div class="draggable-element" id="element-Mc" data-element="Mc" draggable="true">Mc</div>
        <div class="draggable-element" id="element-Lv" data-element="Lv" draggable="true">Lv</div>
        <div class="draggable-element" id="element-Ts" data-element="Ts" draggable="true">Ts</div>
        <div class="draggable-element" id="element-Og" data-element="Og" draggable="true">Og</div>


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
        window.location.href = "puzzle-lvl3.php"; // Replace with the appropriate URL
    });
}
        document.getElementById("backButton").onclick = function() {
            history.back();
        };
    </script>

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

    <script src="music.js"></script>


</body>
</html>