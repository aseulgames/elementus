<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "elementus_log") or die("Can't connect");

if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}

// Get user type and ID from the URL parameters
$userType = $_GET['userType'];
$userId = $_GET['userId'];

// Fetch user details based on type
if ($userType == 'teacher') {
    $userQuery = "SELECT * FROM teachers WHERE Id = $userId";
} elseif ($userType == 'student') {
    $userQuery = "SELECT * FROM students WHERE Id = $userId";
}

$userResult = mysqli_query($con, $userQuery);
$userDetails = mysqli_fetch_assoc($userResult);

// Fetch admin information
$adminUsername = $_SESSION['admin_username'];
$adminQuery = "SELECT FirstName, LastName FROM admins WHERE Username = '$adminUsername'";
$adminResult = mysqli_query($con, $adminQuery);
$adminData = mysqli_fetch_assoc($adminResult);

// Extract first name and last name
$adminFirstName = $adminData['FirstName'];
$adminLastName = $adminData['LastName'];
$adminName = $adminFirstName . ' ' . $adminLastName;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_home.css">
    <title>User Details</title>
</head>

<body>
    <header>
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
            <div class="logo-row" style="text-align: center;">
                <img src="logo.png" alt="logopng" class="logopng" style="max-width: 30%; height: auto;">
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="#">Admin: <?php echo $adminName ?></a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="user-details-section">
            <h1>User Details</h1>

            <!-- Display user details in a table -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $userDetails['Id']; ?></td>
                        <td><?php echo $userDetails['Username']; ?></td>
                        <td><?php echo $userDetails['Email']; ?></td>
                        <td><?php echo $userDetails['FirstName']; ?></td>
                        <td><?php echo $userDetails['LastName']; ?></td>
                    </tr>
                </tbody>
            </table>
            <table>
                <!-- Inside the <tbody> of the second table in your view_user.php -->
                <!-- Inside the <tbody> of the second table in your view_user.php -->
<tbody>
<?php if ($userType == 'teacher'): ?>
    <?php
    // Fetch rooms associated with the teacher
    $roomsQuery = "SELECT * FROM rooms WHERE TeacherId = $userId";
    $roomsResult = mysqli_query($con, $roomsQuery);

    while ($room = mysqli_fetch_assoc($roomsResult)) {
        // Fetch students associated with each room
        $roomId = $room['RoomID'];
        $studentsQuery = "SELECT * FROM studentgameprogress WHERE RoomId = $roomId";
        $studentsResult = mysqli_query($con, $studentsQuery);
    ?>
        <h1>Rooms</h1>
        <table>
            <tr>
                <td colspan="3">Room Code: <?php echo $room['RoomCode']; ?> - Room Name: <?php echo $room['RoomName']; ?></td>
            </tr>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Game Name</th>
                <th>Stars Earned</th>
            </tr>
            <?php while ($student = mysqli_fetch_assoc($studentsResult)) : ?>
                <tr>
                    <td><?php echo $student['StudentID']; ?></td>
                    <!-- Assuming StudentId is the foreign key linking to the students table -->
                    <td><?php echo $student['StudentName']; ?></td>
                    <td><?php echo $student['GameName']; ?></td>
                    <td><?php echo $student['StarsEarned']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php } ?>

        <?php elseif ($userType == 'student'): ?>
    <?php
    // Fetch rooms associated with the student
    $roomsQuery = "SELECT DISTINCT r.* FROM rooms r
                   JOIN studentgameprogress sgp ON r.RoomID = sgp.RoomId
                   WHERE sgp.StudentId = $userId";
    $roomsResult = mysqli_query($con, $roomsQuery);
    ?>
    <h1>Rooms</h1>
    <table>
        <tr>
            <th>Room Code</th>
            <th>Room Name</th>
            <!-- Add more columns as needed -->
        </tr>
        <?php while ($room = mysqli_fetch_assoc($roomsResult)) : ?>
            <tr>
                <td><?php echo $room['RoomCode']; ?></td>
                <td><?php echo $room['RoomName']; ?></td>
                <!-- Add more cells as needed -->
            </tr>
        <?php endwhile; ?>
    </table>

    <?php
    // Fetch game progress for the student
    $gameProgressQuery = "SELECT * FROM game_progress WHERE user_id = $userId";
    $gameProgressResult = mysqli_query($con, $gameProgressQuery);
    ?>
    <h1>Games</h1>
    <table>
        <tr>
            <th>Game ID</th>
            <th>Game Name</th>
            <th>Score</th>
            <!-- Add more columns as needed -->
        </tr>
        <?php while ($gameProgress = mysqli_fetch_assoc($gameProgressResult)) : ?>
            <?php
            // Fetch game name based on game ID
            $gameId = $gameProgress['game_id'];
            $gameNameQuery = "SELECT * FROM games WHERE game_id = $gameId";
            $gameNameResult = mysqli_query($con, $gameNameQuery);
            $gameName = mysqli_fetch_assoc($gameNameResult)['game_name'];
            ?>
            <tr>
                <td><?php echo $gameProgress['game_id']; ?></td>
                <td><?php echo $gameName; ?></td>
                <td><?php echo $gameProgress['stars_earned']; ?></td>
                <!-- Add more cells as needed -->
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>



            </table>
        </section><br>
        <a href='javascript:self.history.back()'><button class='btn'>Back</button>
    </main>
</body>

</html>
