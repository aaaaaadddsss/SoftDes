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
        <div class="logo">
            <a href="#">
                <img src="../Components/Images/LogoWhite.png" alt="logo" class="logo" />
            </a>
        </div>
        <div class="links">
            <a href="adminDashboard.php"> <button class="btn">Go Back </button></a>
            <a href="adminLogin.php"> <button class="btn">Log Out</button></a>
        </div>
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