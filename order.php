<?php
session_start();

$name = $_SESSION['username'];
echo $name;
$x = $_POST['orderdata'];
echo gettype($x);
$y = gettext($x);

$con = mysqli_connect('localhost', 'root', 'Sumit1999@');
if($con) {
  echo "connection successfull";
}
else{
  echo "connection not stablish";
}

mysqli_select_db($con, 'resturent');
$qy="insert into order_details values('$name', '$x[1]$x[2]$x[3]$x[4]$x[5]');";
mysqli_query($con, $qy);
$sql = "delete from order_details where username = '';";
mysqli_query($con, $sql);

echo "data saved";
?> 