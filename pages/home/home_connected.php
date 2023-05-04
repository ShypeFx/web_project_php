<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../../css/index.css?=<?php echo time(); ?>" media="screen" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
 </head>
 <body style='background:#fff;'>
 <div id="content">

 <header>
        <div class="topnav">
            <a class="active" href="./home_connected.php" >Home</a>
            <a href="../events/events.php">Events</a>
            <a href="#contact">Menu</a>
            <div class="co_button">
                <a href="../account/account_page.php"><i class="bi bi-person-circle fa-2x"></i></a>
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



<?php
echo '<a href="../../config/logout.php">Déconnexion</a>';
}

?>
 
 </div>
 </body>
</html>