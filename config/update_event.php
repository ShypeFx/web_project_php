<?php
  include('./database.php');
  include('./inactive_disconnect.php');
  
  
  $pdo = pdo_connect_mysql();

  if (isset($_GET['id_event'])) {
    $stmt = $pdo->prepare('DELETE FROM event WHERE id_event = ?');
    $stmt->execute([$_GET['id_event']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        header('Location: ../pages/events/events_informations.php?action=deleted');
        echo 'Event supprimé';
    } else {
        header('Location: ../pages/events/events_informations.php?action=deleted');
        }
    }

?>