<?php
session_start();

// Vérifier si le panier existe dans la session
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

// Database connection details
include('../../config/database.php');


try {
    // Créer une connexion PDO à la base de données
    $conn = pdo_connect_mysql();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparer la requête SQL pour insérer la commande dans la table "commande"
    $stmt = $conn->prepare('INSERT INTO commande (id_event, id_user, commande_name, quantity, price, date_time) VALUES (:id_event, :id_user, :command_name, :quantity, :price, :date_time)');

    // Parcourir les articles du panier et insérer les valeurs dans la table "commande"
    foreach ($_SESSION['cart'] as $item) {
        $id_event = $item['id'];
        $id_user = $_SESSION['id_user'];
        $command_name = $item['name'];
        $quantity = $item['quantity'];
        $price = calculateTotal();
        $date_time = date('d-m-y h:i:s');

        // Lier les paramètres
        $stmt->bindParam(':id_event', $id_event);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':command_name', $command_name);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':date_time', $date_time);

        // Exécuter la requête
        $stmt->execute();
    }

    // Vider le panier
    $_SESSION['cart'] = array();

    // Afficher le message de succès
    $success_message = 'Votre commande a été passée avec succès !';
} catch(PDOException $e) {
    // Afficher le message d'erreur
    $error_message = 'Une erreur est survenue lors du traitement de votre commande.';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thanks you for your order !</title>
</head>
<body>
    <h1>Finaliser la commande</h1>

    <?php if (isset($success_message)) : ?>
        <p><?php echo $success_message; ?></p>
    <?php elseif (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
</body>
</html>

<?php 

function calculateTotal(){
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = intval($item['price']) * intval($item['quantity']);
        $total += $subtotal;
    }
    return $total;
}

?>