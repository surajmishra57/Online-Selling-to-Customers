<?php
session_start();
if (!isset($_SESSION['is_auth'])) {
    echo "<script> location.href='./login_page.php';</script>";
}
$id = $_GET['id'];

$ename = $_SESSION['rEmail'];
$qyt = 1;
include_once('./dbconnection.php');
$s = "INSERT INTO my_cart(product_id,r_email,Qyt) VALUES('$id','$ename','$qyt')";
if ($conn->query($s)) {
    echo "<script> location.href='./deshbord.php';</script>";
} else {
    echo "SERVER ERROR 500";
}
