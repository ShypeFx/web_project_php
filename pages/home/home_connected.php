<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../../css/index.css" media="screen" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
 </head>
 <body style='background:#fff;'>
 <div id="content">

 <header>
        <div class="topnav">
            <a class="active" href="./home_connected.php" >Accueil</a>
            <a href="../events/events_page.php">Events</a>
            <a href="#contact">Contact</a>
            <div class="co_button">
                <a href="../account/account_page.php">Compte</a>
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