<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="adminRegisterStyle.css" />
  <title>Register</title>
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
  <div class="container">
    <div class="box form-box">

      <?php
      include("../config.php");
      if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $CNumber = $_POST["CNumber"];
        $age = $_POST["age"];
        $StDate = $_POST["startingdate"];
        $EdDate = $_POST["endingdate"];
        $password = $_POST["password"];

        //Verifying the email
        $verify_query = mysqli_query($con, "SELECT Email FROM members WHERE Email='$email'");

        if (mysqli_num_rows($verify_query) != 0) {
          echo "<div class='message'>
                  <p>This email is used, Try another One Please!</p>
                </div> <br>";
          echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        } else {

          mysqli_query($con, "INSERT INTO members(FullName, Email, ContactNumber, Age, StartingDate, EndingDate, Password) VALUES ('$name','$email','$CNumber','$age','$StDate','$EdDate','$password')") or die("Error Occured");

          echo "<div class='message'>
                  <p>Reistration Success!</p>
                </div> <br>";
          echo "<a href='adminDashboard.php'><button class='btn'>Go Back</button>";
        }
      } else {
      ?>
        <header>ADD A MEMBER</header>
        <form action="" method="post">
          <div class="field input">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" autocomplete="off" required />
          </div>

          <div class="field input">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" autocomplete="off" required />
          </div>

          <div class="field input">
            <label for="CNumber">Contact Number</label>
            <input type="number" name="CNumber" id="CNumber" autocomplete="off" required />
          </div>

          <div class="field input">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" autocomplete="off" required />
          </div>

          <div class="field input">
            <label for="startingdate">Starting Date</label>
            <input type="date" name="startingdate" id="startingdate" autocomplete="off" required />
          </div>

          <div class="field input">
            <label for="endingdate">Ending Date</label>
            <input type="date" name="endingdate" id="endingdate" autocomplete="off" required />
          </div>

          <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="off" required />
          </div>

          <div class="field">
            <input type="submit" class="btn" name="submit" value="Add" required />
          </div>
        </form>
    </div>
  <?php } ?>
  </div>
</body>

</html>