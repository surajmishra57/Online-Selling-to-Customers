<?php
include_once('./dbconnection.php');
if (isset($_REQUEST['a_Login'])) {
    $user = trim($_REQUEST['a_Email']);
    $password = trim($_REQUEST['a_old_Password']);
    $new_password = trim($_REQUEST['a_new_Password']);
    $sql = "SELECT ad_email,ad_password FROM admin_tb WHERE ad_email='" . $user . "' AND ad_password='" . $password . "'limit 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sql = "UPDATE admin_tb SET ad_password= '" . $new_password . "' WHERE ad_email='" . $user . "'";
        if ($conn->query($sql)) {
            $regmsg = '<div class="alert alert-success mt-2 mb-2" role ="alert">Password Has Been Changed </div>';
        } else {
            $regmsg = '<div class="alert alert-danger mt-2 mb-2" role ="alert">Unable To Change Password </div>';
        }
    } else {
        $regmsg = '<div class="alert alert-danger mt-2 mb-2" role ="alert">Enter Valid Usernam and Password </div>';
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
                    <label for="email" style="font-weight:bold;" class="pl-2"><i class="fas fa-user"></i> Email*</label>
                    <input type="email" name="a_Email" id="" class="form-control" placeholder="Email" required>

                </div>
                <div class="form-group mt-2">
                    <label for="password" style="font-weight:bold;" class="pl-2"><i class="fas fa-key"></i> Old Password*</label>
                    <input type="password" name="a_old_Password" id="" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group mt-2">
                    <label for="password" style="font-weight:bold;" class="pl-2"><i class="fas fa-key"></i> New Password*</label>
                    <input type="password" name="a_new_Password" id="" class="form-control" placeholder="Password" required>
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