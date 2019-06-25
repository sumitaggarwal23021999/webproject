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
$password = $_POST['password'];

$q = "select * from customer where (username = '$username' and password = '$password');";
$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['username'] = $username;
	header('location:index.php');


}else{

	header('location:login.php');

}


?>