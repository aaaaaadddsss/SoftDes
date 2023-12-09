<?php
session_start();

include("../config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: ../index.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="adminListMembers.css" />
    <title>Admin Dashboard - Member List</title>
</head>

<body>
    <div class="navbar">
        <a href="#home">
            <img src="../Components/Images/LogoWhite.png" alt="logo" class="logo" />
        </a>
        <ul>
            <li><a href="adminDashboard.php">Go Back</a></li>
            <li><a href="adminLogin.php">Log Out</a></li>
        </ul>
    </div>
    <main>
        <div class="main-box member-list">
            <h2>Member List</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Contact Number</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                    <th>Password</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                <?php
                $sql = "SELECT * from members";
                if ($result = mysqli_query($con, $sql)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Id'] . "</td>";
                        echo "<td>" . $row['FullName'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['Age'] . "</td>";
                        echo "<td>" . $row['ContactNumber'] . "</td>";
                        echo "<td>" . $row['StartingDate'] . "</td>";
                        echo "<td>" . $row['EndingDate'] . "</td>";
                        echo "<td>" . $row['Password'] . "</td>";
                        echo "<td><a href='adminDeleteMember.php?id=" . $row['Id'] . "'>Delete</a></td>";
                        echo "<td><a href='adminUpdateMember.php?id=" . $row['Id'] . "'>Update</a></td>";
                        echo "</tr>";
                    }
                    mysqli_free_result($result);
                }
                ?>
            </table>
        </div>
    </main>
</body>

</html>