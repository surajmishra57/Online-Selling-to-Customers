<?php
$user = "root";
$password = "";
$host = "localhost";
$dbname = "mystore";
$port = 3306;

$conn = new mysqli($host, $user, $password, $dbname, $port);
if ($conn->connect_error) {
    die("<div class='alert alert-danger mt-2' role ='alert'>$conn->connect_error</div>");
}
