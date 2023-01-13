<?php 
$servername="localhost";
$dbname="bookingsystem";
$username="root";
$password="";

//creating connection

$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
    die("connection failed : " . $conn->connect_error);
    }

else{
    mysqli_select_db($conn, $dbname);
    echo "";
}

?>