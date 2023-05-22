<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../css/index.css?=<?php echo time(); ?>">
<link rel="stylesheet" href="../../css/cart.css?=<?php echo time(); ?>" media="screen" type="text/css" /> </head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<?php
session_start();
include('../../config/inactive_disconnect.php');

// Check if the cart array exists in the session, if not, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add an item to the cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];

    $item = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => $quantity
    );

    $_SESSION['cart'][] = $item;
}

// Remove an item from the cart
if (isset($_GET['remove_item'])) {
    $index = $_GET['remove_item'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

// Clear the cart
if (isset($_GET['clear_cart'])) {
    $_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html>
<header>
        <div class="topnav">
            <a href="../home/home_connected.php" >Home</a>
            <a href="../events/events.php">Events</a>
            <a href="../orders/orders.php">Orders <i class="bi bi-box-fill"></i></a>
            <?php if($_SESSION['role'] == "admin"){
                echo '<a href="../admin/admin_command.php">Admin</a>';
            }
            ?>
            <img src="../../images/logo_menu.png" class="img-menu">
            <div class="co_button">
                <a href="../account/account_page.php"><i class="bi bi-person-circle fa-2x"></i></a>
                <a class="active" href="cart.php"><i class="bi bi-cart3"></i></a>
            </div>
            
          </div>
</header>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>

    <?php if (empty($_SESSION['cart'])) : ?>
        <p>Your cart is empty.</p>
    <?php else : ?>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $index => $item) : ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['price']; ?> €</td>
                        <td>
                        <form method="post">
                            <input type="submit" name="button1" formaction="cart.php?id=<?php echo $index ?>" class="button" value=" - " />
                            <?php echo $item['quantity'];?>
                            <input type="submit" name="button2" formaction='cart.php?id=<?php echo $index ?>' class="button" value=" + " />
                        </form>
                        </td>
                        <td><a href="cart.php?remove_item=<?php echo $index; ?>"><button class="remove">Remove</button></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="footer_cart">
            <p>Total: <?php echo calculateTotal(); ?>€</p>
            <a href="cart.php?clear_cart=true"><button>Clear Cart</button></a>
        </div>
        <a href="final_cart.php"><button class="btn_commande"><h2>Commander</h2></button></a>
    <?php endif; ?>

    <?php
    function calculateTotal(){
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal = intval($item['price']) * intval($item['quantity']);
            $total += $subtotal;
        }
        return $total;
    }

    if(array_key_exists('button1', $_POST)) {
        remove_value();
    }
    else if(array_key_exists('button2', $_POST)) {
        adding_value();
    }
    function remove_value() {
            if($_SESSION['cart'][$_GET['id']]['quantity'] > 0){
                $_SESSION['cart'][$_GET['id']]['quantity']--;
            }else{
                echo "Impossible la valeur est inferieur à 0";
            }
    }
    function adding_value() {
        $_SESSION['cart'][$_GET['id']]['quantity']++;
    }
    ?>
</body>
</html>
