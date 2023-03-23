<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="./event.css" media="screen" type="text/css" /> </head>
 <body style='background:#fff;'>
 <div id="content">

<?php
session_start();
if( isset($_SESSION['logged-in']) != true) {
    header('Location: ../php/logout.php');
}else{
?>
    <header>
        <div class="topnav">
            <a href="../home_connected.php">Accueil</a>
            <a class="active"  href="./events_page.php">Events</a>
            <a href="#contact">Contact</a>
            <div class="co_button">
                <a href="../account_page.php">Compte</a>
            </div>
          </div>
    </header>
<?php
include('cards.php');
}

?>
 
 </div>
 </body>
</html>