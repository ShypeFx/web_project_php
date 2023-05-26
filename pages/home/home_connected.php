<?php
session_start();
include('../../config/inactive_disconnect.php');
if( isset($_SESSION['logged-in']) != true) {
    header('Location: ../../config/logout.php');
}else{
?>


<html>
 <head>
 <meta charset="utf-8">
  <link rel="stylesheet" href="../../css/home.css?=<?php echo time(); ?>" media="screen" type="text/css" /> 
  <link rel="stylesheet" href="../../css/index.css?=<?php echo time(); ?>" media="screen" type="text/css" /> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="icon" href="../../images/logo_header.png">
 </head>
 <body style='background:#fff;'>
 <div id="content">
  

 <head>
    <title>Tickesme</title>
</head>

<header>
        <div class="topnav">
            <a class="active" href="./home_connected.php" >Home</a>
            <a href="../events/events.php">Events</a>
            <a href="../orders/orders.php">Orders <i class="bi bi-box-fill"></i></a>
            <?php if($_SESSION['role'] == "admin"){
                echo '<a href="../admin/admin_command.php">Admin</a>';
            }
            ?>
            <img src="../../images/logo_menu.png" class="img-menu">
            <div class="co_button">
                <a href="../account/account_page.php"><i class="bi bi-person-circle fa-2x"></i></a>
                <a href="../cart/cart.php"><i class="bi bi-cart3"></i></a>
            </div>
          </div>
</header>



<div class="slide-container">
      <div class="custom-slider fade">
        <img class="slide-img" src="../../images/welcome_tickesme.jpg">
      </div>
      <div class="custom-slider fade">
        <img class="slide-img" src="../../images/promotion_tickesme.jpg">
      </div>
      <div class="custom-slider fade">
        <img class="slide-img" src="../../images/last_event.jpg">
      </div>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <div class="slide-dot">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
</div>



<div class="blank-square"></div>


<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("custom-slider");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

</script>




<?php
}

?>
 
 </div>
 </body>
</html>