
<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'Sumit1999@');
if($con) {
  echo "connection successfull";
}
else{
  echo "connection not stablish";
}
$category = "italian";
$customer_name = $_SESSION['username'];

$address = array("Alfredo-Pasta.jpg","creamy-garlic-pasta.jpg","Macaroni.jpg","picante pasta.jpg","Neapolitan pizza.jpg","Chicago pizza.jpg","Sicilian pizza.jpg","greek pizza.jpg");

mysqli_select_db($con, 'resturent');
$sql = "select * from product_details where category = '$category';";
$result = mysqli_query($con, $sql);

$description=array("Fettuccine Alfredo (Italian pronunciation: [fettut'tʃiːne alˈfreːdo]) or fettuccine al burro is an Italian pastadish of fettuccine tossed with butter and Parmesan cheese (Italian: pasta al burro e parmigiano).", "This creamy garlic pasta is fast, simple, and delicious! A weeknight favorite. ... some made with cream, and others with cream cheese or milk.", "Macaroni is drypasta shaped like narrow tubes. Made with durum wheat,macaroni is commonly cut in short lengths; curvedmacaroni may be referred to as elbow macaroni", " Macaroni is drypasta shaped like narrow tubes. Made with durum wheat,macaroni is commonly cut in short lengths; curvedmacaroni may be referred to as elbow macaroni."," A refreshing pasta dish, perfect on its own or as an accompaniment”,” Neapolitan is the original pizza. This delicious pie dates all the way back to 18th century in Naples, Italy. ","Chicago pizza, also commonly referred to as deep-dish pizza, gets its name from the city it was invented in. ","Sicilian pizza, also known as 'sfincione,' provides a thick cut of pizza with pillowy dough, a crunchy crust, and robust tomato sauce."," Greek pizza was created by Greek immigrants who came to America and were introduced to Italian pizza.");
echo $address[1];



function setorder($order_id){
echo "$order_id";
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

<div class="container ">
  <div class="panel panel-default" style="margin-top: 50px;">

     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="height: 500px;">
           <div class="carousel-item active">
              <img src="hd.jpg" class="d-block w-100"width="500px",height="100px" alt="...">
            </div>
            <div class="carousel-item">
             <img src="pizza.jpg" class="d-block w-100" width="500px",height="100px" alt="...">
            </div>
            <div class="carousel-item">
             <img src="snacks.jpg" class="d-block w-100"width="500px",height="100px" alt="...">
            </div>
          </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
      </div>
    </div>
</div>


  <form method="post" action="order.php">
  <div class="container-fluid" style="margin-top: 40px;">

    <?php
    
    $num = mysqli_num_rows($result);
    $name_one = array();
    $id = array();
    $price = array();
    $sub_category = array("pasta","pizza");


    while($item=mysqli_fetch_array($result)){
    array_push($name_one,$item['name']);
    array_push($id,$item['id']);
    array_push($price,$item['price']);
    
  }
  $size = sizeof($sub_category);
    echo " <div class='row'>";
    echo '<br/>';
    for($x=0; $x<8; $x++){
    echo "<div class='card col-lg-3 ' style='width: 18rem;'>
      <img src='$address[$x]' height='300px' class='card-img-top' alt='...'>
      <div class='card-body'>
        <h5 class='card-title'>$name_one[$x]</h5>
        <p class='card-text'>$description[$x]</p>
        <p class='card-text'>price = $price[$x]</p>

        <a href='#' class='btn btn-primary' id='$id[$x]' onclick='writeMsg(id)'>Order Now</a>
     </div>
    </div>";
  }
  

    ?>
  </div>
  </div>
</div>
</form>
<input type="text" name="order" id="order" style="display: none;">


   


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
    var product = [];
    function writeMsg(n){
      var customer = "<?php setorder('$customer_name'); ?>"; 
      var orderdata = String(n);
      orderdata.id = n;
      $.ajax({
        url: 'order.php',
        type: 'POST',
        data: {orderdata : JSON.stringify( orderdata )},
        success: function(res) {
            console.log(res); // Inspect this in your console
        }
    })
      product.pop();
      product.pop();

      return false;

    }

  </script>
  </body>


</html>