<?php
    session_start();

    if(isset($_SESSION['logged-in']) == true){
        unset($_SESSION['username']);
        unset($_SESSION['logged-in']);
        session_destroy();
        echo "test";
        header('Location: ../pages/login_page.php');
        exit;
    }else{
        header('Location: ../pages/login_page.php');
        exit;
    }
?>