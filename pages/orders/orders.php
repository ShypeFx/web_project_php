<?php
session_start();
include('../../config/database.php');
include('../../config/inactive_disconnect.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_user'])) {
    header('Location: ../home/login_page.php');
    exit();
}

// Récupérer l'identifiant de l'utilisateur connecté
$id_user = $_SESSION['id_user'];

// Database connection detail

try {
    // Créer une connexion PDO à la base de données
    $conn = pdo_connect_mysql();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Préparer la requête SQL pour récupérer les commandes de l'utilisateur connecté
    $stmt = $conn->prepare("SELECT id_commande, commande_name, price, quantity, date_time FROM commande WHERE id_user = '$id_user'");
    // Exécuter la requête
    $stmt->execute();
    // Récupérer les résultats de la requête
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // Afficher le message d'erreur
    $error_message = 'Une erreur est survenue lors de la récupération des commandes.';
}
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="../../css/index.css?=<?php echo time(); ?>">
<link rel="stylesheet" href="../../css/orders.css?=<?php echo time(); ?>" media="screen" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<head>
    <title>Mes Commandes</title>
</head>
<body>
<header>
        <div class="topnav">
            <a href="../home/home_connected.php" >Home</a>
            <a href="../events/events.php">Events</a>
            <a class="active"  href="orders.php">Orders <i class="bi bi-box-fill"></i></a>
            <?php if($_SESSION['role'] == "admin"){
                echo '<a href="../admin/admin_command.php">Admin</a>';
            }
            ?>
            <img src="../../images/logo_menu.png" class="img-menu">
            <div class="co_button">
                <a href="../account/account_page.php"><i class="bi bi-person-circle fa-2x"></i></a>
                <a href="../cart/cart.php"><i class="bi bi-cart3"></i></a>
            </div>
          </div>
</header>

    <h1>Mes Commandes</h1>

    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php elseif (count($orders) === 0) : ?>
        <p>Aucune commande trouvée.</p>
    <?php else : ?>
        <table>
            <thead>
                <tr>
                    <th>ID Commande</th>
                    <th>Nom de la Commande</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['id_commande']; ?></td>
                        <td><?php echo $order['commande_name']; ?></td>
                        <td><?php echo $order['price'] ."€"; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo $order['date_time']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
