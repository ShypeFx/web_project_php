<?php  

include('database.php');

  foreach ($_SESSION['cart'] as $item) {
    $id_event = $item['id'];
    $id_user = $_SESSION['id_user'];
    $command_name = $item['name'];
    $quantity = $item['quantity'];
    $price = calculateTotal();
    $timestamp = time();
    $currentDate = gmdate('Y-m-d h:i', $timestamp);
    $date_time = $currentDate;
  }

  function calculateNbPlace(){
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = intval($item['nb_place_left']) - intval($item['quantity']);
        $total += $subtotal;
    }
    return $total;
} 
$nb_place = calculateNbPlace();  

  $sql = "UPDATE event SET nb_place_left = '$nb_place' WHERE id_event = '$id_event'";
    
    if ($conn->query($sql) === TRUE) {
        echo "working well";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>