<?php 

$db_username = 'root';
$db_password = '';
$db_name = 'projet_web';
$db_host = 'localhost';
function pdo_connect_mysql() {
    global $db_host;
    global $db_username;
    global $db_password;
    global $db_name;

    try {
    	return new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_username, $db_password);
    } catch (PDOException $exception) {
    	exit('Failed to connect to database!');
    }
}

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




?>