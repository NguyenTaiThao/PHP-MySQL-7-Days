<?php
    if(isset($_GET['id'])){
        $cur_id = $_GET['id'];
        $sql = "UPDATE order_list SET ord_status = 1 WHERE ord_id = $cur_id";
        $query = mysqli_query($con, $sql);
        if($query){
            header("location:index.php?page_layout=order");
        }
    }else{
        header("location:index.php?page_layout=order");
    }
?>