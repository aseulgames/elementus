<?php
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lessons.css">
    <script src="homescript.js"></script>
    <title>Home</title>
</head>
<body>
    
    <div class="nav" style="padding=2%">
        <div class="logo"><a href="homestudent.php" >
        <img src="logo_light.png" alt="logopng" class="logopng" style="max-width: 33%; padding-top:0px;
            max-height: 100% ; margin: 0; ">
            </a>
        </div>
        <ul class="menu">
            <li><a class="#" href="homestudent.php">Home</a></li>
            <li><a class="#" href="#">About</a></li>
            <li><a class="#" href="#">Games</a></li>
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
    
    </header>
    <main>
        <h1><strong>Elements, Compounds, and Mixtures</strong></h1>
        <p>&nbsp;</p>
        <h2><strong>Elements</strong></h2>
        <p>An element is pure substance made up of atoms with the same atomic number, which denotes that their nuclei have the same amount of protons. The chemical symbol for each element is different, for as "H" for hydrogen, "O" for oxygen, or "Fe" for iron.</p>
        <p><strong>Characteristics:</strong></p>
        <p>- Chemical reactions cannot degrade elements into less complex ones.</p>
        <p>They are the simplest form of matter and the building blocks of all other forms.</p>
        <p>- The periodic table classifies elements according to their chemical makeup and atomic number.</p>
        <p>&nbsp;</p>
        <h2><strong>Compounds</strong></h2>
        <p>When two or more distinct elements combine chemically in predetermined ratios, a compound is created. Compounds have unique properties different from the elements that compose them.&nbsp; Compounds are represented by chemical formulas, which show the types and ratios of atoms present. For instance, "H2O" stands for water, a substance made up of two hydrogen atoms and one oxygen atom.</p>
        <p><strong>Characteristics:</strong></p>
        <p>- Compounds have unique physical and chemical characteristics that set them apart from the characteristics of the elements that make them up.</p>
        <p>- Chemical bonds, either covalent or ionic, hold the components of a compound together.</p>
        <p>- Chemical processes can break down compounds into their component parts.</p>
        <p>&nbsp;</p>
        <h2><strong>Mixtures</strong></h2>
        <p>A mixture is a combination of two or more elements or compounds that have been physically combined but are not chemically bound. Both homogeneous and heterogeneous mixtures exist. Mixtures do not have a specific chemical formula but are described based on the components present and their proportions.</p>
        <p>Characteristics:</p>
        <p>- Mixtures maintain the unique characteristics of their constituent parts.</p>
        <p>- They can be physically separated into their constituent parts by the use of techniques like chromatography, distillation, or filtration.&nbsp;&nbsp;</p>
        <p>&nbsp;- Examples of mixtures include:</p>
        <p>Air (a mixture of gases)</p>
        <p>Salad (a mixture of vegetables)</p>
        <p>Saltwater (a mixture of salt and water)</p>
        <p>Muddy Water (a mixture of dirt and water)</p>
        <p>&nbsp;</p>
        <p><strong>Key Points:</strong></p>
        <p>- Elements are the simplest forms of matter, composed of one type of atom.</p>
        <p>- Compounds result from the chemical combination of different elements in fixed ratios.</p>
        <p>- Mixtures are physical combinations of substances with no fixed chemical composition.</p>
    </main>

    <div class="button-row">
        <button type="button" class="btn" onclick="window.history.back()" name="back" value="back" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color:#fff;">Back</button>
        <a href=""><button id="next" class="btn" name="next" value="next" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color:#fff;">Next</button></a>
    </div>
    <script src="homescript.js"></script>
</body>
</html>