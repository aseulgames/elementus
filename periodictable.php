<!-- <?php
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
    }

?> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="periodicstyle.css">
	<title>Periodic Table</title>
</head>

<body style="background-image: url('images/periodicbg.png');">
	
<link rel="stylesheet" href="periodictablestyle.css">
<div class="nav" style="background: rgb((255), 255, 255, 0); ">
    <div class="logo"><a href="homestudent.php" >
        <img src="logo_dark.png" alt="logopng" class="logopng" style="max-width: 40%; padding-top:0px;
            max-height: 100% ;">
            </a>
        </div>
		
        <ul class="menu">
            <li><a class="#" href="homestudent.php">Home</a></li>
            <li><a class="#" href="#">About</a></li>
            <li><a class="#" href="games.php">Games</a></li>
            <li><a class="#" href="periodictable.php">Periodic Table</a></li>
            <li><a class="#" href="profileedit_student.php">Profile</a></li>

            <?php

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

            
        </ul>
		
    </div>
</div>

<div class="wrapper">
	<input class="category-toggle" type="radio" id="alkali-metals" name="categories"/>
	<input class="category-cancel" type="radio" id="cancel" name="categories"/>
	<input class="category-toggle" type="radio" id="alkaline-earth-metals" name="categories"/>
	<input class="category-cancel" type="radio" id="cancel" name="categories"/>
	<input class="category-toggle" type="radio" id="lanthanoids" name="categories"/>
	<input class="category-cancel" type="radio" id="cancel" name="categories"/>
	<input class="category-toggle" type="radio" id="actinoids" name="categories"/>
	<input class="category-cancel" type="radio" id="cancel" name="categories"/>
	<input class="category-toggle" type="radio" id="transition-metals" name="categories"/>
	<input class="category-cancel" type="radio" id="cancel" name="categories"/>
	<input class="category-toggle" type="radio" id="post-transition-metals" name="categories"/>
	<input class="category-cancel" type="radio" id="cancel" name="categories"/>
	<input class="category-toggle" type="radio" id="metalloids" name="categories"/>
	<input class="category-cancel" type="radio" id="cancel" name="categories"/>
	<input class="category-toggle" type="radio" id="other-nonmetals" name="categories"/>
	<input class="category-cancel" type="radio" id="cancel" name="categories"/>
	<input class="category-toggle" type="radio" id="noble-gasses" name="categories"/>
	<input class="category-cancel" type="radio" id="cancel" name="categories"/>
	<input class="category-toggle" type="radio" id="unknown" name="categories"/>
	<input class="category-cancel" type="radio" id="cancel" name="categories"/>
	
	<div class="periodic-table">
	  <div class="element other-nonmetal c1 r1">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">1</div>
		  <div class="label">
			<div class="symbol">H</div>
			<div class="name">Hydrogen</div>
		  </div>
		  
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1766</b></li>
			<li><i class="discoveredby">Henry Cavendish (England)</i></li>
			<li>----------------</li>
			<li>Melting Point: <b>-161.79°C</b></li>
			<li>Boiling Point: <b>-158.21°C</b></li>
		  </ul>
		  <div class="atomic-mass">1.008</div>
		  <ul class="atomic-weight">
			<lis>Gas</li>
			<li>1</li>
		  </ul>
		  <!-- Element year end -->
		  
		</div>
	  </div>
	  <div class="element noble-gas c18 r1">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">2</div>
		  <div class="label">
			<div class="symbol">He</div>
			<div class="name">Helium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1895</b></li>
			<li><i class="discoveredby">Ramsey, Langet, Cleve (Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>-272.2°C</b></li>
			<li>Boiling Point: <b>-268.9°C</b></li>
		  </ul>
		  <div class="atomic-mass">4.0026</div>
		  <ul class="atomic-weight">
			<li>Gas</li>
			<li>2</li>
		  </ul>
		  <!-- Element year end -->
		</div>
	  </div>
	  <div class="element alkali-metal c1 r2" >
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">3</div>
		  <div class="label">
			<div class="symbol">Li</div>
			<div class="name">Lithium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1817</b></li>
			<li><i class="discoveredby">Johann Arfwedson (Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>180.5°C</b></li>
			<li>Boiling Point: <b>1342°C</b></li>
		  </ul>
		  <div class="atomic-mass">6.94</div>
		  <ul class="atomic-weight">
			<li>Solid</li>
			<li>3</li>
		  </ul>
		  <!-- Element year end -->
		</div>
	  </div>
	  <div class="element alkaline-earth-metal c2 r2">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">4</div>
		  <div class="label">
			<div class="symbol">Be</div>
			<div class="name">Beryllium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1798</b></li>
			<li><i class="discoveredby">Woheler and Bussy (Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1287°C</b></li>
			<li>Boiling Point: <b>2471°C</b></li>
		  </ul>
		  <div class="atomic-mass">9.012</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>2</li>
		  </ul>
		<!-- Element year end -->
		</div>
	  </div>
	  <div class="element metalloid c13 r2">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">5</div>
		  <div class="label">
			<div class="symbol">B</div>
			<div class="name">Boron</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1808</b></li>
			<li><i class="discoveredby">Davy, Gay-Lussac, and Thenard (England)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>2200°C</b></li>
			<li>Boiling Point: <b>2550°C</b></li>
		  </ul>
		  <div class="atomic-mass">10.811</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>3</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element other-nonmetal c14 r2">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">6</div>
		  <div class="label">
			<div class="symbol">C</div>
			<div class="name">Carbon</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1789 (Antoine Lavoisier)</b></li>
			<li><i class="discoveredby">Known to the ancients</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>3550°C</b></li>
			<li>Boiling Point: <b>4827°C</b></li>
		  </ul>
		  <div class="atomic-mass">12.011</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>4</li>
		  </ul>
		<!-- Element year end -->
		  </ul>
		</div>
	  </div>
	  <div class="element other-nonmetal c15 r2">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">7</div>
		  <div class="label">
			<div class="symbol">N</div>
			<div class="name">Nitrogen</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1772</b></li>
			<li><i class="discoveredby">Daniel Rutherford (Scotland)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>-209.86°C</b></li>
			<li>Boiling Point: <b>-195.8°C</b></li>
		  </ul>
		  <div class="atomic-mass">14.007</div>
		  <ul class="atomic-weight">
			<lis>Gas</li>
			<li>2</li>
			<li>5</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element other-nonmetal c16 r2">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">8</div>
		  <div class="label">
			<div class="symbol">O</div>
			<div class="name">Oxygen</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1774</b></li>
			<li><i class="discoveredby" style="font-size: 0.4vw">Priestly and Scheele (England/Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>-218.4°C</b></li>
			<li>Boiling Point: <b>-183°C</b></li>
		  </ul>
		  <div class="atomic-mass">15.999</div>
		  <ul class="atomic-weight">
			<lis>Gas</li>
			<li>2</li>
			<li>6</li>
		  </ul>
		<!-- Element year end -->
		</div>
	  </div>
	  <div class="element other-nonmetal c17 r2">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">9</div>
		  <div class="label">
			<div class="symbol">F</div>
			<div class="name">Flourine</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1886</b></li>
			<li><i class="discoveredby">Henri Moissan (France)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>-219.62°C</b></li>
			<li>Boiling Point: <b>-188°C</b></li>
		  </ul>
		  <div class="atomic-mass">18.998</div>
		  <ul class="atomic-weight">
			<lis>Gas</li>
			<li>2</li>
			<li>7</li>
		  </ul>
		<!-- Element year end -->
		</div>
	  </div>
	  <div class="element noble-gas c18 r2">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">10</div>
		  <div class="label">
			<div class="symbol">Ne</div>
			<div class="name">Neon</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1898</b></li>
			<li><i class="discoveredby">Ramsey and Travers (England)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>-248.67°C</b></li>
			<li>Boiling Point: <b>-246.048°C</b></li>
		  </ul>
		  <div class="atomic-mass">20.18</div>
		  <ul class="atomic-weight">
			<lis>Gas</li>
			<li>2</li>
			<li>8</li>
		  </ul>
		<!-- Element year end -->
		</div>
	  </div>
	  <div class="element alkali-metal c1 r3">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">11</div>
		  <div class="label">
			<div class="symbol">Na</div>
			<div class="name">Sodium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1807</b></li>
			<li><i class="discoveredby">Humphrey Davy (England)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>97.81°C</b></li>
			<li>Boiling Point: <b>882.9°C</b></li>
		  </ul>
		  <div class="atomic-mass">22.99</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>1</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element alkaline-earth-metal c2 r3">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">12</div>
		  <div class="label">
			<div class="symbol">Mg</div>
			<div class="name">Magnesium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1808</b></li>
			<li><i class="discoveredby">Humphrey Davy (England)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>650°C</b></li>
			<li>Boiling Point: <b>1090°C</b></li>
		  </ul>
		  <div class="atomic-mass">24.305</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element post-transition-metal c13 r3">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">13</div>
		  <div class="label">
			<div class="symbol">Al</div>
			<div class="name">Aluminium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1825</b></li>
			<li><i class="discoveredby">Hans Christian Oersted (Denmark)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>660.32°C</b></li>
			<li>Boiling Point: <b>2518.85°C</b></li>
		  </ul>
		  <div class="atomic-mass">26.982</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>3</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element metalloid c14 r3">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">14</div>
		  <div class="label">
			<div class="symbol">Si</div>
			<div class="name">Silicon</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1823</b></li>
			<li><i class="discoveredby">Johns Berzelius (Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1410°C</b></li>
			<li>Boiling Point: <b>2355°C</b></li>
		  </ul>
		  <div class="atomic-mass">28.085</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>4</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element other-nonmetal c15 r3">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">15</div>
		  <div class="label">
			<div class="symbol">P</div>
			<div class="name">Phosphorus</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1669</b></li>
			<li><i class="discoveredby">Johns Berzelius (Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>44.1°C</b></li>
			<li>Boiling Point: <b>280°C</b></li>
		  </ul>
		  <div class="atomic-mass">30.974</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>5</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element other-nonmetal c16 r3">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">16</div>
		  <div class="label">
			<div class="symbol">S</div>
			<div class="name">Sulfur</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1777</b></li>
			<li><i class="discoveredby" style="font-size: 0.4vw">Antoine Lavoisier (India, China, and Greece)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>112.8°C</b></li>
			<li>Boiling Point: <b>444.6°C</b></li>
		  </ul>
		  <div class="atomic-mass">32.06</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>6</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element other-nonmetal c17 r3">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">17</div>
		  <div class="label">
			<div class="symbol">Cl</div>
			<div class="name">Chlorine</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1774</b></li>
			<li><i class="discoveredby">Carl Wilhelm Scheele (Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>-101.5°C</b></li>
			<li>Boiling Point: <b>-34.04°C</b></li>
		  </ul>
		  <div class="atomic-mass">35.453</div>
		  <ul class="atomic-weight">
			<lis>Gas</li>
			<li>2</li>
			<li>8</li>
			<li>7</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element noble-gas c18 r3">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">18</div>
		  <div class="label">
			<div class="symbol">Ar</div>
			<div class="name">Argon</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1894</b></li>
			<li><i class="discoveredby">Ramsey and Rayleigh (Scotland)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>-189.2°C</b></li>
			<li>Boiling Point: <b>-185.7°C</b></li>
		  </ul>
		  <div class="atomic-mass">39.948</div>
		  <ul class="atomic-weight">
			<lis>Gas</li>
			<li>2</li>
			<li>8</li>
			<li>8</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element alkali-metal c1 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">19</div>
		  <div class="label">
			<div class="symbol">K</div>
			<div class="name">Potassium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1807</b></li>
			<li><i class="discoveredby">Sir Humphrey Davy (England)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>63.26°C</b></li>
			<li>Boiling Point: <b>760°C</b></li>
		  </ul>
		  <div class="atomic-mass">39.948</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>8</li>
			<li>1</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element alkaline-earth-metal c2 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">20</div>
		  <div class="label">
			<div class="symbol">Ca</div>
			<div class="name">Calcium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1808</b></li>
			<li><i class="discoveredby">Sir Humphrey Davy (England)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>842°C</b></li>
			<li>Boiling Point: <b>1484°C</b></li>
		  </ul>
		  <div class="atomic-mass">40.078</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>8</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c3 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">21</div>
		  <div class="label">
			<div class="symbol">Sc</div>
			<div class="name">Scandium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1879</b></li>
			<li><i class="discoveredby">Lars Nilson (Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1541°C</b></li>
			<li>Boiling Point: <b>2836°C</b></li>
		  </ul>
		  <div class="atomic-mass">44.956</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>9</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c4 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">22</div>
		  <div class="label">
			<div class="symbol">Ti</div>
			<div class="name">Titanium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1791</b></li>
			<li><i class="discoveredby">William Gregor (England)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1660°C</b></li>
			<li>Boiling Point: <b>3287°C</b></li>
		  </ul>
		  <div class="atomic-mass">47.867</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>10</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c5 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">23</div>
		  <div class="label">
			<div class="symbol">V</div>
			<div class="name">Vanadium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1830</b></li>
			<li><i class="discoveredby">Nils Sefstrom (Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1890°C</b></li>
			<li>Boiling Point: <b>3380°C</b></li>
		  </ul>
		  <div class="atomic-mass">50.942</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>11</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c6 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">24</div>
		  <div class="label">
			<div class="symbol">Cr</div>
			<div class="name">Chromium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1797</b></li>
			<li><i class="discoveredby">Louis Vauquelin (France)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1890°C</b></li>
			<li>Boiling Point: <b>2482°C</b></li>
		  </ul>
		  <div class="atomic-mass">51.996</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>13</li>
			<li>1</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c7 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">25</div>
		  <div class="label">
			<div class="symbol">Mn</div>
			<div class="name">Manganese</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1774</b></li>
			<li><i class="discoveredby">Johann Gahn (Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1246°C</b></li>
			<li>Boiling Point: <b>2062°C</b></li>
		  </ul>
		  <div class="atomic-mass">54.938</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>13</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c8 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">26</div>
		  <div class="label">
			<div class="symbol">Fe</div>
			<div class="name">Iron</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>5000 BC</b></li>
			<li><i class="discoveredby" style="font-size: 0.4vw">Known to the ancients (Egypt and Mesopotamia)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1246°C</b></li>
			<li>Boiling Point: <b>2062°C</b></li>
		  </ul>
		  <div class="atomic-mass">54.938</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>14</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c9 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">27</div>
		  <div class="label">
			<div class="symbol">Co</div>
			<div class="name">Cobalt</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1739</b></li>
			<li><i class="discoveredby">George Brandt (Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1495°C</b></li>
			<li>Boiling Point: <b>2927°C</b></li>
		  </ul>
		  <div class="atomic-mass">58.933</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>15</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c10 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">28</div>
		  <div class="label">
			<div class="symbol">Ni</div>
			<div class="name">Nickel</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1751</b></li>
			<li><i class="discoveredby">Axel Cronstedt (Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1453°C</b></li>
			<li>Boiling Point: <b>2913°C</b></li>
		  </ul>
		  <div class="atomic-mass">58.693</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>16</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c11 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">29</div>
		  <div class="label">
			<div class="symbol">Cu</div>
			<div class="name">Copper</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>9000 BC</b></li>
			<li><i class="discoveredby" style="font-size:0.4vw">Known to the ancients (Iraq and Africa)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1083°C</b></li>
			<li>Boiling Point: <b>2567°C</b></li>
		  </ul>
		  <div class="atomic-mass">63.546</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>1</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c12 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">30</div>
		  <div class="label">
			<div class="symbol">Zn</div>
			<div class="name">Zinc</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1746</b></li>
			<li><i class="discoveredby">Andreas Marggraf (Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>420°C</b></li>
			<li>Boiling Point: <b>907°C</b></li>
		  </ul>
		  <div class="atomic-mass">65.38</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element post-transition-metal c13 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">31</div>
		  <div class="label">
			<div class="symbol">Ga</div>
			<div class="name">Gallium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1875</b></li>
			<li><i class="discoveredby" style="font-size:0.4vw">Paul Emile Lecoq de Boisbaudran (France)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>29.78°C</b></li>
			<li>Boiling Point: <b>2204°C</b></li>
		  </ul>
		  <div class="atomic-mass">69.723</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>3</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element metalloid c14 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">32</div>
		  <div class="label">
			<div class="symbol">Ge</div>
			<div class="name">Germanium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1886</b></li>
			<li><i class="discoveredby">Clemens Winkler (Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>937.4°C</b></li>
			<li>Boiling Point: <b>2830°C</b></li>
		  </ul>
		  <div class="atomic-mass">79.63</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>4</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element metalloid c15 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">33</div>
		  <div class="label">
			<div class="symbol">As</div>
			<div class="name">Arsenic</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1250</b></li>
			<li><i class="discoveredby" style="font-size:0.4vw">Magnus (Early Chinese, Greek and Egyptian)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>817°C</b></li>
			<li>Boiling Point: <b>613°C</b></li>
		  </ul>
		  <div class="atomic-mass">74.922</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>5</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element other-nonmetal c16 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">34</div>
		  <div class="label">
			<div class="symbol">Se</div>
			<div class="name">Selenium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1817</b></li>
			<li><i class="discoveredby">Jons Berzelius (Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>217°C</b></li>
			<li>Boiling Point: <b>684.9°C</b></li>
		  </ul>
		  <div class="atomic-mass">78.971</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>6</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element other-nonmetal c17 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">35</div>
		  <div class="label">
			<div class="symbol">Br</div>
			<div class="name">Bromine</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1826</b></li>
			<li><i class="discoveredby">Antoine J. Balard (France)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>-7.2°C</b></li>
			<li>Boiling Point: <b>58.78°C</b></li>
		  </ul>
		  <div class="atomic-mass">79.904</div>
		  <ul class="atomic-weight">
			<lis>Liquid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>7</li>
		  </ul>
	<!-- Element year end -->
		</div>
	  </div>
	  <div class="element noble-gas c18 r4">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">36</div>
		  <div class="label">
			<div class="symbol">Kr</div>
			<div class="name">Krypton</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1898</b></li>
			<li><i class="discoveredby">Ramsey and Rayleigh (Scotland)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>-156.6°C</b></li>
			<li>Boiling Point: <b>-152.3°C</b></li>
		  </ul>
		  <div class="atomic-mass">83.798</div>
		  <ul class="atomic-weight">
			<lis>Gas</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>8</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element alkali-metal c1 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">37</div>
		  <div class="label">
			<div class="symbol">Rb</div>
			<div class="name">Rubidium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1861</b></li>
			<li><i class="discoveredby">Bunsen, Kirchoff (Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>3.89°C</b></li>
			<li>Boiling Point: <b>364.44°C</b></li>
		  </ul>
		  <div class="atomic-mass">85.468</div>
		  <ul class="atomic-weight">
			<li>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>8</li>
			<li>1</li>
		  </ul>
			<!-- Element year end -->
		  
		</div>
	  </div>
	  <div class="element alkaline-earth-metal c2 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">38</div>
		  <div class="label">
			<div class="symbol">Sr</div>
			<div class="name">Strontium</div>
		  </div>
		  <div class="atomic-mass">87.62</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c3 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">39</div>
		  <div class="label">
			<div class="symbol">Y</div>
			<div class="name">Yttrium</div>
		  </div>
		  <div class="atomic-mass">88.906</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>9</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c4 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">40</div>
		  <div class="label">
			<div class="symbol">Zr</div>
			<div class="name">Zirconium</div>
		  </div>
		  <div class="atomic-mass">91.224</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>10</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c5 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">41</div>
		  <div class="label">
			<div class="symbol">Nb</div>
			<div class="name">Niobium</div>
		  </div>
		  <div class="atomic-mass">92.906</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>12</li>
			<li>1</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c6 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">42</div>
		  <div class="label">
			<div class="symbol">Mo</div>
			<div class="name">Molybdenum</div>
		  </div>
		  <div class="atomic-mass">95.95</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>13</li>
			<li>1</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c7 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">43</div>
		  <div class="label">
			<div class="symbol">Tc</div>
			<div class="name">Technetium</div>
		  </div>
		  <div class="atomic-mass">(98)</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>13</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c8 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">44</div>
		  <div class="label">
			<div class="symbol">Ru</div>
			<div class="name">Ruthenium</div>
		  </div>
		  <div class="atomic-mass">101.07</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>15</li>
			<li>1</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c9 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">45</div>
		  <div class="label">
			<div class="symbol">Rh</div>
			<div class="name">Rhodium</div>
		  </div>
		  <div class="atomic-mass">102.91</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>16</li>
			<li>1</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c10 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">46</div>
		  <div class="label">
			<div class="symbol">Pd</div>
			<div class="name">Palladium</div>
		  </div>
		  <div class="atomic-mass">106.42</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c11 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">47</div>
		  <div class="label">
			<div class="symbol">Ag</div>
			<div class="name">Silver</div>
		  </div>
		  <div class="atomic-mass">107.87</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
			<li>1</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c12 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">48</div>
		  <div class="label">
			<div class="symbol">Cd</div>
			<div class="name">Cadmium</div>
		  </div>
		  <div class="atomic-mass">112.41</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element post-transition-metal c13 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">49</div>
		  <div class="label">
			<div class="symbol">In</div>
			<div class="name">Indium</div>
		  </div>
		  <div class="atomic-mass">114.82</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
			<li>3</li>
		  </ul>
		</div>
	  </div>
	  <div class="element post-transition-metal c14 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">50</div>
		  <div class="label">
			<div class="symbol">Sn</div>
			<div class="name">Tin</div>
		  </div>
		  <div class="atomic-mass">204.38</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
			<li>4</li>
		  </ul>
		</div>
	  </div>
	  <div class="element metalloid c15 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">51</div>
		  <div class="label">
			<div class="symbol">Sb</div>
			<div class="name">Antimony</div>
		  </div>
		  <div class="atomic-mass">121.76</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
			<li>5</li>
		  </ul>
		</div>
	  </div>
	  <div class="element metalloid c16 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">52</div>
		  <div class="label">
			<div class="symbol">Te</div>
			<div class="name">Tellurium</div>
		  </div>
		  <div class="atomic-mass">127.6</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
			<li>6</li>
		  </ul>
		</div>
	  </div>
	  <div class="element other-nonmetal c17 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">53</div>
		  <div class="label">
			<div class="symbol">I</div>
			<div class="name">Iodine</div>
		  </div>
		  <div class="atomic-mass">126.9</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
			<li>7</li>
		  </ul>
		</div>
	  </div>
	  <div class="element noble-gas c18 r5">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">54</div>
		  <div class="label">
			<div class="symbol">Xe</div>
			<div class="name">Xenon</div>
		  </div>
		  <div class="atomic-mass">131.29</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
			<li>8</li>
		  </ul>
		</div>
	  </div>
	  <div class="element alkali-metal c1 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">55</div>
		  <div class="label">
			<div class="symbol">Cs</div>
			<div class="name">Caesium</div>
		  </div>
		  <div class="atomic-mass">132.91</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
			<li>8</li>
			<li>1</li>
		  </ul>
		</div>
	  </div>
	  <div class="element alkaline-earth-metal c2 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">56</div>
		  <div class="label">
			<div class="symbol">Ba</div>
			<div class="name">Barium</div>
		  </div>
		  <div class="atomic-mass">137.33</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c4 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">57</div>
		  <div class="label">
			<div class="symbol">La</div>
			<div class="name">Lanthanum</div>
		  </div>
		  <div class="atomic-mass">138.91</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>18</li>
			<li>9</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c5 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">58</div>
		  <div class="label">
			<div class="symbol">Ce</div>
			<div class="name">Cerium</div>
		  </div>
		  <div class="atomic-mass">140.12</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>19</li>
			<li>9</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c6 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">59</div>
		  <div class="label">
			<div class="symbol">Pr</div>
			<div class="name">Praseodymium</div>
		  </div>
		  <div class="atomic-mass">140.91</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>21</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c7 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">60</div>
		  <div class="label">
			<div class="symbol">Nd</div>
			<div class="name">Neodymium</div>
		  </div>
		  <div class="atomic-mass">144.24</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>22</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c8 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">61</div>
		  <div class="label">
			<div class="symbol">Pm</div>
			<div class="name">Promethium</div>
		  </div>
		  <div class="atomic-mass">144.24</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>23</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c9 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">62</div>
		  <div class="label">
			<div class="symbol">Sm</div>
			<div class="name">Samarium</div>
		  </div>
		  <div class="atomic-mass">150.36</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>24</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c10 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">63</div>
		  <div class="label">
			<div class="symbol">Eu</div>
			<div class="name">Europium</div>
		  </div>
		  <div class="atomic-mass">151.96</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>25</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c11 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">64</div>
		  <div class="label">
			<div class="symbol">Gd</div>
			<div class="name">Gadolinium</div>
		  </div>
		  <div class="atomic-mass">157.25</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>25</li>
			<li>9</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c12 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">65</div>
		  <div class="label">
			<div class="symbol">Tb</div>
			<div class="name">Terbium</div>
		  </div>
		  <div class="atomic-mass">158.93</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>27</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c13 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">66</div>
		  <div class="label">
			<div class="symbol">Dy</div>
			<div class="name">Dysprosium</div>
		  </div>
		  <div class="atomic-mass">162.5</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>28</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c14 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">67</div>
		  <div class="label">
			<div class="symbol">Ho</div>
			<div class="name">Holmium</div>
		  </div>
		  <div class="atomic-mass">164.93</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>29</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c15 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">68</div>
		  <div class="label">
			<div class="symbol">Er</div>
			<div class="name">Erbium</div>
		  </div>
		  <div class="atomic-mass">167.26</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>30</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c16 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">69</div>
		  <div class="label">
			<div class="symbol">Tm</div>
			<div class="name">Thulium</div>
		  </div>
		  <div class="atomic-mass">168.93</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>31</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c17 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">70</div>
		  <div class="label">
			<div class="symbol">Yb</div>
			<div class="name">Ytterbium</div>
		  </div>
		  <div class="atomic-mass">173.05</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element lanthanoid c18 r9">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">71</div>
		  <div class="label">
			<div class="symbol">Lu</div>
			<div class="name">Lutetium</div>
		  </div>
		  <div class="atomic-mass">174.97</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>9</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c4 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">72</div>
		  <div class="label">
			<div class="symbol">Hf</div>
			<div class="name">Hafnium</div>
		  </div>
		  <div class="atomic-mass">178.49</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>10</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element transition-metal c5 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">73</div>
		  <div class="label">
			<div class="symbol">Ta</div>
			<div class="name">Tantalum</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1783</b></li>
			<li><i class="discoveredby">Jose and Fausto Elhuyar(Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>3410°C</b></li>
			<li>Boiling Point: <b>5660°C</b></li>
		  </ul>
		  <div class="atomic-mass">180.948</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>11</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c6 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">74</div>
		  <div class="label">
			<div class="symbol">W</div>
			<div class="name">Tungsten</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1766</b></li>
			<li><i class="discoveredby">Henry Cavendish (England)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>161.79°C</b></li>
			<li>Boiling Point: <b>158.21°C</b></li>
		  </ul>
		  <div class="atomic-mass">183.84</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>12</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c7 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">75</div>
		  <div class="label">
			<div class="symbol">Re</div>
			<div class="name">Rhenium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1925</b></li>
			<li><i class="discoveredby">Walter and Ida Noddack (Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>3180°C</b></li>
			<li>Boiling Point: <b>5627°C</b></li>
		  </ul>
		  <div class="atomic-mass">186.207</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>13</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c8 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">76</div>
		  <div class="label">
			<div class="symbol">Os</div>
			<div class="name">Osmium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1803 </b></li>
			<li><i class="discoveredby">Smithson Tennant (London)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>3033°C</b></li>
			<li>Boiling Point: <b>5012°C</b></li>
		  </ul>
		  <div class="atomic-mass">190.23</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>14</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c9 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">77</div>
		  <div class="label">
			<div class="symbol">Ir</div>
			<div class="name">Iridium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1803 </b></li>
			<li><i class="discoveredby">Smithson Tennant (London)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>2410°C</b></li>
			<li>Boiling Point: <b>4130°C</b></li>
		  </ul>
		  <div class="atomic-mass">192.217</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>15</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c10 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">78</div>
		  <div class="label">
			<div class="symbol">Pt</div>
			<div class="name">Platinum</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1735</b></li>
			<li><i class="discoveredby">Julius Scaliger (South America)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1769°C</b></li>
			<li>Boiling Point: <b>3827°C</b></li>
		  </ul>
		  <div class="atomic-mass">195.084</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>17</li>
			<li>1</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c11 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">79</div>
		  <div class="label">
			<div class="symbol">Au</div>
			<div class="name">Gold</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1848</b></li>
			<li><i class="discoveredby">Known to the ancients (California )</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1064.3°C</b></li>
			<li>Boiling Point: <b>2808°C</b></li>
		  </ul>
		  <div class="atomic-mass">196.967</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>1</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c12 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">80</div>
		  <div class="label">
			<div class="symbol">Hg</div>
			<div class="name">Mercury</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>265</b></li>
			<li><i class="discoveredby">Known to the ancients</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>-38.87°C</b></li>
			<li>Boiling Point: <b>356.58</b></li>
		  </ul>
		  <div class="atomic-mass">200.592</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element post-transition-metal c13 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">81</div>
		  <div class="label">
			<div class="symbol">Tl</div>
			<div class="name">Thallium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1861</b></li>
			<li><i class="discoveredby">William Crookes (South Korea)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>303.5°C</b></li>
			<li>Boiling Point: <b>1457</b></li>
		  </ul>
		  <div class="atomic-mass">204.38</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>3</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element post-transition-metal c14 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">82</div>
		  <div class="label">
			<div class="symbol">Pb</div>
			<div class="name">Lead</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>3000</b></li>
			<li><i class="discoveredby">Known to the ancients(Turkey)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>327.5°C</b></li>
			<li>Boiling Point: <b>1740</b></li>
		  </ul>
		  <div class="atomic-mass">207.2</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>4</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element post-transition-metal c15 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">83</div>
		  <div class="label">
			<div class="symbol">Bi</div>
			<div class="name">Bismuth</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1753</b></li>
			<li><i class="discoveredby">Known to the ancients(Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>271.3°C</b></li>
			<li>Boiling Point: <b>1560°C</b></li>
		  </ul>
		  <div class="atomic-mass">208.98</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>5</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element post-transition-metal c16 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">84</div>
		  <div class="label">
			<div class="symbol">Po</div>
			<div class="name">Polonium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1753</b></li>
			<li><i class="discoveredby"">Marie and Pierre Curie(Czech Republic)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>254°C</b></li>
			<li>Boiling Point: <b>962°C</b></li>
		  </ul>
		  <div class="atomic-mass">209</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>6</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element metalloid c17 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">85</div>
		  <div class="label">
			<div class="symbol">At</div>
			<div class="name">Astatine</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1940</b></li>
			<li><i class="discoveredby">Corson, MacKenzie, and Segrè(California)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>302°C</b></li>
			<li>Boiling Point: <b>337°C</b></li>
		  </ul>
		  <div class="atomic-mass">210</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>7</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element noble-gas c18 r6">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">86</div>
		  <div class="label">
			<div class="symbol">Rn</div>
			<div class="name">Radon</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1900</b></li>
			<li><i class="discoveredby">Friedrich Ernst Dorn(Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>-71°C</b></li>
			<li>Boiling Point: <b>-61.8°C</b></li>
		  </ul>
		  <div class="atomic-mass">222</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>8</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element alkali-metal c1 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">87</div>
		  <div class="label">
			<div class="symbol">Fr</div>
			<div class="name">Francium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1939</b></li>
			<li><i class="discoveredby">Marguerite Perey(France)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>27°C</b></li>
			<li>Boiling Point: <b>677°C</b></li>
		  </ul>
		  <div class="atomic-mass">223</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>8</li>
			<li>1</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element alkaline-earth-metal c2 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">88</div>
		  <div class="label">
			<div class="symbol">Ra</div>
			<div class="name">Radium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1898</b></li>
			<li><i class="discoveredby">Pierre and Marie Curie(France)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>700°C</b></li>
			<li>Boiling Point: <b>1737°C</b></li>
		  </ul>
		  <div class="atomic-mass">226</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>8</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c4 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">89</div>
		  <div class="label">
			<div class="symbol">Ac</div>
			<div class="name">Actinium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1899</b></li>
			<li><i class="discoveredby">André-Louis Debierne(France)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1050°C</b></li>
			<li>Boiling Point: <b>3200°C</b></li>
		  </ul>
		  <div class="atomic-mass">227</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>9</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c5 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">90</div>
		  <div class="label">
			<div class="symbol">Th</div>
			<div class="name">Thorium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1828 </b></li>
			<li><i class="discoveredby">Jöns Jakob Berzelius (Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1750°C</b></li>
			<li>Boiling Point: <b>4790°C</b></li>
		  </ul>
		  <div class="atomic-mass">232.038</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>18</li>
			<li>10</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c6 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">91</div>
		  <div class="label">
			<div class="symbol">Pa</div>
			<div class="name">Protactinium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1917</b></li>
			<li><i class="discoveredby">Fajans and Göhring(France)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1600°C</b></li>
			<li>Boiling Point: <b>4000°C</b></li>
		  </ul>
		  <div class="atomic-mass">231.036</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>20</li>
			<li>9</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c7 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">92</div>
		  <div class="label">
			<div class="symbol">U</div>
			<div class="name">Uranium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1789</b></li>
			<li><i class="discoveredby">Martin Klaproth(Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1132°C</b></li>
			<li>Boiling Point: <b>3818°C</b></li>
		  </ul>
		  <div class="atomic-mass">238.029</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>21</li>
			<li>9</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c8 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">93</div>
		  <div class="label">
			<div class="symbol">Np</div>
			<div class="name">Neptunium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1940</b></li>
			<li><i class="discoveredby">McMillan and Abelson(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>640°C</b></li>
			<li>Boiling Point: <b>3902°C</b></li>
		  </ul>
		  <div class="atomic-mass">237</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>22</li>
			<li>9</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c9 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">94</div>
		  <div class="label">
			<div class="symbol">Pu</div>
			<div class="name">Plutonium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1940</b></li>
			<li><i class="discoveredby">McMillan and Abelson(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>639.5°C</b></li>
			<li>Boiling Point: <b>3235°C</b></li>
		  </ul>
		  <div class="atomic-mass">244</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>24</li>
			<li>8</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c10 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">95</div>
		  <div class="label">
			<div class="symbol">Am</div>
			<div class="name">Americium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1944</b></li>
			<li><i class="discoveredby">Seaborg, James and Morgan(US)</i></li>
			<li>---------------</li>
			<li>Melting Point: <b>994°C</b></li>
			<li>Boiling Point: <b>2607°C</b></li>
		  </ul>
		  <div class="atomic-mass">243</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>25</li>
			<li>8</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c11 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">96</div>
		  <div class="label">
			<div class="symbol">Cm</div>
			<div class="name">Curium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1944</b></li>
			<li><i class="discoveredby">Seaborg, James, and Ghiorso(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1340°C</b></li>
			<li>Boiling Point: <b>3110°C</b></li>
		  </ul>
		  <div class="atomic-mass">247</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>25</li>
			<li>9</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c12 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">97</div>
		  <div class="label">
			<div class="symbol">Bk</div>
			<div class="name">Berkelium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1949</b></li>
			<li><i class="discoveredby">Thompson, Seaborg, Street, and Ghirorso(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1050°C</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">247</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>27</li>
			<li>8</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c13 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">98</div>
		  <div class="label">
			<div class="symbol">Cf</div>
			<div class="name">Californium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1950</b></li>
			<li><i class="discoveredby">Thompson, Seaborg, Street, and Ghirorso(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>900°C</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">251</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>28</li>
			<li>8</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c14 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">99</div>
		  <div class="label">
			<div class="symbol">Es</div>
			<div class="name">Einsteinium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1952</b></li>
			<li><i class="discoveredby">Albert Ghiorso(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>860°C</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">252</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>29</li>
			<li>8</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c15 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">100</div>
		  <div class="label">
			<div class="symbol">Fm</div>
			<div class="name">Fermium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1953</b></li>
			<li><i class="discoveredby">Albert Ghiorso(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1527°C</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">257</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>30</li>
			<li>8</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c16 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">101</div>
		  <div class="label">
			<div class="symbol">Md</div>
			<div class="name">Mendelevium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1955</b></li>
			<li><i class="discoveredby">Thompson, Seaborg, Choppin, and Harvey(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>827°C</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">258</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<lis>0</li>
		  </ul>
<!-- Element year end -->

		  <div class="atomic-mass">(258)</div>
		  <ul class="atomic-weight">
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>31</li>
			<li>8</li>
			<li>2</li>
		  </ul>
		</div>
	  </div>
	  <div class="element actinoid c17 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">102</div>
		  <div class="label">
			<div class="symbol">No</div>
			<div class="name">Nobelium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1957</b></li>
			<li><i class="discoveredby">Salfred Nobel(Sweden)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>827
°C</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">259</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>8</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element actinoid c18 r10">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">103</div>
		  <div class="label">
			<div class="symbol">Lr</div>
			<div class="name">Lawrencium</div>
		  </div>
		  <ul class="year">
			<li><b>1961</b></li>
			<li><i class="discoveredby">Lawrence Berkelely Laboratory(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>1627°C</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">262</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>8</li>
			<li>3</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c4 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">104</div>
		  <div class="label">
			<div class="symbol">Rf</div>
			<div class="name">Rutherfordium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1969</b></li>
			<li><i class="discoveredby">Geogry Flerov(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">267</div>
		  <ul class="atomic-weight">	
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>10</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c5 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">105</div>
		  <div class="label">
			<div class="symbol">Db</div>
			<div class="name">Dubnium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1970</b></li>
			<li><i class="discoveredby">Geogry Flerov(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">270</div>
		  <ul class="atomic-weight">
			<lis>Solid</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>11</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c6 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">106</div>
		  <div class="label">
			<div class="symbol">Sg</div>
			<div class="name">Seaborgium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1974</b></li>
			<li><i class="discoveredby">Albert Ghiorso(US)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">269</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>12</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c7 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">107</div>
		  <div class="label">
			<div class="symbol">Bh</div>
			<div class="name">Bohrium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b> 1976</b></li>
			<li><i class="discoveredby">Yuri Oganessian(Dubna, Russia)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">270</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>13</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c8 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">108</div>
		  <div class="label">
			<div class="symbol">Hs</div>
			<div class="name">Hassium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1978</b></li>
			<li><i class="discoveredby">Heavy Ion Research (Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">270</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>14</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element unknown c9 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">109</div>
		  <div class="label">
			<div class="symbol">Mt</div>
			<div class="name">Meitnerium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1982</b></li>
			<li><i class="discoveredby">Heavy Ion Research (Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">278</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>15</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element unknown c10 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">110</div>
		  <div class="label">
			<div class="symbol">Ds</div>
			<div class="name">Darmstadtium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1994</b></li>
			<li><i class="discoveredby">Heavy Ion Research (Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">281</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>17</li>
			<li>1</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element unknown c11 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">111</div>
		  <div class="label">
			<div class="symbol">Rg</div>
			<div class="name">Roentgenium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1994</b></li>
			<li><i class="discoveredby">Heavy Ion Research (Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">281</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>17</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element transition-metal c12 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">112</div>
		  <div class="label">
			<div class="symbol">Cn</div>
			<div class="name">Copernicium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1996</b></li>
			<li><i class="discoveredby">Heavy Ion Research (Germany)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">285</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>18</li>
			<li>2</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element unknown c13 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">113</div>
		  <div class="label">
			<div class="symbol">Nh</div>
			<div class="name">Nihonium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>2003</b></li>
			<li><i class="discoveredby">Kosuke Morita (Japan)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">286</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>18</li>
			<li>3</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element post-transition-metal c14 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">114</div>
		  <div class="label">
			<div class="symbol">Fl</div>
			<div class="name">Flerovium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>1998</b></li>
			<li><i class="discoveredby">JINR (Russia)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">289</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>18</li>
			<li>4</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element unknown c15 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">115</div>
		  <div class="label">
			<div class="symbol">Mc</div>
			<div class="name">Moscovium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>2003</b></li>
			<li><i class="discoveredby">JINR (Russia)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">289</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>18</li>
			<li>5</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element unknown c16 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">116</div>
		  <div class="label">
			<div class="symbol">Lv</div>
			<div class="name">Livermorium</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>2000</b></li>
			<li><i class="discoveredby">JINR (Russia)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">293</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>18</li>
			<li>6</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element unknown c17 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">117</div>
		  <div class="label">
			<div class="symbol">Ts</div>
			<div class="name">Tennessine</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>2009</b></li>
			<li><i class="discoveredby">JINR (Russia)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">293</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>18</li>
			<li>7</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="element unknown c18 r7">
		<input class="activate" type="radio" name="elements"/>
		<input class="deactivate" type="radio" name="elements"/>
		<div class="overlay"></div>
		<div class="square">
		  <div class="model">
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
			<div class="orbital">
			  <div class="electron"></div>
			  <div class="electron"></div>
			</div>
		  </div>
		  <div class="atomic-number">118</div>
		  <div class="label">
			<div class="symbol">Og</div>
			<div class="name">Oganesson</div>
		  </div>
		  <!-- Element year start -->
		  <ul class="year">
			<li><b>2002</b></li>
			<li><i class="discoveredby">JINR (Russia)</i></li>
			<li>--------------</li>
			<li>Melting Point: <b>Unknown</b></li>
			<li>Boiling Point: <b>Unknown</b></li>
		  </ul>
		  <div class="atomic-mass">294</div>
		  <ul class="atomic-weight">
			<lis>Unknown</li>
			<li>2</li>
			<li>8</li>
			<li>18</li>
			<li>32</li>
			<li>32</li>
			<li>18</li>
			<li>8</li>
		  </ul>
<!-- Element year end -->
		</div>
	  </div>
	  <div class="placeholder lanthanoid c3 r6">
		<div class="square" style="font-size: 1vw;">57-71</div>
	  </div>
	  <div class="placeholder actinoid c3 r7">
		<div class="square" style="font-size: 1vw;">89-103</div>
	  </div>
	  <div class="gap c3 r8"></div>
	  <div class="key" id="group-buttons">
		<div class="row">
		<button class="button" for="alkali-metals" style="background-color: #d6a336; border-color: #b5841a;"><label class="alkali-metal" for="alkali-metals"  style="font-size: .9vw; color: aliceblue;">Alkali Metals</label></button>
		<button class="button" for="alkaline-earth-metals" style="background-color: #d6df50; border-color: #bbc807;"><label class="alkaline-earth-metal" for="alkaline-earth-metals" style="font-size: .9vw; color: aliceblue;">Alkaline Earth Metals</label></button>
		<button class="button" for="lanthanoids" style="background-color: #d26d94; border-color: #9e5b75;"><label class="lanthanoid" for="lanthanoids" style="font-size: .9vw; color: aliceblue;">Lanthanoids</label></button>
		<button class="button" for="actinoids" style="background-color: #a36fa7; border-color: #8c648f;"><label class="actinoid" for="actinoids" style="font-size: .9vw; color: aliceblue;">Aktinoids</label></button>
		<button class="button" for="transition-metals" style="background-color: #fe5e45; border-color: #db4f3a;"><label class="transition-metal" for="transition-metals" style="font-size: .9vw; color: aliceblue;">Transition Metals</label></button>
		<button class="button" for="post-transition-metals" style="background-color: #2fcae2; border-color: #10a8c0;"><label class="post-transition-metal" for="post-transition-metals" style="font-size: .9vw; color: aliceblue;">Post-Transition Metals</label></button>
		<button class="button" for="metalloids" style="background-color: #29ad83; border-color: #17986f;"><label class="metalloid" for="metalloids" style="font-size: .9vw; color: aliceblue;">Metalloids</label></button>
		<button class="button" for="other-nonmetals" style="background-color: #22e135; border-color: #0eb11e;"><label class="other-nonmetal" for="other-nonmetals" style="font-size: .9vw; color: aliceblue;">Other Nonmetals</label></button>
		<button class="button" for="noble-gasses" style="background-color: #6288e0; border-color: #3d66c4;"><label class="noble-gas" for="noble-gasses" style="font-size: .9vw; color: aliceblue;">Noble Gasses</label></button>
		<button class="button" for="unknown" style="background-color: #a1a1a1; border-color: #807e7e;"><label class="unknown" for="unknown" style="font-size: .9vw; color: aliceblue;">Unknown</label></button>
		</div>

	  </div>
	</div>
</body>
</html>

