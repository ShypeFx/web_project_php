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
    <main>

    <div class="card">
        <img src="image.jpg" alt="Image">
        <div class="card-body">
            <h3 class="card-title">Card Title</h3>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>


    </main>
<?php
echo '<a href="./../php/logout.php">Déconnexion</a>';
}

?>
 
 </div>
 </body>
</html>