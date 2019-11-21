<?php
    $con = mysqli_connect('localhost','root','','dtb');
    if($con){
        mysqli_query($con, "SET NAMES 'utf8'");
    }else{
        die('Ket noi that bai.');
    }
?>