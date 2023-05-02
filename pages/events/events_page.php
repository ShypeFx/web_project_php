<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../../css/event.css" media="screen" type="text/css" /> </head>
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
            <a href="../home/home_connected.php">Accueil</a>
            <a class="active"  href="./events_page.php">Events</a>
            <a href="#contact">Contact</a>
            <div class="co_button">
                <a href="../account/account_page.php">Compte</a>
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