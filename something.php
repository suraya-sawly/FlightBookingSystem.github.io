
<?php 
if(isset($_GET['delete'])){
   $pass_num = $_GET['delete'];
   $query = "DELETE FROM tickets WHERE pass_num={$pass_num}";
   $deletequery= mysqli_query($conn, $query);
   if($deletequery){
   echo "TICKET IS DELETED" ;
}
}
?>

//user er jinish
<?php
require_once('DBconnect.php');
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
        <td><?php if($stat=='Booked'){ echo $stat ?> <td><a href="user.php?delete=<?php echo $serial;  ?>"class="btn btn-danger">Delete</a></td></td><?php } else{
          echo $stat;}?>
      </tr>
      </tr>
      <?php }} ?>
  </tbody>
  </table>
  </div>
  </div>
  </div>
</body>>
</html>
<?php

require_once('DBconnect.php');
if(isset($_GET['delete'])){
  $status="Cancelled";
  $up=$_GET['delete'];
  $sql="UPDATE tickets SET stat='$status' WHERE booking_date >= (SELECT CURRENT_DATE()-5) AND serial_no='$up'";
  $deletesql=mysqli_query($conn,$sql);
  if($deletesql){
    echo "Done";
  }
  else{
    echo "failed";
}}
?>