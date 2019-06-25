
<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'Sumit1999@');
if($con) {
  echo "connection successfull";
}
else{
  echo "connection not stablish";
}
$category = "Chinese";
$address = array("chicken-dumplings.jpg","Curried-Potato-Fried-Dumplings.jpg","mushroom dumpling.jpg","Steamed-Dumplings-Rice-.jpg","egg-noodle.jpg","ginger noodles.jpg","Red-Curry-Noodles.jpg","tofu-Noodles.jpg","california-sushi.jpg","oishii sushi.jpg","spicy shrimp sushi.jpg");

mysqli_select_db($con, 'resturent');
$sql = "select * from product_details where category = '$category';";
$result = mysqli_query($con, $sql);

$description=array("Chicken and dumplings is a dish that consists of a chicken cooked in water, with the resulting chicken broth being used to cook the dumplings by boiling. A dumpling—in this context—is a biscuit dough, which is a mixture of flour, shortening, and liquid", "Potato croquettes, or crispy deep fried mashed potatoes is one of the very best ways to use leftover mashed ... Potato Balls and croquettes.", "These Chinese mushroom dumplings are filled with two kinds of mushrooms, bamboo shoots, and tofu. With aromatic herbs", "Steamed dumplings: Line a steamer basket with parchment andsteam over simmering water for about 6 minutes if fresh, 8 minutes if frozen. Boiled dumplings", "Egg Noodles is a Chinese dish made using eggs, noodles and veggies like cabbage, onion and carrot. It goes best with schezwan sauce and is a great snack recipe to indulge in! ... If you want to make this dish more healthy, you can use the egg white and extract the yolk, which is perfect for patients with high cholesterol.", "This seafood stir-fry, with fiery ginger and crunchy veg, is as healthy as it is delicious - a low-fat and low-calorie weeknight dinne", "These Thai Red Curry Noodles only take 15 minutes to make and are vegan & gluten-free! You'll love this delicious", "Shirataki are thin, translucent, gelatinous traditional Japanese noodles made from the konjac yam. The word 'shirataki' means white waterfall, referring to the appearance of these noodles" ,"A California roll or California maki is a makizushi sushi roll that is usually rolled inside-out, and containing cucumber, crab or imitation crab, and avocado", "Oishii sushi es un nuevo proyecto de comida Oriental Basándose principalmente en Comida Japonesa ", "Sushi is always a good option for eating out; it's also fun to make at home and I like to change things up like in these spicy shrimp sushi stacks.");
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
  <div class="panel panel-default" style="margin-top: 80px;">

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
    $sub_category = array("dumplings","noodles","sushi");


    while($item=mysqli_fetch_array($result)){
    array_push($name_one,$item['name']);
    array_push($id,$item['id']);
    array_push($price,$item['price']);
    
  }
  $size = sizeof($sub_category);
    echo " <div class='row'>";
    echo '<br/>';
    for($x=0; $x<11; $x++){
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
      var product_id = "<?php setorder('n'); ?>"; 
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