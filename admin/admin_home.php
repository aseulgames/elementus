<?php
session_start();
    $con = mysqli_connect("localhost", "root", "", "elementus_log") or die("Can't connect");

    if (!isset($_SESSION['admin_username'])) {
        header("Location: admin_login.php");
        exit();
    }

    $teachersResult = mysqli_query($con, "SELECT * FROM teachers");
    $teachers = mysqli_fetch_all($teachersResult, MYSQLI_ASSOC);

    // Fetch students
    $studentsResult = mysqli_query($con, "SELECT * FROM students");
    $students = mysqli_fetch_all($studentsResult, MYSQLI_ASSOC);

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
    <title>Admin Module</title>
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
        <section class="admin-section">
            <h1>Admin Module - User Management</h1>

            <!-- Teachers Table -->
            <div class="user-table">
                <h2>Teachers</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($teachers as $teacher): ?>
                            <tr>
                                <td><?= $teacher['Username']; ?></td>
                                <td><?= $teacher['Email']; ?></td>
                                <td>
                                    <button class="view-btn" onclick="viewUser('teacher', <?= $teacher['Id']; ?>)">View</button>
                                    <button class="delete-btn" onclick="deleteUser('teacher', <?= $teacher['Id']; ?>)">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Students Table -->
            <div class="user-table">
                <h2>Students</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?= $student['Username']; ?></td>
                                <td><?= $student['Email']; ?></td>
                                <td>
                                    <button class="view-btn" onclick="viewUser('student', <?= $student['Id']; ?>)">View</button>
                                    <button class="delete-btn" onclick="deleteUser('student', <?= $student['Id']; ?>)">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- Logout Button -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="logout.php" style="text-decoration: none;">
            <button class="logout-btn">Logout</button>
        </a>
    </div>

    <script>
    function viewUser(userType, userId) {
        // Redirect to the view_user.php page with user details
        window.location.href = 'view_user.php?userType=' + encodeURIComponent(userType) + '&userId=' + encodeURIComponent(userId);
    }

    function deleteUser(userType, userId) {
    var confirmDelete = confirm("Are you sure you want to delete this user?");
    if (confirmDelete) {
        // Use AJAX to delete user from the database
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_user.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var response = xhr.responseText;
                    if (response.trim() === 'success') {
                        alert('User deleted successfully');
                        // Remove the deleted row from the table
                        var row = document.getElementById(userType + '-row-' + userId);
                        row.parentNode.removeChild(row);
                    } else {
                        alert('Failed to delete user');
                    }
                } else {
                    alert('Error: ' + xhr.status);
                }
            }
        };

        // Send the data to delete_user.php
        xhr.send('userType=' + encodeURIComponent(userType) + '&userId=' + encodeURIComponent(userId));
    }
}

</script>


</body>

</html>
