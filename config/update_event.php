<?php
  include('./database.php');
  include('./inactive_disconnect.php');
  
  $id_event = $_GET['id_event'];

  $title = $_POST['title'];
  $city = $_POST['city'];
  $date = $_POST['date'];
  $description = $_POST['description'];
  $price= $_POST['price'];
  $nbavailable= $_POST['nb_available'];
  $nbleft= $_POST['nb_left'];

  $sql = "UPDATE event SET name_event = '$title', city = '$city', date_event = '$date', price = '$price', description = '$description', nb_place_available = '$nbavailable', nb_place_left = '$nbleft'  WHERE id_event = '$id_event'";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: ../pages/events/event_informations.php?id_event='.$_GET['id_event'].'');    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>