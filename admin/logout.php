<?php
    session_start();
    if(isset($_SESSION['user_mail']) && isset($_SESSION['user_pass'])){
        session_destroy();
    }
    header('location:login.php');
?>