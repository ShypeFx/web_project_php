<?php
session_start();
include('database.php');

    $id_user = $_SESSION['id_user'];
    $title = $_POST['title'];
    $city = $_POST['city'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $nbplace = $_POST['nbplace'];

    
    $sql = "INSERT INTO event (id_user, name_event, city, date_event, price, description, image_event, nb_place_available, nb_place_left )
    VALUES ( '$id_user', '$title', '$city ', '$date', '$price', '$description', '$image', '$nbplace',0)";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: ../pages/events/events.php');
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    ?>
