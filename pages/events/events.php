<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../../css/index.css?=<?php echo time(); ?>" media="screen" type="text/css" /> </head>
 <link rel="stylesheet" href="../../css/event.css?=<?php echo time(); ?>" media="screen" type="text/css" /> </head>
 <body style='background:#fff;'>
 <div id="content">

<?php
session_start();
include('../../config/inactive_disconnect.php');

// hide the loader once the request is completed
if( isset($_SESSION['logged-in']) != true) {
    header('Location: ../../config/logout.php');
}else{
?>
 <header>
        <div class="topnav">
            <a href="../home/home_connected.php" >Home</a>
            <a class="active" href="./events.php">Events</a>
            <a href="#contact">Admin</a>            
            <div class="co_button">
                <a href="../account/account_page.php"><i class="bi bi-person-circle fa-2x"></i></a>
                <a href="../cart/cart.php"><i class="bi bi-cart3"></i></a>
            </div>
            </div>
          </div>
</header>
<?php
    if($_SESSION['role'] === "admin"){
        echo '<a href="./new_event_page.php" class="button_event">Ajouter un évenement</a>';
    }
include('cards.php');
}

?>
 
 </div>
 </body>
</html>