<?php
    if(isset($_GET['id'])){
        include_once('../config/connect.php');
        $id = $_GET['id'];
        $sql = "DELETE FROM product WHERE prd_id = $id";
        mysqli_query($con, $sql);
        header("location:index.php?page_layout=product");
    }
    
?>