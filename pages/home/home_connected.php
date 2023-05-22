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
 </head>
 <body style='background:#fff;'>
 <div id="content">

<header>
        <div class="topnav">
            <a class="active" href="./home_connected.php" >Home</a>
            <a href="../events/events.php">Events</a>
            <a href="../orders/orders.php">Orders <i class="bi bi-box-fill"></i></a>
            <?php if($_SESSION['role'] == "admin"){
                echo '<a href="../admin_command.php">Admin</a>';
            }
            ?>
            <img src="../../images/logo_menu.png" class="img-menu">
            <div class="co_button">
                <a href="../account/account_page.php"><i class="bi bi-person-circle fa-2x"></i></a>
                <a href="../cart/cart.php"><i class="bi bi-cart3"></i></a>
            </div>
          </div>
</header>

<style>
    .carousel {
      width: 400px;
      height: 300px;
      position: relative;
      overflow: hidden;
    }

    .carousel img {
      width: 100%;
      height: 100%;
      position: absolute;
      transition: opacity 1s ease-in-out;
    }

    @keyframes imageAnimation {
      0% {
        opacity: 0;
      }
      20% {
        opacity: 1;
      }
      33% {
        opacity: 1;
      }
      53% {
        opacity: 0;
      }
    }
  </style>
</head>
<body>
  <div class="carousel">
    <img src="../../images/image_test.jpg" alt="Image 1">
    <img src="../../images/tickesme.png" alt="Image 2">
  </div>

  <script>
    // Change image every 10 seconds
    setInterval(changeImage, 10000);

    function changeImage() {
      var carousel = document.querySelector('.carousel');
      var currentImage = carousel.querySelector('img:not([style*="opacity: 0"])');
      var nextImage = currentImage.nextElementSibling || carousel.firstElementChild;

      currentImage.style.animation = 'imageAnimation 10s ease-in-out';
      nextImage.style.animation = 'imageAnimation 10s ease-in-out';

      setTimeout(function() {
        currentImage.style.opacity = '0';
        nextImage.style.opacity = '1';
        currentImage.style.animation = '';
        nextImage.style.animation = '';
      }, 1000);
    }
  </script>










<?php
}

?>
 
 </div>
 </body>
</html>