
<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'Sumit1999@');
if($con) {
  echo "connection successfull";
}
else{
  echo "connection not stablish";
}
$category = "full meal";
$customer_name = $_SESSION['username'];

$address = array("300-Calorie Breakfast.jpeg","bacon-egg-breakfast-muffins.jpg","Grab-n-Go-Egg.jpg","Quinoa-breakfast-bowl.jpg","butterfinger.jpg","Candied Salmon Goat Cheese Scramble_Web.jpg","Chicken-Salad-OG.jpg","weekend-brunch.jpg","chhole.jpg","chili-glazed-pork.jpg","kadai-paneer.jpg","soyabean chaap.jpg","beef.jpg","chili-glazed-pork.jpg","egg-fried-caulifour-stir-fry-18-vegetarian-lunch-ideas.jpg","indian-set-lunch-meal-sag-mushroom-korma.jpg");

mysqli_select_db($con, 'resturent');
$sql = "select * from product_details where category = '$category';";
$result = mysqli_query($con, $sql);

$description=array("This is the meal that contains only 300 calorie which is very good for health","A bacon, egg and cheese sandwich is a breakfast sandwich popular in the United States. The sandwich is typically made with bacon, eggs (typically fried or scrambled), cheese and bread, which may be buttered and toasted.","These healthy food bloggers have some better, tastier suggestions that will keep you full until lunch.","1 cup uncooked white quinoa. 1 cup unsweetened almond milk (plus more for serving) 1 cup coconut milk (light canned, or the beverage in a carton) 1 pinch sea salt keeps you healthy.","Butterfinger is a mix between a greasy spoon diner and contemporary brunch bistro.","used to describe any salmon that has been cured and/or cold or hot smoked.","This chicken salad has a creamy dressing and is best served over crisp lettuce leaves.","Brunch is a combination of breakfast and lunch eaten usually during the late morning to early afternoon, generally served from 10am up to 2pm, and regularly has some form of alcoholic drink (most usually champagne or a cocktail) served with it.","Chole is a kind of curried vegetable dish made from chickpeas"," Chili-Glazed Pork Roast. A simple brown sugar and spice rub gives this pork dinner an intense flavour"," An Indian vegetarian dish made with cottage cheese cooked with tomatoes-onions-bell peppers- and a blend of Indian spices.
","Soya chaap is a dish originating in South Asia where it is popular, like in India","Beef is the culinary name for meat from cattle, particularly skeletal muscle. ... Trimmings, on the other hand, are usually mixed with meat from older, leaner (therefore tougher) cattle, are ground, minced or used in sausages.","Chili-Glazed Pork Roast. A simple brown sugar and spice rub gives this pork dinner an intense flavor. ","Vegetarian Lunch Ideas To Make Your Coworkers Jealous #healthy ","Mushroom Korma is a beautiful curry, full of rich flavor, and it works for either a weeknight dinner or a special meal with family or friends.");
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
    $sub_category = array("breakfast","brunch","lunch","dinner");


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