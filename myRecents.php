<?php
require_once('DBconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="user.css">
    <title>Document</title>
    <style>
      h1{
        text-align:center;
        color:#fff;
      }
      .s1{
        padding: 10px;
        margin-top:30px;
      }
      .userd{
        margin-top:35px;
      }
    </style>
</head>
<body>
<nav>
        <label class = "lol">
            <i class="fas fa-plane"></i>
        </label>
        <ul><li><a href="user.php">MY HOME</a></li>
            <li><a href="userSearch.php">Flight Search</a></li>
            <li><a href="logout.php">Logout</a></li>
            <!--<li><a href="#">AdminLogin</a></li>-->
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

    <h1><u>Recent Flights</u></h1>
    <div class="container s1">
    <div class="container-fluid row align-items-center">
    
  </tbody>
  </table>
  
<?php
require_once('DBconnect.php');
session_start();
$usermail=$_SESSION['email'];
$query="SELECT * FROM tickets WHERE email= '$usermail' ORDER BY booking_date DESC";
    $read= mysqli_query($conn,$query);
    $count=mysqli_num_rows($read);

    if ($count != 0) {
        while($rd=mysqli_fetch_array($read)){
        $serial=$rd[0];
        $credit=$rd[3];
        $total= $rd[4];
        $id= $rd[5];
        $name= $rd[6];
        $seat= $rd[7];
        $stat= $rd[8];
        $bdate=$rd[9];

                ?>
                <div class="container userd"> <table class="table table-dark">
                  
                 <thead>
    <tr>
      <th scope="col">CREDIT CARD</th>
      <th scope="col">PAYMENT AMOUNT</th>
      <th scope="col">AIRCRAFT ID</th>
      <th scope="col">AIRCRAFT NAME</th>
      <th scope="col">SEAT</th>
      <th scope="col">DATE</th>
      <th scope="col">STATUS</th>
      
    </tr>
  </thead>
    <tbody>
    <tr>
        <td><?php echo $credit; ?></td>
        <th><?php echo $total; ?></th>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $seat; ?></td>
        <td><?php echo $bdate; ?></td>
        <td><?php if($stat=='Booked'){ echo $stat ?> <td><a href="myRecents.php?delete=<?php echo $serial;  ?>"class="btn btn-danger">Cancel</a></td></td><?php } else{
          echo $stat;}?>
      </tr>
      </tr>
      <?php }} ?>
  </tbody>
  </table>
  </div>
  </div>
  </div>
</body>
</html>
<?php

require_once('DBconnect.php');
if(isset($_GET['delete'])){
  $status="Cancelled";
  $up=$_GET['delete'];
  $sql="UPDATE tickets SET stat='$status' WHERE booking_date >= (SELECT CURRENT_DATE()-5) AND serial_no='$up'";
  $deletesql=mysqli_query($conn,$sql);
  if(mysqli_affected_rows($conn)){
    header('location:myRecents.php');
  }
  else{
    header('location:alert.php');
 
}}
?>