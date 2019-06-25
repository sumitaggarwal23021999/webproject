<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'Sumit1999@');
if($con) {
	echo "connection successfull";
}
else{
	echo "connection not stablish";
}


mysqli_select_db($con, 'resturent');

$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$q = "select * from customer where (username = '$username' or email = '$email');";
$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	echo" duplicate data";
}else{
	$qy = "insert into customer values('$username', '$name', '$email', '$password');";
	mysqli_query($con, $qy);
	header('location:login.php');


}


?>