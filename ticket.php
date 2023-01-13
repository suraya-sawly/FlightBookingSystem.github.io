<?php
  require_once('DBconnect.php');
  if(isset($_POST['btn'])){
      $pass_num = $_POST['pass_num'];
      $email = $_POST['email'];
      $credit_no = $_POST['credit_no'];
      $payment_amo = $_POST['payment_amo'];
      $aircraft_id = $_POST['aircraft_id'];
      $aircraft_name = $_POST['aircraft_name'];
      $seat_nums = $_POST['seat_nums'];
      $stat = $_POST['stat'];
     

      if(!empty($pass_num) && !empty($email) && !empty($credit_no) && !empty($payment_amo) && !empty($aircraft_id) && !empty($aircraft_name) && !empty($seat_nums) && !empty($stat)){
          $query = "INSERT INTO tickets (pass_num,email,credit_no,payment_amo,aircraft_id,aircraft_name,seat_nums,stat) VALUE('$pass_num','$email','$credit_no',$payment_amo,'$aircraft_id','$aircraft_name',$seat_nums,'$stat')";
          $createquery = mysqli_query($conn, $query);
          if($createquery){
              echo "YOUR DATA SUBMITTED SUCCESSFULLY";
          }
      }
      else{
          echo "Field should not be empty";
      }
    
  }
  

?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="ticket.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>airline</title>
  </head>
  <body>
  <nav>
        <label class = "lol">
            <i class="fas fa-plane"></i>
        </label>
        <ul><li><a href="aboutus.php">ABOUT US</a></li>
            <!--<li><a href="#">Flight</a></li>-->
            <li><a href="admin.php">ADMIN</a></li>
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
        <div>
</div>
    </nav>

    <div class="container">
    
      <table class="table table-bordered">
      <tr>
      <th>FIRST NAME</th>
      <th>LAST NAME</th>
      <th>PHONE</th>
      <th>PASSPORT</th>
      <th>EMAIL</th>
      <th>CREDIT NO</th>
      <th>PAYMENT</th>
      <th>AIRCRAFT ID</th>
      <th>AIRLINES</th>
      <th>SEATS</th>
      <th>DATE</th>
      <th>SERIAL NO</th>
      <th>STATUS</th>
      </tr>
<?php  
require_once('DBconnect.php');
    $query = "SELECT * FROM tickets INNER JOIN users ON tickets.pass_num=users.passport_id";
    $cancel="cancelled";
    $readquery = mysqli_query($conn, $query);
    if($readquery->num_rows >0){
        while($rd=mysqli_fetch_assoc($readquery)){
            $serial=$rd['serial_no'];
            $pass_num = $rd['pass_num'];
            $email = $rd['email'];
            $credit = $rd['credit_no'];
            $payment_amo = $rd['payment_amo'];
            $aircraft_id = $rd['aircraft_id'];
            $aircraft_name = $rd['aircraft_name'];
            $seat_nums = $rd['seat_nums'];
            $stat = $rd['stat'];
            $fname=$rd['f_name'];
            $lname=$rd['l_name'];
            $phn=$rd['phone'];
            $date=$rd['booking_date'];
            
            
        
?>
      
      <tr>
      <td> <?php  echo $fname;  ?> </td>
      <td> <?php  echo $lname;  ?> </td>
      <td> <?php  echo $phn;  ?> </td>
      <td> <?php  echo $pass_num;  ?> </td>
      <td> <?php  echo $email;  ?></td>
      <td> <?php  echo $credit;  ?></td>
      <td> <?php  echo $payment_amo;  ?></td>
      <td> <?php  echo $aircraft_id;  ?></td>
      <td> <?php  echo $aircraft_name;  ?></td>
      <td> <?php  echo $seat_nums;  ?></td>
      <td> <?php  echo $date;  ?></td>
      <td> <?php  echo $serial;  ?></td>
      <td><?php if($stat=='Booked'){ echo $stat ?> <td><a href="ticket.php?delete=<?php echo $serial;  ?>" class="btn btn-danger">Delete</a></td></td><?php } else{
          echo $stat;}?>
      </tr>
        <?php  }} else{
           // echo "No Data To Show";
        }  ?>

      </table>
    </div>
  </body>
</html>

<?php
require_once('DBconnect.php');

if(isset($_GET['delete'])){
  $credit= $_GET['delete'];
  $status="cancelled";
  $sql="UPDATE tickets SET stat='$status' WHERE serial_no='$credit'";
  $deletesql=mysqli_query($conn,$sql);
  if($deletesql){
    //header('location:ticket.php');
  }
  else{
    echo "failed";
}
} ?>