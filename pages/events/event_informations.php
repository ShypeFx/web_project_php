<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../../css/event_informations.css?v=<?php echo time(); ?>">
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
            <a href="../home/home_connected.php" >Home</a>
            <a class="active" href="./events.php">Events</a>
            <a href="#contact">Menu</a>
            <div class="co_button">
                <a href="../account/account_page.php"><i class="bi bi-person-circle fa-2x"></i></a>
            </div>
          </div>
</header>
    <a href="./events.php" class="btn-back">Retour</button></a>
<?php
if (isset($_GET['id_event'])) {
    $stmt = $pdo->prepare('SELECT * FROM event WHERE id_event = ?');
    $stmt->execute([$_GET['id_event']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
?>
	<div class="card">
        <img src="<?=$product["image_event"]?>" class="image">
        <div class="container">
            <h2>Artiste : <?=$product["name_event"]?></h2>
            <p><strong>Description : </strong><?=$product["description"]?></p>
		    <p><strong>Ville : </strong><?=$product["city"]?></p>
		    <p><strong>Prix : </strong><?=$product["price"]?>€</p>
            <p><strong> Place disponible : </strong>
                <span style="color: green"><?=$product["nb_place_left"]?></span> /
                <span style="color: red"><?=$product["nb_place_available"]?></span>
        </div>

            <a href="../../config/buy_event.php?id_event=<?=$_GET['id_event']?>" class="btn-buy">Buy</button></a>
            <?php if($_SESSION['role'] === "admin"){ ?>
                <a href="./update_event_page.php?id_event=<?=$_GET['id_event']?>" class="btn-update">Update</button></a>
                <a href="../../config/delete_event.php?id_event=<?=$_GET['id_event']?>" class="btn-delete">Delete</button></a>
            <?php 
            } 
            ?>
	</div>



</main>
    <?php 
    
} else {
    exit('Product does not exist!');
}
}

?>