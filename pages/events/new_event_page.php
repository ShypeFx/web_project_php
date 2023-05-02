<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="../../css/new_event.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>

  <?php
session_start();
if( $_SESSION['role'] != "admin") {
    header('Location: ../../config/logout.php');
}
?>


  <body>
    <main>
         <a href="./events_page.php"><button> Retour </button></a>
        <h1 style="text-align: center;"> Créer un event </h1>
        <div class="formulaire">
            <form action="../config/add_event.php" method="post">
                <p>Titre : <input type="text" name="title" /></p>
                <p>City : <input type="text" name="city" /></p>
                <p>Date :  <input type="date" name="date" /></p>
                <p>Prix : <input type="text" name="price" /></p>
                <p>Image : <input type="text" value="events-images/"name="image" /></p>
                <p>Nombre de place : <input type="text" name="nbplace" /></p>
                <p><input type="submit" /></p>
                </form>
        </div>

    </main>
	<script src="index.js"></script>
  </body>
</html>