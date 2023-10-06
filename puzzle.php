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
            bottom: 20px;
            border: none;
            border-radius: 30px; /* Remove circular border */
            padding: 10px; /* Adjust padding as needed */
            cursor: pointer;
            top: 89%;
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
            width: 40px;
            height: 40px;
            background-color: #ccc;
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
            font-weight: bold;
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
                width: 90vw;
                height: 90vw;
                max-width: 400px;
                max-height: 400px;
            }

            .inner-rounded-square {
                width: 70%;
                height: 40vw;
                max-height: 200px;
            }
        }


    </style>
</head>
<body>


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
<div class="outer-rounded-square">
<div class="container">
        <div class="periodic-table">
            <!-- Create placeholders for elements -->
            <!-- Row 1 -->
            <div class="element H" data-element="H" data-position="1,1"></div>
            <div class="element He" data-element="He" data-position="1,18"></div>
            <!-- Row 2 -->
            <div class="element Li" data-element="Li" data-position="2,1"></div>
            <div class="element Be" data-element="Be" data-position="2,2"></div>
            <div class="element B" data-element="B" data-position="2,13"></div>
            <div class="element C" data-element="C" data-position="2,14"></div>
            <div class="element N" data-element="N" data-position="2,15"></div>
            <div class="element O" data-element="O" data-position="2,16"></div>
            <div class="element F" data-element="F" data-position="2,17"></div>
            <div class="element Ne" data-element="Ne" data-position="2,18"></div>
            <!-- Row 3 -->
            <div class="element Na" data-element="Na" data-position="3,1"></div>
            <div class="element Mg" data-element="Mg" data-position="3,2"></div>
            <div class="element Al" data-element="Al" data-position="3,13"></div>
            <div class="element Si" data-element="Si" data-position="3,14"></div>
            <div class="element P" data-element="P" data-position="3,15"></div>
            <div class="element S" data-element="S" data-position="3,16"></div>
            <div class="element Cl" data-element="Cl" data-position="3,17"></div>
            <div class="element Ar" data-element="Ar" data-position="3,18"></div>

            <!--Row 4 -->
            <div class="element K" data-element="K" data-position="4,19"></div>
            <div class="element Ca" data-element="Ca" data-position="4,20"></div>
            <div class="element Sc" data-element="Sc" data-position="4,21"></div>
            <div class="element Ti" data-element="Ti" data-position="4,22"></div>
            <div class="element V" data-element="V" data-position="4,23"></div>
            <div class="element Cr" data-element="Cr" data-position="4,24"></div>
            <div class="element Mn" data-element="Mn" data-position="4,25"></div>
            <div class="element Fe" data-element="Fe" data-position="4,26"></div>
            <div class="element Co" data-element="Co" data-position="4,27"></div>
            <div class="element Ni" data-element="Ni" data-position="4,28"></div>
            <div class="element Cu" data-element="Cu" data-position="4,29"></div>
            <div class="element Zn" data-element="Zn" data-position="4,30"></div>
            <div class="element Ga" data-element="Ga" data-position="4,31"></div>
            <div class="element Ge" data-element="Ge" data-position="4,32"></div>
            <div class="element As" data-element="As" data-position="4,33"></div>
            <div class="element Se" data-element="Se" data-position="4,34"></div>
            <div class="element Br" data-element="Br" data-position="4,35"></div>
            <div class="element Kr" data-element="Kr" data-position="4,36"></div>

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

            <button class="retry-button" onclick="restartGame()">
        <img src="images/memory/retry-icon.png" alt="Retry Icon">
    </button>

    <div class="next-container">
        <div class="next">
            <a href="#">
                <button type="button" class="btn-next btn" style="color: #ea2063;">Next >></button>
            </a>
        </div>
    </div>
        </div>

        
    </div>
    </div>
</div>
    </main>
    <script>

        document.getElementById("backButton").onclick = function() {
            history.back();
        };
    </script>

<script>
        const draggableElements = document.querySelectorAll('.draggable-element');
        const elementPlaceholders = document.querySelectorAll('.element');

        let draggedElement = null;

        draggableElements.forEach((element) => {
            element.addEventListener('dragstart', (e) => {
                draggedElement = e.target;
                e.dataTransfer.setData('text/plain', element.dataset.element);
            });

            element.addEventListener('dragend', () => {
                draggedElement = null;
            });
        });

        elementPlaceholders.forEach((placeholder) => {
            placeholder.addEventListener('dragover', (e) => {
                e.preventDefault();
            });

            placeholder.addEventListener('drop', (e) => {
                e.preventDefault();
                const elementSymbol = e.dataTransfer.getData('text/plain');

                if (placeholder.dataset.element === elementSymbol) {
                    placeholder.innerHTML = draggedElement.dataset.element;
                    draggableElements.forEach((element) => {
                        if (element.dataset.element === elementSymbol) {
                            element.style.display = 'none';
                        }
                    });
                }
            });
        });

    </script>

    <script>
        function restartGame() {
            // Reset the draggable elements
            draggableElements.forEach((element) => {
                element.style.display = 'block';
            });

            // Reset the placeholders
            elementPlaceholders.forEach((placeholder) => {
                placeholder.innerHTML = '';
            });
        }

        // Add event listener to the restart button
        const restartButton = document.querySelector('.retry-button');
        restartButton.addEventListener('click', restartGame);

    </script>
</body>
</html>