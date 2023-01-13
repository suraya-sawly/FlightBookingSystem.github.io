<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="userLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>

  <nav>
        <label class = "lol">
            <i class="fas fa-plane"></i>
        </label>
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="adminLogin.php">AdminLogin</a></li>
        </ul>
        <div class="socialtop">
            <div class="top-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </nav>

    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form action="userLogin.php" method="post">
          <div>
        <div class="row">
            <input type="text" name="email" placeholder="Email" required>
          </div>
            <div class="row">
            <input type="password" name="passp" placeholder="Password" required>
          </div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a user? <a href="registration.php">Signup now</a></div>
          <div>
          </form>
      </div>
    </div>

  </body>
</html>

<?php
require_once('DBconnect.php');
if (isset($_POST['email']) && isset($_POST['passp'])){
    $e = $_POST['email'];
    $p = $_POST['passp'];
    $sql = "SELECT * FROM users WHERE email ='$e' AND pass='$p' ";

    if (mysqli_query($conn, $sql)) {
      $result = mysqli_query($conn, $sql);
      $user_info=mysqli_fetch_assoc($result);
        if($user_info){
          header('location:user.php');
                session_start();
                $_SESSION['email'] = $user_info['email'];
                $_SESSION['passp'] = $user_info['pass'];
            }
            else{
                header('location:registration.php');
          }

          }
    
}

?>