<?php
$id = $_GET['id'];
require_once('./dbconnection.php');
$s = "DELETE FROM my_cart WHERE cart_id= '" . $id . "'";
if ($conn->query($s)) {
    echo "<script> location.href='./mycart.php';</script>";
} else {
    echo "SERVER ERROR : 500";
}
