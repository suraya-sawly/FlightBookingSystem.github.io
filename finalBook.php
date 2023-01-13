<?php require_once('DBconnect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="book.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

<div class="container">
    <div class="title">Book Your Flight</div>
    <div class="content">
      <form action="finalBook.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Passport No</span>
            <?php echo $_SESSION['passport'];?>
          </div>
          <div class="input-box">
            <span class="details">Total AMOUNT</span>
            <?php echo  $_SESSION['money']; ?> Taka
          </div>
          <div class="input-box">
            <span class="details">Credit No</span>
            <?php echo $_SESSION['Acredit'];?>
          </div>
          <div class="input-box">
            <span class="details">Seat Number</span>
            <?php echo $_SESSION['seat'];?>
          </div>
          <div class="input-box">
            <span class="details">Booking Date</span>
            <?php echo $_SESSION['Airdate'];?>
          </div> 
          
        <div class="button">
          <input type="submit" name="btn" value="Book">
        </div>
      </form>
    </div>
  </div>
</body>
</html>

      <?php
      //require_once('DBconnect.php');
      //session_start();
      if (isset($_POST['btn'])){
      $id = $_SESSION['AircraftID'];
      $name = $_SESSION['AircraftName']; 
      $f = $_SESSION['passport'];
      $l = $_SESSION['email'];
      $ph = $_SESSION['seat'];
      $pi = $_SESSION['money'];
      $e = $_SESSION['Acredit'];
      $ps = $_SESSION['status'];
      $bdate = $_SESSION['Airdate'];
      $sql = "INSERT INTO tickets VALUES (null,'$f','$l','$e',$pi,'$id','$name','$ph','$ps','$bdate')";
      $result = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn)) {
          //echo("success");
          header('location:success.php');
        }

        else{
            echo "failed";
        }
      }
          ?>