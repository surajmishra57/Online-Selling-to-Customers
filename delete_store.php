<?php

    $id = $_GET['id'];
    include_once('./dbconnection.php');
    $s="DELETE FROM product_tb WHERE product_id='" . $id . "'";
    if($conn->query($s))
    {
        echo "<script> location.href='./admin_my_store.php';</script>";
    }
    else{
        echo "SERVER ERROR 500";
    }
