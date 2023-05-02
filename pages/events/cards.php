<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="./cards.css">
</head>
<body>

<section class="card-container">

<?php 
require_once("../../lib/dbcontroller.php");
include('../../config/inactive_disconnect.php');

$db_handle = new DBController();
$product_array = $db_handle->runQuery("SELECT * FROM event");
$index = 0;
if (!empty($product_array)) {
    if($index == 9){
        echo '<div class="row">';
    }
    foreach($product_array as $key=>$value){ ?>

    <article class="card">
        <header class="card__title">
            <h3><?php echo $product_array[$key]["name_event"]; ?></h3>
        </header>
        <figure class="card__thumbnail">
            <img src="<?php echo $product_array[$key]["image_event"]; ?>">
        </figure>
        <main class="card__description">
            <p class="card-text"><i class="bi bi-tags"></i><?php echo " à partir de ".$product_array[$key]["price"] . "€"; ?></p>
            <p class="card-text"><i class="bi bi-geo"></i><?php echo " " .$product_array[$key]["city"];?></p>
        </main>
        <form method="POST">
            <a href="event_informations.php?id_event=<?=$product_array[$key]['id_event']?>" class="button">Accéder aux places</a>
        </form>
    </article>
<?php
    }
}
?>

</section>


</body>
</html>
