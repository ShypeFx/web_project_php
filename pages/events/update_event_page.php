<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Event</title>
    <link rel="stylesheet" href="../../css/update_event.css">
    <link rel="icon" href="../../images/logo_header.png">
  </head>

  <?php
session_start();
include('../../config/database.php');
if( $_SESSION['role'] != "admin") {
    header('Location: ../../config/logout.php');
}else{
    $pdo = pdo_connect_mysql();
    if (isset($_GET['id_event'])) {
        $stmt = $pdo->prepare('SELECT * FROM event WHERE id_event = ?');
        $stmt->execute([$_GET['id_event']]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);    
    }
}
?>
  <body>
    <main>
         <a href="./event_informations.php?id_event=<?=$_GET['id_event']?>"><button> Back </button></a>
        <h1 style="text-align: center;"> Update the event </h1>
        <div class="formulaire">
            <form action="../../config/update_event.php?id_event=<?=$_GET['id_event']?>" method="post">
                <p> Title : <input value="<?=$product["name_event"]?>" name="title"></p>
                <p> Description : <input value="<?=$product["description"]?>" name="description"></p>
                <p> City : <input value="<?=$product["city"]?>" name="city"></p>
                <p> Price : <input value="<?=$product["price"]?>" name="price"></p>
                <p> Date : <input value="<?=$product["date_event"]?>" name="date"></p>
                <p> Available Places : <input value="<?=$product["nb_place_available"]?>" name="nb_available"></p>
                <p> Left Places : <input value="<?=$product["nb_place_left"]?>" name="nb_left"></p>
                <p><input type="submit"/></p>
                </form>
        </div>

    </main>
	<script src="index.js"></script>
  </body>
</html>