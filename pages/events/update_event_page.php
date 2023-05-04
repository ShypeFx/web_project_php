<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="../../css/update_event.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
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
            <form action="../../config/update_event.php" method="post">
                <p> Title : <input value="<?=$product["name_event"]?>"></p>
                <p> Description : <input value="<?=$product["description"]?>"></p>
                <p> City : <input value="<?=$product["city"]?>"></p>
                <p> Price : <input value="<?=$product["price"]?>"></p>
                <p> Date : <input value="<?=$product["date_event"]?>"></p>
                <p><input type="submit"/></p>
                </form>
        </div>

    </main>
	<script src="index.js"></script>
  </body>
</html>