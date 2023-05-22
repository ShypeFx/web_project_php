<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../css/event_informations.css?=<?php echo time(); ?>">
<link rel="stylesheet" href="../../css/index.css?=<?php echo time(); ?>" media="screen" type="text/css" /> </head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
            <a href="../orders/orders.php">Orders <i class="bi bi-box-fill"></i></a>
            <?php if($_SESSION['role'] == "admin"){
                echo '<a href="../admin_command.php">Admin</a>';
            }
            ?>
            <img src="../../images/logo_menu.png" class="img-menu">
            <div class="co_button">
                <a href="../account/account_page.php"><i class="bi bi-person-circle fa-2x"></i></a>
                <a href="../cart/cart.php"><i class="bi bi-cart3"></i></a>
            </div>
          </div>
</header>
    <a href="./events.php" class="btn-back">Retour</button></a>
<?php
if (isset($_GET['id_event'])) {
    $stmt = $pdo->prepare('SELECT * FROM event WHERE id_event = ?');
    $stmt->execute([$_GET['id_event']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if($product){

    
?>
	<div class="card">
        <img src="<?=$product["image_event"]?>" class="image">
        <div class="container">
            <h2><?=$product["name_event"]?></h2>
            <p><strong>Description : </strong><?=$product["description"]?></p>
		    <p><strong>City : </strong><?=$product["city"]?></p>
		    <p><strong>Price : </strong><?=$product["price"]?>€</p>
            <p><strong> Available places : </strong>
                <span style="color: green"><?=$product["nb_place_left"]?></span> /
                <span style="color: red"><?=$product["nb_place_available"]?></span>
            <p><strong>Date : </strong><?=$product["date_event"]?></p>
        </div>
        <?php if($product["nb_place_left"] > 1){ ?>
            <a href="../../config/add_to_cart.php?id_event=<?$_GET['id_event']?>" class="btn-buy">Buy</button></a>
        <?php
        }else{
            echo '<a class="btn-soldout">Sold Out</button></a>';
        }
        ?>
            
            <?php if($_SESSION['role'] === "admin"){ ?>
                <a href="./update_event_page.php?id_event=<?=$_GET['id_event']?>" class="btn-update">Update</button></a>
                <a href="../../config/delete_event.php?id_event=<?=$_GET['id_event']?>" class="btn-delete">Delete</button></a>
            <?php 
            } 
            ?>
	</div>
</main>
<?php 
    }
    else {
        header('Location: ./events.php');
    }
} else {
    header('Location: ./events.php');
}
}

?>