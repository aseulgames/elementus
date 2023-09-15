<?php
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
    }

    $user_id = $_SESSION['id'];

    // Get the lesson ID for the current lesson (you need to know the lesson ID)
    $lesson_id = 1; // Replace with the actual lesson ID for this lesson

    // Get the user's ID from the session
    $user_id = $_SESSION['id'];

    // Update the student_lesson_progress table to mark the lesson as completed
    // You can use an UPDATE query if the record already exists or an INSERT query if it doesn't
    $query = mysqli_query($con, "INSERT INTO student_lesson_progress (Id, lesson_id, completed) VALUES ($user_id, $lesson_id, 1) ON DUPLICATE KEY UPDATE completed = 1");
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
    <h1><strong>Periodic Table Origins</strong></h1>
        <p>The periodic table is a fundamental tool in chemistry, organizing the chemical elements based on their properties and atomic structures. Its creation and evolution&nbsp;were aided by the groundbreaking research of numerous scientists, who left their stamp on its history. We'll look at the major players and their outstanding contributions to the creation of the periodic table in this section.</p>
        <h2><strong>Early Attempts at Element Organization </strong></h2>
        <p><strong>Antoine Lavoisier (1789): </strong></p>
        <p>The publication of Lavoisier's seminal book, "Trait&eacute; &Eacute;l&eacute;mentaire de Chimie" (Elementary Treatise of Chemistry), which established the law of conservation of mass and created the groundwork for systematic chemical nomenclature, occurs this year.</p>
        <p>As the "Father of Modern Chemistry," Antoine Lavoisier made ground-breaking discoveries. He also developed systematic chemical nomenclature, which laid the groundwork for consistent element naming, making it simpler to name and accurately describe chemical compounds. His work included the formulation of the law of conservation of mass, which stated that matter cannot be created or destroyed in a chemical reaction.</p>
        <p><img src="https://upload.wikimedia.org/wikipedia/commons/8/85/David_-_Portrait_of_Monsieur_Lavoisier_%28cropped%29.jpg" alt="Antoine Lavoisier" width="400" height="462" /></p>
        <p><em>Antoine Lavoisier (Wikipedia)</em></p>
        <p><strong>John Dalton (1803):</strong></p>
        <p>The atomic theory was first presented in John Dalton's "New System of Chemical Philosophy," which was published in this year.</p>
        <p>According to the atomic theory, all elements were made up of indivisible atoms. Although he did not directly contribute to the arrangement of the periodic table, his atomic theory was a fundamental step in comprehending the elements.</p>
        <p><em><img src="https://upload.wikimedia.org/wikipedia/commons/0/00/John_Dalton_by_Thomas_Phillips%2C_1835.jpg" alt="Dalton by Thomas Philips in 1835 (Wikipedia)" width="400" height="514" /></em></p>
        <p><em>Dalton by Thomas Phillips in 1835 (Wikipedia)</em></p>
        <h2><strong>The Emergence of Periodicity</strong></h2>
        <p><strong>Johann Wolfgang D&ouml;bereiner (1817):</strong></p>
        <p>Johann Wolfgang D&ouml;bereiner, a German scientist, is most known for his idea of "triads." In 1817, he noticed that some elements shared similar chemical properties and could be grouped into triads where the atomic mass of the middle element was about the average of the other two. He observed a triangular arrangement of chlorine, bromine, and iodine, for instance, in which the atomic mass of bromine was equal to the average of chlorine and iodine. The concept of periodicity in an element's qualities was developed by D&ouml;bereiner. This notion suggested periodicity in element properties, however it was not the periodic table itself.</p>
        <p><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Johann_Wolfgang_D%C3%B6bereiner.jpg/640px-Johann_Wolfgang_D%C3%B6bereiner.jpg" alt="" width="400" height="436" /></p>
        <p><em>D&ouml;bereiner (Wikipedia)</em></p>
        <p><strong>Alexandre-&Eacute;mile B&eacute;guyer de Chancourtois (1862):</strong></p>
        <p>The "telluric helix," a three-dimensional diagram that ordered elements in ascending atomic weight order along a spiral in 1862, was invented by Chancourtois. It is an early attempt to visualize the periodicity of elements; Chancourtois was the first scientist to recognize the periodicity of elements when they were organized in order of their atomic weights. Elements with similar properties lined up vertically on the helix, foreshadowing the periodic table's arrangement.</p>
        <p><img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Alexandre-Emile_B%C3%A9guyer_de_Chancourtois.jpg" alt="Alexandre-&Eacute;mile B&eacute;guyer de Chancourtois - Wikipedia" /><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Telluric_screw_of_De_Chancourtois.gif/220px-Telluric_screw_of_De_Chancourtois.gif" alt="Alexandre-&Eacute;mile B&eacute;guyer de Chancourtois - Wikipedia" width="200" height="352" /></p>
        <p><em>Alexandre-Emile B&eacute;guyer de Chancourtois and his original organization of the elements (Wikipedia)</em></p>
        <h2><strong>The Periodic Table Takes Shape</strong></h2>
        <p><strong>Dmitri Mendeleev (1869):</strong></p>
        <p>Russian chemist Dmitri Mendeleev has been credited with creating the first widely recognized periodic table. He put the elements in ascending atomic weight order and observed that atoms with similar characteristics appeared periodically. Mendeleev left gaps in his table for elements that were yet to be discovered and correctly predicted the properties of these missing elements, earning him great acclaim. This prediction of undiscovered elements and their properties is one of the most remarkable aspects of Mendeleev's work that also laid the foundation for the modern one we use today.</p>
        <p><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/%EB%93%9C%EB%AF%B8%ED%8A%B8%EB%A6%AC_%EB%A9%98%EB%8D%B8%EB%A0%88%EC%98%88%ED%94%84.jpg/1200px-%EB%93%9C%EB%AF%B8%ED%8A%B8%EB%A6%AC_%EB%A9%98%EB%8D%B8%EB%A0%88%EC%98%88%ED%94%84.jpg" alt="" width="400" height="551" /></p>
        <p><em>Dmitri Mendeleev before 1907 (Wikipedia)</em></p>
        <p><em><img src="https://upload.wikimedia.org/wikipedia/commons/e/e5/1869-periodic-table.jpg" alt="" width="400" height="492" /></em></p>
        <p><em>The 1869 periodic table by Mendeleev in Russian (</em><em>WIKIMEDIA)</em></p>
        <p><em>Text translation: "An experiment on a system of elements ... based on their atomic weights and chemical similarities."</em></p>
        <p><em><img src="https://upload.wikimedia.org/wikipedia/commons/3/35/Mendeleev%27s_1871_periodic_table.jpg" alt="File:Mendeleev's 1871 periodic table.jpg - Wikipedia" /></em></p>
        <p><em>Mendeleev's 1871 periodic table (Wikipedia)</em></p>
        <p><strong>Henry Moseley (1913):</strong></p>
        <p>English physicist Moseley discovered that atomic number, or the number of protons in an atom's nucleus, rather than atomic mass, is the key to organizing elements. He rearranged the periodic table based on atomic numbers, resulting in the modern periodic table, where elements are ordered by increasing atomic number. This new arrangement is the basis for the modern periodic table.</p>
        <p><img src="https://upload.wikimedia.org/wikipedia/commons/c/c8/Henry_Moseley_%281887-1915%29.jpg" alt="Henry Moseley - Wikipedia" width="463" height="356" /></p>
        <p><em>Moseley in 1914 (Wikipedia)</em></p>
        <p><em><img src="https://s3.amazonaws.com/s3.timetoast.com/public/uploads/photo/7493360/image/302fcd751e2b33a070f5fda03fa3f75c" alt="" width="640" height="195" /></em></p>
        <p><em>Henry Moseley's periodic table of elements</em></p>
        <p>Each scientist contributed to the construction of the periodic table by expanding on the work of their predecessors. The periodic table has developed into a vital resource for comprehending the characteristics and behavior of the elements, beginning with Lavoisier's foundational chemical principles and evolving with Mendeleev's ground-breaking arrangement and Moseley's atomic number-based arrangement. It stands as a testament to the scientific curiosity and innovation of these remarkable individuals.</p>
    </main>

    <div class="button-row">
        <button type="button" class="btn" onclick="window.history.back()" name="back" value="back" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color:#fff;">Back</button>
        <a href="namessymbols.php"><button id="next" class="btn" name="next" value="next" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color:#fff;">Next</button></a>
    </div>
    <script src="homescript.js"></script>
</body>
</html>