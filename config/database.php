<?php 

$db_username = 'tbeaudoin';
$db_password = 'Projetweb2022';
$db_name = 'projet_web';
$db_host = 'db4free.net:3306';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>