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
  <link rel="stylesheet" href="adminDashboardStyle.css" />
  <title>Admin Dashboard</title>
</head>

<body>
  <div class="navbar">
    <div class="logo">
      <a href="#">
        <img src="../Components/Images/LogoWhite.png" alt="logo" class="logo" />
      </a>
    </div>
    <div class="links">
      <?php
      $id = $_SESSION['id'];
      $query = mysqli_query($con, "SELECT * FROM members WHERE Id=$id");
      // Getting the data in the database
      while ($result = mysqli_fetch_assoc($query)) {
        $res_FName = $result['FullName'];
        $res_Email = $result['Email'];
        $res_CNumber = $result['ContactNumber'];
        $res_Age = $result['Age'];
        $res_id = $result['Id'];
      }
      // Showing the numebr of members in the gym
      $sql = "SELECT * from members";

      if ($result = mysqli_query($con, $sql)) {

        $rowcount = mysqli_num_rows($result);
      }
      ?>
      <a href="adminLogin.php"> <button class="btn">Log Out</button></a>
    </div>
  </div>
  <main>
    <div class="main-box top">
      <div class="top">
        <div class="box">
          <p>Hello <b><?php echo $res_FName ?></b>, Welcome to Admin Dashboard</p>
        </div>

        <div class="box">
          <p>The number of members in the gym are <b><?php echo $rowcount ?></b></p>
        </div>

        <div class="buttonContainer">
          <a href="adminRegister.php"> <button class="ButtonForUser">Add a member</button></a>
          <a href="adminListMembers.php"> <button class="ButtonForUser">View members</button></a>
        </div>
        
      </div>
    </div>

  </main>
</body>

</html>