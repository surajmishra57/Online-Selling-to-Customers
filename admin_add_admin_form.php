<?php
include_once("./dbconnection.php");
if (isset($_REQUEST['a_Login'])) {
    $fname = trim($_REQUEST['a_fname']);
    $lname = trim($_REQUEST['a_lname']);
    $email = trim($_REQUEST['a_Email']);
    $password = trim($_REQUEST['a_Password']);
    $s = "SELECT ad_email FROM admin_tb WHERE ad_email='" . $email . "'";
    $result = $conn->query($s);
    if ($result->num_rows == 1) {
        $regmsg = '<div class="alert alert-danger mt-2" role ="alert" > Admin Already Registered </div>';
    } else {
        $sql = "INSERT INTO admin_tb(first_name,last_name,ad_email,ad_password) VALUES('$fname','$lname','$email','$password')";
        if ($conn->query($sql)) {
            $regmsg = '<div class="alert alert-success mt-2" role ="alert" > Admin Registerd Successfully </div>';
        } else {
            $regmsg = '<div class="alert alert-danger mt-2" role ="alert" > Unable To Create Admin </div>';
        }
    }
}

?>

<div class="row justify-content-center">
    <div class="col-sm-6">
        <div class="mt-5 mb-5">

            <form action="" class="shadow-lg p-4" method="post">
                <?php
                if (isset($regmsg)) {
                    echo $regmsg;
                }
                ?>
                <div class="form-group">
                    <label for="a_fname" style="font-weight:bold;" class="pl-2"><i class="fas fa-user"></i> First Name*</label>
                    <input type="text" name="a_fname" id="" class="form-control" placeholder="First Name" required>

                </div>
                <div class="form-group">
                    <label for="a_lname" style="font-weight:bold;" class="pl-2"><i class="fas fa-user"></i> Last Name*</label>
                    <input type="text" name="a_lname" id="" class="form-control" placeholder="Last Name" required>

                </div>
                <div class="form-group">
                    <label for="email" style="font-weight:bold;" class="pl-2"><i class="fas fa-at"></i> Email*</label>
                    <input type="email" name="a_Email" id="" class="form-control" placeholder="Email" required>

                </div>
                <div class="form-group mt-2">
                    <label for="a_password" style="font-weight:bold;" class="pl-2"><i class="fas fa-key"></i> Password*</label>
                    <input type="password" name="a_Password" id="" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-outline-success mt-3 btn-block" style="font-weight : bold" name="a_Login">Submit</button>
                <?php
                if (isset($regmsg)) {
                    echo $regmsg;
                }
                ?>
            </form>

        </div>
    </div>