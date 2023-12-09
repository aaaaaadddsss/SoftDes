<?php
session_start();

include("../config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: ../index.html");
}

if (isset($_GET['id'])) {
    $memberId = $_GET['id'];

    $sql = "SELECT * from members WHERE Id = $memberId";
    if ($result = mysqli_query($con, $sql)) {
        $row = mysqli_fetch_assoc($result);
    } else {
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="adminUpdateMemberStyle.css" />
    <title>Register</title>
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
    <div class="container">
        <div class="box form-box">
            <header>UPDATE A MEMBER</header>
            <form action="updateMemberProcess.php" method="post">
                <input type="hidden" name="memberId" value="<?php echo $row['Id']; ?>">
                <div class="field input">
                    <label for="name"> Full Name </label>
                    <input type="text" name="fullName" value="<?php echo $row['FullName']; ?>">
                </div>

                <div class="field input">
                    <label for="name"> Email </label>
                    <input type="text" name="email" value="<?php echo $row['Email']; ?>">
                </div>

                <div class="field input">
                    <label for="name"> Contact Number </label>
                    <input type="text" name="CNumber" value="<?php echo $row['ContactNumber']; ?>">
                </div>

                <div class="field input">
                    <label for="name"> Starting Date </label>
                    <input type="date" name="StDate" value="<?php echo $row['StartingDate']; ?>">
                </div>

                <div class="field input">
                    <label for="name"> Ending Date </label>
                    <input type="date" name="EdDate" value="<?php echo $row['EndingDate']; ?>">
                </div>
                <button type="submit" class="btn">Update Member</button>
            </form>
        </div>
    </div>
</body>

</html>