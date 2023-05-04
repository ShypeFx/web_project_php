<?php
include('database.php');

    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO user (name, firstname, email, username, password)
    VALUES ('$name', '$firstname', '$email', '$username', '" .md5($password)."')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: ../pages/home/login_page.php');
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    ?>
