<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../../css/index.css?=<?php echo time(); ?>" media="screen" type="text/css" /> </head>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
 </head>
 <body style='background:#fff;'>
 <div id="content">

<?php
session_start();
include('../../config/inactive_disconnect.php');
if( isset($_SESSION['logged-in']) != true) {
    header('Location: ../../config/logout.php');
}else{
    ?>
 <header>
        <div class="topnav">
            <a  href="../home/home_connected.php" >Home</a>
            <a href="../events/events.php">Events</a>
            <a href="#contact">Menu</a>
            <div class="co_button">
                <a class="active" href="./account_page.php"><i class="bi bi-person-circle fa-2x"></i></a>
                <a href="../cart/cart.php"><i class="bi bi-cart3"></i></a>
            </div>
          </div>
</header>
    <main>
        <?php 
            include('../../config/database.php');
            $sql = "SELECT * FROM user where username = '".$_SESSION['username']."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h1> Id: " . $row["id_user"]. 
                         "</h1><h1> Name: " . $row["name"]. 
                         "</h1><h1> Email: " . $row["email"]. 
                         "</h1><h1> Username: " . $row["username"] ."</h1>";
                         echo '<a href="../../config/logout.php"><button class="button">Déconnexion</button></a>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        }?>
    </main>
 
 </div>
 </body>
</html>