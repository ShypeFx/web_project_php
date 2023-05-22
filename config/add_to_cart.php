<?php
  include('database.php');
  include('inactive_disconnect.php');
  
  session_start();

// Add an item to the cart
if (isset($_GET['id_event'])) {

    $id_event = $_GET['id_event'];
    $sql = "SELECT * FROM event WHERE id_event = '$id_event'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $product_id = $row['id_event'];
        $product_name = $row['name_event'];
        $product_price = $row['price'];
        $quantity = 1;
        $nb_place_left = $row['nb_place_left'];
        // Put data in the session
        $item = array(
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => $quantity,
            'nb_place_left' => $nb_place_left
        );

        $_SESSION['cart'][] = $item;
        
        echo "New record created successfully";
        header('Location: ../pages/cart/cart.php');

      }
    } 
    }
    else{
        echo "error";
    }
    $conn->close();
?>