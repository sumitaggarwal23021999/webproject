<?php
session_start();
$x = $_POST['b'];
echo $x;

$con = mysqli_connect('localhost', 'root', 'Sumit1999@');
if($con) {
  echo "connection successfull";
}
else{
  echo "connection not stablish";
}
$customer_name = $_SESSION['username'];
echo $x[0].$x[1].$x[2].$x[3].$x[4].$x[5].$x[6];
$y = $x[1].$x[2].$x[3].$x[4].$x[5];


mysqli_select_db($con, 'resturent');
$sql1 = "delete from order_details where productid	='$y' and username = '$customer_name';";
mysqli_query($con, $sql1);
?>