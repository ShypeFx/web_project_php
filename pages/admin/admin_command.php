<?php
session_start();
include('../../config/database.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_user']) && !isset($_SESSION)) {
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
    $stmt = $conn->prepare("SELECT id_user, name, firstname, email FROM user");
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
<link rel="icon" href="../../images/logo_header.png">
<link rel="stylesheet" href="../../css/index.css?=<?php echo time(); ?>">
<link rel="stylesheet" href="../../css/admin.css?=<?php echo time(); ?>" media="screen" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<head>
    <title>Admin</title>
</head>
<body>
<header>
        <div class="topnav">
            <a href="../home/home_connected.php" >Home</a>
            <a href="../events/events.php">Events</a>
            <a href="../orders/orders.php">Orders <i class="bi bi-box-fill"></i></a>
            <?php if($_SESSION['role'] == "admin"){
                echo '<a class="active" href="../admin/admin_command.php">Admin</a>';
            }
            ?>
            <img src="../../images/logo_menu.png" class="img-menu">
            <div class="co_button">
                <a href="../account/account_page.php"><i class="bi bi-person-circle fa-2x"></i></a>
                <a href="../cart/cart.php"><i class="bi bi-cart3"></i></a>
            </div>
          </div>
</header>

    <h1>Admin Menu</h1>

    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php elseif (count($orders) === 0) : ?>
        <p>Aucune commande trouvée.</p>
    <?php else : ?>
        <table>
            <thead>
                <tr>
                    <th>id user</th>
                    <th>Name</th>
                    <th>firstname</th>
                    <th>email</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['id_user']; ?></td>
                        <td><?php echo $order['name']; ?></td>
                        <td><?php echo $order['firstname']; ?></td>
                        <td><?php echo $order['email']; ?></td>
                        <td>
                            <a href="../../config/admin_update_user.php?id_user=<?=$order['id_user']?>" class="btn-update"><i class="bi bi-sliders"></i></button></a>
                            <a href="../../config/admin_delete_user.php?id_user=<?=$order['id_user']?>" class="btn-delete"><i class="bi bi-person-x-fill"></i></button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
