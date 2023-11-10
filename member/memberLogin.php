<?php
  session_start();

  include("../config.php");

  if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con,"SELECT * FROM members WHERE Email ='$email' AND Password ='$password'") or die("Select Error");
    $row = mysqli_fetch_assoc($result);

    if(is_array($row) && !empty($row)){
      $_SESSION['valid'] = $row['Email'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['age'] = $row['Age'];
      $_SESSION['id'] = $row['Id'];

      header("Location: memberDashboard.php");
      exit();
    }
    else{
      $error_message = "Wrong Username or Password!";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="memberLoginStyle.css" />
    <title>Member Login</title>
  </head>
  <body>
    <div class="navbar">
      <a href="../index.html">
        <img src="../Components/Images/LogoWhite.png" alt="logo" class="logo" />
      </a>
    </div>
    <div class="container">
      <div class="box form-box">
      <?php
          if(isset($error_message)){
            echo "<div class='message1'>
                    <p>$error_message</p>
                  </div> <br>";
          }
        ?>
        <header>Member Login</header>
        <form action="" method="post">
          <div class="field input">
            <label for="email">Email</label>
            <input
              type="text"
              name="email"
              id="email"
              autocomplete="off"
              required
            />
          </div>
          <div class="field input">
            <label for="password">Password</label>
            <input
              type="password"
              name="password"
              id="password"
              autocomplete="off"
              required
            />
          </div>

          <div class="field">
            <input
              type="submit"
              class="btn"
              name="submit"
              value="Login"
              required
            />
          </div>
          Admin Login? <a href="../admin/adminLogin.php"> Click here </a>
        </form>
      </div>
    </div>
  </body>
</html>
