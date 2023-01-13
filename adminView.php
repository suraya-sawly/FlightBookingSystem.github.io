<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="ticket.css">
    <title>Document</title>
</head>
<body>
<nav>
        <label class = "lol">
            <i class="fas fa-plane"></i>
        </label>
        <ul> <li><a href="aboutus.php">ABOUT US</a></li>
            <li><a href="adminSearch.php">SEARCH</a></li>
            <li><a href="admin.php">ADMIN</a></li>
            <li><a href="home.php">LOg OUT</a></li>
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
        <div>
</div>
    </nav>



<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">AircraftID</th>
      <th scope="col">AircraftName</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Money</th>
    </tr>
  </thead>
  <?php
require_once('DBconnect.php');
//require_once('home.php');
$from=$_POST['from'];
$to=$_POST['to'];
$query="SELECT * FROM flights WHERE fromwhere='$from' AND towhere='$to'"; 
$read= mysqli_query($conn,$query);
if($read){
  while($rd=mysqli_fetch_assoc($read)){
    $id=$rd['aircraft_id'];
    $name=$rd['aircraft_name'];
    $from=$rd['fromwhere'];
    $to=$rd['towhere'];
    $taka=$rd['taka'];

?>
  <tbody>
  <tr>
                
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $from; ?></td>
                <td><?php echo $to; ?></td>
                <td><?php echo $taka; ?></td>
                <!--<td><a href="userlog.php" class="btn btn-warning">Book</a></td>-->
  </tr>
  <?php }} ?>
  </tbody>
</table>

</div>

</body>
</html>