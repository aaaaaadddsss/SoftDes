<?php
session_start();

include("../config.php");
if (!isset($_SESSION['valid'])) {
  header("Location: ../index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
=======
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./memberDashboardStyle.css" />
    <title>Member Dashboard</title>
  </head>
  <body>
    <div class="navbar">
      <div class="logo">
        <a href="../index.html">
          <img
            src="../Components/Images/LogoWhite.png"
            alt="logo"
            class="logo"
          />
        </a>
      </div>
      <div class="links">
        <?php
        $id = $_SESSION['id'];
        $query = mysqli_query($con,"SELECT * FROM members WHERE Id=$id");
>>>>>>> 0d067c72b7e7f71be186b5c1d5edf51f9bda1480

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./memberDashboardStyle.css" />
  <title>Member Dashboard</title>
</head>

<body>
  <div class="navbar">
    <a href="#home">
      <img src="../Components/Images/LogoWhite.png" alt="logo" class="logo" />
    </a>
    <ul>
      <li><a href="memberLogin.php">Log Out</a></li>
    </ul>
  </div>
  <div class="links">
    <?php
    $id = $_SESSION['id'];
    $query = mysqli_query($con, "SELECT * FROM members WHERE Id=$id");

    while ($result = mysqli_fetch_assoc($query)) {
      $res_FName = $result['FullName'];
      $res_Email = $result['Email'];
      $res_CNumber = $result['ContactNumber'];
      $res_StDate = $result['StartingDate'];
      $res_EdDate = $result['EndingDate'];
      $res_Age = $result['Age'];
      $res_id = $result['Id'];
    }
    ?>
  </div>
  </div>
  <main>
    <div class="main-box top">
      <div class="top">
        <div class="box">
          <p>Hello <b><?php echo $res_FName ?></b>, Welcome</p>
        </div>

        <div class="box">
          <p>Your email is <b><?php echo $res_Email ?></b>.</p>
        </div>

        <div class="box">
          <p>You're contact number is <b>+63 <?php echo $res_CNumber ?></b>.</p>
        </div>

        <div class="box">
          <p>Your starting date is <b><?php echo $res_StDate ?></b>.</p>
        </div>

        <div class="box">
          <p>The membership expiration date is <b><?php echo $res_EdDate ?></b>.</p>
        </div>

      </div>
    </div>
  </main>
</body>

</html>