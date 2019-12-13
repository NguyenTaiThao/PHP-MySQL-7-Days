<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]++;
        }else{
            $_SESSION['cart'][$id] = 1;
        }
        header("location:index.php?page_layout=cart");
    }else{
        header("location:index.php");
    }
?>