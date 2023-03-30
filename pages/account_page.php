<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../css/index.css" media="screen" type="text/css" />
 </head>
 <body style='background:#fff;'>
 <div id="content">

<?php
session_start();
if( isset($_SESSION['logged-in']) != true) {
    header('Location: ../php/logout.php');
}else{
    include('../lib/header.php');
    ?>
    <main>
        <?php 
            include('../config/database.php');
            $sql = "SELECT * FROM user where username = '".$_SESSION['username']."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h1> Id: " . $row["id_user"]. 
                         "</h1><h1> Name: " . $row["name"]. 
                         "</h1><h1> Email: " . $row["email"]. 
                         "</h1><h1> Username: " . $row["username"] ."</h1>";
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