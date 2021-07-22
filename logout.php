<?php 
    session_start();
    session_unset();
    echo "<script> location.href='./login_page.php';</script>";
