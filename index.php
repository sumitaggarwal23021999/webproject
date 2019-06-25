<!doctype html>
<?php 
session_start();
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="stylesheet.css">

    <title>shobits page</title>
  </head>
  <body>
<?php

include 'Navigator.php';

?>
<div class="container" style="margin-top: 100px;">
  <div class="panel panel-default">

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

<div class="container-fluid mt-5">
  <h2 style="color:DodgerBlue;">Breakfast</h2>
  <div class="row">
    <div class="card col-lg-3 " style="width: 18rem;">
      <img src="dessert.jpg" height="300px" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Desserts</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="desserts.php" class="btn btn-primary">Go Now</a>
     </div>
    </div>

    <div class="card col-lg-3 " style="width: 18rem;">
      <img src="snacks.jpg"  height="300px" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Snacks</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="snacks.php" class="btn btn-primary">Go Now</a>
      </div>
    </div>

    <div class="card col-lg-3" style="width: 18rem;">
      <img src="drinks.jpg"  height="300px" class="card-img-top" alt="...">
      <div class="card-body">
       <h5 class="card-title">Drinks</h5>
       <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
       <a href="drinks.php" class="btn btn-primary">Go Now</a>
      </div>
    </div>

    <div class="card col-lg-3 " style="width: 18rem;">
     <img src="meals.jpg" height="300px" class="card-img-top" alt="...">
      <div class="card-body">
       <h5 class="card-title">Full Course Meal</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="meals.php" class="btn btn-primary">Go Now</a>
     </div>
    </div>
</div>
</div>
<br/>
<div class="container-fluid">
  <h2 style="color:DodgerBlue;">Continental Cuisine</h2>

    <div class="row">
      <div class="card col-lg-3 " style="width: 18rem;">
       <img src="indian.jpg" height="300px" class="card-img-top" alt="...">
       <div class="card-body">
         <h5 class="card-title">Indian cuisine</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         <a href="indian cuisine.php" class="btn btn-primary">Go Now</a>
        </div>
      </div>

      <div class="card col-lg-3 " style="width: 18rem;">
        <img src="Chinese.jpg" height="300px" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Chines cuisine</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           <a href="chines cuisine.php" class="btn btn-primary">Go Now</a>
       </div>
     </div>

     <div class="card col-lg-3 " style="width: 18rem;">
        <img src="Italian.jpg" height="300px" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Italian cuisine </h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           <a href="Italian cuisine.php" class="btn btn-primary">Go Now</a>
       </div>
     </div>

     <div class="card col-lg-3 " style="width: 18rem;">
        <img src="max.jpg" height="300px" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Mexican cuisine</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           <a href="Mexican cuisine.php" class="btn btn-primary">Go Now</a>
       </div>
     </div>
    </div>
  </div>
  <footer class="footer" style="height: 100px; background-color: red;">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav navbar-right mr-auto" id="navbar">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">My Order</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="login.phpF">Login/SignUp</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>