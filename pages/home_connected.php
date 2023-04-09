<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../css/index.css" media="screen" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
 </head>
 <body style='background:#fff;'>
 <div id="content">

<?php
session_start();
if( isset($_SESSION['logged-in']) != true) {
    header('Location: ../config/logout.php');
}else{
    include('../lib/header.php');
?>

    <main>
    <h1> Bonjour <?php echo $_SESSION['username'] ?></h1>
    <h1> Role :  <?php echo $_SESSION['role'] ?></h1>
    <h1> ID_USEr :  <?php echo $_SESSION['id_user'] ?></h1>

    </main>
<?php
echo '<a href="../config/logout.php">Déconnexion</a>';
}

?>
 
 </div>
 </body>
</html>