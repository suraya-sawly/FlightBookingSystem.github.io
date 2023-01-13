<?php
require_once('DBconnect.php');
session_start(); 
$taka=$_SESSION['AircrafMoney'];
if (isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['credit']) && isset($_POST['seat'])&& isset($_POST['bdate'])){
    $_SESSION['passport']= $_POST['pass'];
    $_SESSION['email']= $_POST['email'];
    $_SESSION['seat']= $_POST['seat'];
    $_SESSION['money']= $_SESSION['seat']*$taka;
    $_SESSION['Acredit']= $_POST['credit'];
    $_SESSION['status']= "Booked";
    $_SESSION['Airdate']=$_POST['bdate'];
    header('location:finalbook.php');
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="book.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<nav>
        <label class = "lol">
            <i class="fas fa-plane"></i>
        </label>
        <ul>
        <li><a href="aboutus.php">ABOUT US</a></li>
            <li><a href="home.php">LOGOUT</a></li>
            <li><a href="userSearch.php">Flight</a></li>
            <li><a href="user.php">home</a></li>
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
    <div class="title">Book Your Flight</div>
    <div class="content">
      <form action="book.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Passport No</span>
            <input type="text" name="pass" placeholder="Enter your passportId" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Credit No</span>
            <input type="text" name="credit" placeholder="Enter your Credit No" required>
          </div>
          <div class="input-box">
            <span class="details">Seat Number</span>
            <input type="text" name="seat" placeholder="Enter your seat number" required>
          </div>
          <div class="input-box">
            <span class="details">Booking Date</span>
            <input type="date" name="bdate" placeholder="Enter todays date" required>
          </div> 
          <div><?php 
          echo  $_SESSION['AircrafMoney']; ?></div> 
        </div>
        <div class="button">
          <input type="submit" value="proceed">
        </div>
      </form>
    </div>
  </div>

</body>
</html>

