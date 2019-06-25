
<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'Sumit1999@');
if($con) {
  echo "connection successfull";
}
else{
  echo "connection not stablish";
}
$category = "desserts";
$customer_name = $_SESSION['username'];

$address = array("bfc.jpg","ccc.jpg","cvfc.jpg","occ.jpg","chocolate.jpg","gummie.jpg","jelly.jpg","lolli.jpg","bf.jpg","bs.jpg","choco.jpg","van.jpg","brownie.jpg","cookies.jpg","donuts.jpg","muffin.jpg");

mysqli_select_db($con, 'resturent');
$sql = "select * from product_details where category = '$category';";
$result = mysqli_query($con, $sql);

$description=array("THIS BLACK FOREST CAKE COMBINES RICH CHOCOLATE CAKE LAYERS WITH FRESH CHERRIES", "CHERRY LIQUEUR, AND A SIMPLE WHIPPED CREAM FROSTING","Chocolate cake or chocolate gâteau is a cake flavored with melted chocolate, cocoa powder, or both","Fruitcake is a cake made with candied or dried fruit, nuts, and spices, and optionally soaked in spirits.","Chocolate is a usually sweet, brown food preparation of roasted and ground cacao seeds that is made in the form of a liquid, paste, or in a block, or used as a flavoring ingredient in other","Gummies, gummy candies are a broad category of gelatin-based chewable sweets. Gummi bears and Jelly Babiesare widely popular and are a well-known part of the sweets industry. ","Jelly candies are a broad category of gelatin-based chewable sweets. Gummi bears and Jelly Babiesare widely popular and are a well-known part of the sweets industry.","A lollipop is a type of sugar candy usually consisting of hard candy mounted on a stick and intended for sucking or licking." ,"The chocolate base of this no churn black forest ice cream tastes almost like a frosty. ", "butterscotch ice cream is one of the popular and tasty indian ice cream varieties.", "Chocolate ice cream is ice cream with natural or artificial chocolate flavoring", "Vanilla is frequently used to flavor ice cream, especially in North America and Europe. ", "A chocolate brownie is a square, baked, chocolate dessert. Brownies come in a variety of forms and may be either fudgy or cakey, depending on their density. They may include nuts, frosting, cream cheese, chocolate chips, or other ingredients", "A cookie is a baked or cooked food that is typically small, flat and sweet.", "A muffin is an individual-sized, baked product. It can refer to two distinct items, a part-raised flatbread and a cupcake-like quickbread","A doughnut or donut is a type of fried dough confection or dessert food.");
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
    $sub_category = array("cake","candy&sweets","icecream","Other desserts");


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