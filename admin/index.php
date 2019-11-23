<?php
    session_start();
    define('SECURITY',1);
    include_once('../config/connect.php');
    if(isset($_SESSION['user_mail']) && isset($_SESSION['user_pass'])){
        include_once("admin.php");
    }else{
        include_once('login.php');
    }
    
?>