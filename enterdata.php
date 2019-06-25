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


$category = "indian";
$sub_category = array("north-indian","punjabi","rajisthani","south-indian");
$price=array(90,100,190,80,120,80,100,130,120, 90,150,130,70,100,110,100);


$id = array("icni1","icni2","icni3","icni4","icpa1","icpa2","icpa3","icpa4","icra1","icra2","icra3","icra4","icsi1","icsi2","icsi3","icsi4");
$Desert = array("Panner", "Rajma masala"," thali","Chhole bhature" , "Aloo Paratha", "Chhole bhature", "Paneer tikka", "Sarson Da Saag", "Dal dhokli"," Dal baati", "Dhokla", "Mysore pak", "Dosa", "idly", "Sambar vada", "Uttapam");
 

	for ($a=12; $a <16 ; $a++) { 
		
$sql = "insert into product_details values('$category', '$sub_category[3]', '$id[$a]', '$Desert[$a]', '$price[$a]');";
$result = mysqli_query($con, $sql);
}


echo "data saved";
?>