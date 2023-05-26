<?php
  include('./database.php');
  include('./inactive_disconnect.php');
  
  
  $pdo = pdo_connect_mysql();

  if (isset($_GET['id_user'])) {
    $stmt = $pdo->prepare('DELETE FROM user WHERE id_user = ?');
    $stmt->execute([$_GET['id_user']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt) {
        echo 'Utilisateur supprimé';
        header('Location: ../pages/admin/admin_command.php');
    } else {
        header('Location: ../pages/admin/admin_command.php');
        }
    }

?>