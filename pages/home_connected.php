<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../css/index.css" media="screen" type="text/css" />
 </head>
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
            <a class="active" href="./home_connected.php">Accueil</a>
            <a href="./events/events_page.php">Events</a>
            <a href="#contact">Contact</a>
            <div class="co_button">
                <a href="./account_page.php">Compte</a>
            </div>
          </div>
    </header>
    <main>
    <h1> Bonjour <?php echo $_SESSION['username'] ?></h1>
    </main>
<?php
echo '<a href="../php/logout.php">Déconnexion</a>';
}

?>
 
 </div>
 </body>
</html>