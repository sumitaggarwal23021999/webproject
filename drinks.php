
<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'Sumit1999@');
if($con) {
  echo "connection successfull";
}
else{
  echo "connection not stablish";
}
$category = "Drinks";
$customer_name = $_SESSION['username'];

$address = array("beer.jpeg","coctails.jpg","rum.jpg","vodka.jpg","orangejuice.jpg","Pineapple-Juice.jpg","pomegranate-juice.jpg","veg-juice.jpg","cocola.jpg","mountain dew.jpg","seenup.jpg","sprite.jpg","frozendrink2.jpg","mango.jpeg","mint milk smothy.jpeg","strawbery.jpg");

mysqli_select_db($con, 'resturent');
$sql = "select * from product_details where category = '$category';";
$result = mysqli_query($con, $sql);

$description=array("an alcoholic beverage, made from malted cereal grain, flavored with hops, and brewed by slow fermentation","An alcoholic drink consisting of a spirit or spirits mixed with other ingredients, such as fruit juice or cream","Rum is a distilled alcoholic drink made from sugarcane byproducts, such as molasses, or directly from sugarcane juice, by a process of fermentation and distillation","Vodka is a clear distilled alcoholic beverage originating from Poland and Russia, composed primarily of water and ethanol","Orange juice is a liquid extract of the orange tree fruit, produced by squeezing oranges. ... The health value of orange juice is debatable: it has a high concentration of vitamin C, but also a very high concentration of simple sugars, comparable to soft drinks.","Pineapple Juice, a best nutrient rich juice among all fruit juices, provides lots of health benefits because of its high quantity of minerals, fibers, enzymes, vitamin C and energy.","Pomegranate juice contains higher levels of antioxidants than most other fruit juices. It also has three times more antioxidants than red wine and green tea.”,” High level of nutrition in a single serving"," High level of nutrition in a single serving","the world's most recognised drinks brand and its leading non-alcoholic ready-to-drink beverage brand in terms of sales volume.", "Mountain Dew (stylized as Mtn Dew) is a carbonated soft drink brand produced and owned by PepsiCo.", "7 Up (stylized as 7up outside the U.S.) is a brand of lemon-lime-flavored non-caffeinated soft drink.", " Sprite is a colorless, caffeine-free, lemon and lime-flavored soft drink created by The Coca-Cola Company.","Frozen uncarbonated beverages are made by freezing a non-carbonated juice or other liquid. ... There are also frozen coffee beverages and frozen alcoholicbeverages, as well as more conventional slush drinks.","Mango Shake (Mango Milkshake) is a cool and tempting fruit drink prepared by simply blending ripe mango pieces, milk and sugar. To keep things simple and easy, this recipe primarily explains how to make mango shake with milk.","This drink does it all! First it cools you with the mint, then it adds pep to your step with chlorella and cacao. Your immune system will also get a kick of vitamin C from both the spinach and the orange.","the juicy edible usually red fruit of any of several low-growing temperate herbs (genus Fragaria) of the rose family that is technically an enlarged pulpy receptacle bearing numerous achenes on its surface.");
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
$sub_category = array("hard drinks","soft drinks","juices", "shakes");


    while($item=mysqli_fetch_array($result)){
    array_push($name_one,$item['name']);
    array_push($id,$item['id']);
    array_push($price,$item['price']);
    
  }
  $size = sizeof($sub_category);
    echo " <div class='row'>";
    echo '<br/>';
    for($x=0; $x<16; $x++){
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