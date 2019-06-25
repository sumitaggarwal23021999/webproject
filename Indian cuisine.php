
<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'Sumit1999@');
if($con) {
  echo "connection successfull";
}
else{
  echo "connection not stablish";
}
$category = "indian";
$customer_name = $_SESSION['username'];

$address = array("panner.jpg","rajma-masala-curry.jpg","befbecf16fc4562e133e1fac21657275.jpg","chole bhature.jpg","Aloo-Paratha.jpg","Chhole-Bhature.jpg","panner tika.jpg","Saarson-Ka-Sag-Maki-ki-Roti.jpg","dal dhokla.jpg","dalbati-churma.jpg","dhokla.jpg","Mysore_Pak.jpg","dosa.jpg","idly.jpg","sambar vada.jpg","utapam.jpg");

mysqli_select_db($con, 'resturent');
$sql = "select * from product_details where category = '$category';";
$result = mysqli_query($con, $sql);

$description=array("Paneer tikka masala is an Indian dish of marinated paneer cheese served in a spiced gravy. It is a vegetarian alternative to chicken tikka masala.","Rājmā or Rāzmā is a popular vegetarian dish, originating from the Indian subcontinent, consisting of red kidney beans in a thick gravy with many Indian whole spices and, is usually served with rice
","Thali is a combination of different indian foods","Chhole bhature is a dish from the Punjab region in the northern part of the Indian subcontinent. This Punjabi dish is a combination of chana masala and bhatura, a fried bread made from maida flour. Chhole bhature is often eaten as a breakfast dish, sometimes accompanied with lassi. 
","Aloo Paratha is a bread dish originating from the Indian subcontinent;. The recipe is one of the most popular breakfast dishes throughout western, central and northern regions of India ","Chhole bhature is a dish from the Punjab region in the northern part of the Indian subcontinent. This Punjabi dish is a combination of chana masala and bhatura, a fried bread made from maida flour. Chhole bhature is often eaten as a breakfast dish, sometimes accompanied with lassi. 
","Paneer tikka is an Indian dish made from chunks of paneer marinated in spices and grilled in a tandoor. It is a vegetarian alternative to chicken tikka and other meat dishes. It is a popular dish that is widely available in India and countries with an Indian diaspora"," Sarson Da Saag or is a popular vegetarian dish from the Punjab region of South Asia. It is made from mustard greens and spices such as garam masala, ginger and garlic. It is often served with makki di roti.
","Dal dhokli, varan phal, or chakolya is a Rajasthani, Gujarati and Maharashtrian dish made by boiling thick wheat flour noodles in a pigeon pea stew. It is considered a comfort food. Dal dhokli can easily be made in a pressure cooker or instant pot too. 
","Dal baati is an Indian dish comprising dal and baati. It is popular in Rajasthan, Uttar Pradesh and Madhya Pradesh. Dal is prepared using tuvaar dal, chana dal, mung dal, moth dal, or urad dal. The pulses or lentils are cooked together after being soaked in water for a few hours.
","Dhokla is a vegetarian food item that originates from the Indian state of Gujarat. It is made with a fermented batter derived from rice and split chickpeas. Dhokla can be eaten for breakfast, as a main course, as a side dish, or as a snack
","Mysore pak, originally called Mysuru paaka, is an Indian sweet prepared in ghee that is popular in Southern India. It originated in Mysore in the Indian state of Karnataka. It is made of generous amounts of ghee, sugar, gram flour, and often cardamom. The texture of this sweet is similar to fudge
","A dosa is a cooked flat thin layered rice batter, originating from the Indian subcontinent, made from a fermented batter. It is somewhat similar to a crepe in appearance. Its main ingredients are rice and black gram ground together in a fine, smooth batter with a dash of salt. 
","Idli or idly are a type of savoury rice cake, originating from the Indian subcontinent, popular as breakfast foods in southern India and among Indian-origin Tamils in Sri Lanka. The cakes are made by steaming a batter consisting of fermented black lentils and rice
","Medu vada is a South Indian fritter made from Vigna mungo. It is usually made in a doughnut shape, with a crispy exterior and soft interior. A popular food item in South Indian and Sri Lankan Tamil cuisines, it is generally eaten as a breakfast or a snack.
","Uttapam is a type of dosa from South India. Unlike a typical dosa, which is crisp and crepe-like, uttapam is a thick pancake, with toppings.
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
    $sub_category = array("north-indian","punjabi","rajisthani","south-indian");


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