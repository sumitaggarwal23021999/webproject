<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'Sumit1999@');
if($con) {
  echo "connection successfull";
}
else{
  echo "connection not stablish";
}
$customer_name = $_SESSION['username'];
echo $customer_name;

mysqli_select_db($con, 'resturent');
$sql = "select productid from order_details where username = '$customer_name';";
$result = mysqli_query($con, $sql);


$Total_price = 0;
    $num = mysqli_num_rows($result);
    echo $num;
    $product_id = array();
    $product_name = array();
    $product_price = array();
    $quantity = 1;
    ?>
    <?php

    while($item=mysqli_fetch_array($result)){
    array_push($product_id,$item['productid']);
  }

$size = sizeof($product_id);
for($i=0;$i<$size;$i++){
$sql1 = "select name,price from product_details where id = '$product_id[$i]';";
$result1 = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result1);
echo $num1;

while($item1=mysqli_fetch_array($result1)){
  echo $item1['name'];
  array_push($product_name,$item1['name']);
  array_push($product_price,$item1['price']);
}
}



?>
<!doctype html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>dessert</title>
  </head>
  <body>
<?php

include 'Navigator.php';

?>

<div class="container">
  <table class="table" style="margin-top: 50px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product-Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">cancel</th>


    </tr>
  </thead>
  <?php
  

    for($x=0; $x<$num; $x++){
    $y = $x + 1;
    $Total_price = $Total_price + $product_price[$x];
    echo "<tbody>
    <tr>
      <th scope='row'>$y</th>
      <td>$product_name[$x]</td>
      <td>$product_price[$x]</td>
      <td>$quantity</td>
      <td><a onclick='cancelorder(id)' href='Myorder.php' class='btn btn-primary' id='$product_id[$x]'>cancel</a></td>

    </tr> 
</tbody>";
}
    ?>
    <?php
echo"</table>
<label>Total Amount =$Total_price Rs </label>";
?><br>
<label class="btn btn-danger">NOTE:-<p>Pleases Make Sure That You Login First Otherwise You will Not Be Able To Order.</p></label>
</div>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
    var product = [];
    function cancelorder(b){
      $.ajax({
        url: 'cancelorder.php',
        type: 'POST',
        data: {b : JSON.stringify( b )},
        success: function(res) {
            console.log(res); // Inspect this in your console
        }
    })
    }
</script>
    </body>
</html>