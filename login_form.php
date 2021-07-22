<?php

require_once("./dbconnection.php");

if (!isset($_SESSION['is_login'])) {
    if (isset($_REQUEST['r_Login'])) {
        $rEmail = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
        $rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));
        $sql = "SELECT r_email,r_password,f_name FROM user WHERE r_email = '" . $rEmail . "' AND r_password = '" . $rPassword . "' limit  1";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            if ($_REQUEST['rember'])
                $_SESSION['is_login'] = true;
            $_SESSION['rEmail'] = $rEmail;
            $r_data = $result->fetch_assoc();
            $_SESSION['rName'] = $r_data['f_name'];
            $_SESSION['is_auth'] = true;
            echo "<script> location.href='./deshbord.php';</script>";
        } else {
            $regmsg = '<div class="alert alert-danger mt-2 mb-2" role ="alert">Enter Valid Usernam and Password </div>';
        }
    }
} else {
    echo "<script> location.href='./deshbord.php';</script>";
}
?>


<div class="row justify-content-center">
    <div class="col-sm-6">
        <div class="mt-5 mb-5">
            <h3 class="text-center mb-5">Login Page</h3>
            <form action="" class="shadow-lg p-4" method="post">
                <?php
                if (isset($regmsg)) {
                    echo $regmsg;
                }
                ?>
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="email" style="font-weight:bold;" class="pl-2"> Email*</label>
                    <input type="email" name="rEmail" id="" class="form-control" placeholder="Email" required>
                    <small class="form-text">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group mt-2">
                    <i class="fas fa-key"></i><label for="password" style="font-weight:bold;" class="pl-2"> Password*</label>
                    <input type="password" name="rPassword" id="" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group mt-2">
                    <input type="checkbox" name="rember" style="border : 1px solid lightgray;"><small class="form-text"> Rember me</small>

                </div>
                <button type="submit" class="btn btn-outline-success mt-3 btn-block" style="font-weight : bold" name="r_Login">Login</button>
                <?php
                if (isset($regmsg)) {
                    echo $regmsg;
                }
                ?>
            </form>
            <div class="text-center"><a href="registration_page.php" class="btn btn-success mt-4 mb-5 shadow-sm" style="font-weight : bold">Create An Account</a></div>
        </div>
    </div>