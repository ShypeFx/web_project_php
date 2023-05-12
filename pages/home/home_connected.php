<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../../css/index.css?=<?php echo time(); ?>" media="screen" type="text/css" />
 <link rel="stylesheet" href="../../css/home.css?=<?php echo time(); ?>" media="screen" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
 </head>
 <body style='background:#fff;'>
 <div id="content">

 <header>
        <div class="topnav">
            <a class="active" href="./home_connected.php" >Home</a>
            <a href="../events/events.php">Events</a>
            <a href="#contact">Admin</a>
            <div class="co_button">
                <a href="../account/account_page.php"><i class="bi bi-person-circle fa-2x"></i></a>
                <a href="../cart/cart.php"><i class="bi bi-cart3"></i></a>
            </div>
          </div>
</header>

<?php
session_start();
include('../../config/inactive_disconnect.php');
if( isset($_SESSION['logged-in']) != true) {
    header('Location: ../../config/logout.php');
}else{
?>

<div class="container">
    <h1>EventBride.com</h1>
    <p>Welcome to my website, where you can find information about our services and products.</p>
    
    <div class="card-container">
      <div class="card">
        <div><i class="bi bi-lock-fill bi-8x"></i></div>
        <h2>Safety</h2>
        <p>We prioritize the safety of our website and take necessary measures to protect against hacking. Your privacy is also important to us, and we only collect necessary data to provide our services.</p>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/300x200.png?text=Product+2" alt="Product 2">
        <h2>Quick</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae mi ut dolor laoreet volutpat. Donec gravida eros sed justo maximus, vitae varius dolor volutpat.</p>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/300x200.png?text=Product+3" alt="Product 3">
        <h2>First</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae mi ut dolor laoreet volutpat. Donec gravida eros sed justo maximus, vitae varius dolor volutpat.</p>
      </div>
    </div>
  </div>


<?php
}

?>
 
 </div>
 </body>
</html>