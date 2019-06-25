
<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'Sumit1999@');
if($con) {
  echo "connection successfull";
}
else{
  echo "connection not stablish";
}
$category = "snacks";
$customer_name = $_SESSION['username'];

$address = array("banana-chips.jpg","cheseballs.jpg","potato-wafers.jpg","Wafers.jpg","burger.jpg","french-fries.jpg","hotdog.jpg","tacos.jpg","bbq-pizza-318-1547837614.jpg","Super-Supreme-Pizza-Hut-Pizza-Review.jpg","Pizza01.jpg","pizza-pollo-arrosto.jpg","chesse.jpg","egg.jpg","rice.jpg","veg.jpg");

mysqli_select_db($con, 'resturent');
$sql = "select * from product_details where category = '$category';";
$result = mysqli_query($con, $sql);

$description=array("Banana chips are dried slices of bananas. They can be covered with sugar or honey and have a sweet taste, or they can be fried in oil and spices and have a salty or spicy taste1","Easy Cheese Ball-this simple and delicious cheese ball recipe is a favorite Appetizer during the holiday season.","Potato chips, or crisps, are thin slices of potato that have been deep fried or baked until crunchy. They are commonly served as a snack, side dish, or appetizer.
","A wafer is a crisp, often sweet, very thin, flat, light and dry biscuit, often used to decorate ice cream, and also used as a garnish on some sweet dishes. Wafers can also be made into cookies with cream flavoring sandwiched between them","A hamburger (short: burger) is a sandwich consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun.The patty may be pan fried, grilled, or flame broiled.","'French fries' usually refers to the thinner variant found in US-influenced fast food restaurants, or to the even thinner 'shoestring potatoes.","The hot dog (also spelled hotdog) or dog is a grilled or steamed link-sausage sandwich where the sausage is served in the slit of a partially sliced bun. ...","The hard-shell or crispy taco is a tradition that developed in the United States. ... Such tacos are crisp-fried corn tortillas filled with seasoned ground beef, cheese, lettuce, and sometimes tomato, onion, salsa, sour cream, and avocado or guacamole."," A topping of spicy barbeque sauce, diced chicken, cilantro, peppers, and onion all covered with cheese, and baked to bubbly goodness! ... Place pizza crust on a medium baking sheet. ... Top with chicken, cilantro, pepperoncini peppers, onion, and cheese.","Super Supreme. A nine-topping feast of ham, pepperoni, Italian sausage, beef, onions, mushrooms, green peppers, black olives and pork. Choose your toppings.
","Here are our favorite ideas for vegetarian and vegan pizzas with ingredients and topping ideas ranging from cream cheese to asparagus to ...
","Arosto Pizza - Dunn Loring Station 'We ordered delivery. The margarita and mushroom pizza arrived on time, hot, and delicious."
," A cheese roll is a snack food similar to Welsh rarebit, but created by covering a slice of bread in a prepared filling consisting mainly of grated or sliced cheese, and then rolling it into a tube shape before toasting.
","Egg rolls are a variety of deep-fried appetizers served in American Chinese restaurants. An egg roll is a cylindrical, savory roll with shredded cabbage, chopped pork, and other fillings inside a thickly-wrapped wheat flour skin, which is fried in hot oil.
","A rice noodle roll is a Cantonese dish from southern China and Hong Kong, commonly served either as a snack, small meal or as a variety of dim sum. It is a thin crépe roll made from a wide strip of shahe fen, filled with shrimp, beef, vegetables, or other ingredients.","
Spring rolls or veg rolls are a large variety of filled, rolled appetizers or dim sum found in East Asian, South Asian, and Southeast Asian cuisine. The name is a literal translation of the Chinese chūn juǎn.
");
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
    $sub_category = array("chips&waffers","pizza","rolls","others");


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