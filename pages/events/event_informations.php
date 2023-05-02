<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../../css/event_informations.css" media="screen" type="text/css" /> </head>
 <link rel="stylesheet" href="../../css/index.css" media="screen" type="text/css" /> </head>
 <body style='background:#fff;'>
 <div id="content">

<?php
session_start();
include('../../config/database.php');
include('../../config/inactive_disconnect.php');
$pdo = pdo_connect_mysql();


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
if (isset($_GET['id_event'])) {
    $stmt = $pdo->prepare('SELECT * FROM event WHERE id_event = ?');
    $stmt->execute([$_GET['id_event']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if($_SESSION['role'] === "admin"){
        ?>
        <form method="POST">
            <a href="../../config/delete_event.php?id_event=<?=$_GET['id_event']?>" class="button">Delete</a>
        </form>
        <a href="./events_page.php" class="button">Retour</button></a>
    <div class="product content-wrapper">
        <img src="<?=$product["image_event"]?>" class="image">
        <div>
            <h1 class="name"><?=$product["name_event"]?></h1>
            <span class="price">
                &dollar;<?=$product["price"]?>
            </span>
            <div class="description">
                <?=$product["city"]?>
            </div>
        </div>
    </div>
</main>
    <?php 
    }
} else {
    exit('Product does not exist!');
}
}

?>