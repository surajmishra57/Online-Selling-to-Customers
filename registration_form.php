<?php
include_once("./dbconnection.php");

if (isset($_REQUEST['r_Signup'])) {
    if ($_REQUEST['password'] !== $_REQUEST['re_password']) {
        $regmsg = '<div class="alert alert-warning mt-2" role ="alert" > Password And Re-Password Not Match</div>';
    } else {
        $s = "SELECT r_email FROM user WHERE r_email='" . $_REQUEST['email'] . "'";
        $result = $conn->query($s);
        if ($result->num_rows == 1) {
            $regmsg = '<div class="alert alert-danger mt-2" role ="alert" > User Already Registered </div>';
        } else {
            $fname      = mysqli_real_escape_string($conn, trim($_REQUEST['f_name']));
            $lname      = mysqli_real_escape_string($conn, trim($_REQUEST['l_name']));
            $email      = mysqli_real_escape_string($conn, trim($_REQUEST['email']));
            $phone      = mysqli_real_escape_string($conn, trim($_REQUEST['phone']));
            $address    = mysqli_real_escape_string($conn, trim($_REQUEST['address']));
            $pin        = mysqli_real_escape_string($conn, trim($_REQUEST['pincode']));
            $password   = mysqli_real_escape_string($conn, trim($_REQUEST['password']));
            $re_password = mysqli_real_escape_string($conn, trim($_REQUEST['re_password']));
            $sql = "INSERT INTO user(f_name,l_name,r_email,r_phone,r_address,r_pin_code,r_password) VALUES('$fname','$lname','$email','$phone','$address','$pin','$password')";
            if ($conn->query($sql) == true)
                $regmsg = '<div class="alert alert-success mt-2" role ="alert" >Account Successfully Created </div>';
        }
    }
}
?>


<div class="row justify-content-center">
    <div class="col-sm-6">
        <div class="mt-5 mb-5">
            <h3 class="text-center mb-5"><i class="fas fa-address-card"></i> Create an account</h3>
            <form action="" class="shadow-lg p-4" method="post">
                <?php
                if (isset($regmsg)) {
                    echo $regmsg;
                }

                ?>
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="f_name" style="font-weight:bold;" class="pl-2">First Name*</label>
                    <input type="text" name="f_name" id="" class="form-control" placeholder="First Name" required="required">

                </div>
                <div class="form-group mt-2">
                    <i class="fas fa-user"></i><label for="l_name" style="font-weight:bold;" class="pl-2">Last Name*</label>
                    <input type="text" name="l_name" id="" class="form-control" placeholder="Last Name" required>
                </div>

                <div class="form-group mt-2">
                    <i class="fas fa-at"></i><label for="email" style="font-weight:bold;" class="pl-2">Email*</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="Email" required>
                </div>

                <div class="form-group mt-2">
                    <i class="fas fa-phone-alt"></i><label for="phone" style="font-weight:bold;" class="pl-2">Phone Number*</label>
                    <input type="number" name="phone" id="" class="form-control" placeholder="Phone Number" required>
                </div>

                <div class="form-group mt-2">
                    <i class="fas fa-map-marked-alt"></i><label for="address" style="font-weight:bold;" class="pl-2">Address*</label>
                    <input type="text" name="address" id="" class="form-control" placeholder="Address" required>
                </div>

                <div class="form-group mt-2">
                    <i class="fas fa-map-pin"></i><label for="pincode" style="font-weight:bold;" class="pl-2">Pin Code*</label>
                    <input type="text" name="pincode" id="" class="form-control" placeholder="Pin Code" required>
                </div>

                <div class="form-group mt-2">
                    <i class="fas fa-key"></i><label for="password" style="font-weight:bold;" class="pl-2">Password*</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Password" required>
                </div>

                <div class="form-group mt-2">
                    <i class="fas fa-key"></i><label for="re_password" style="font-weight:bold;" class="pl-2">Re-Password*</label>
                    <input type="password" name="re_password" id="" class="form-control" placeholder="Re-Password" required>
                </div>

                <button type="submit" name="r_Signup" class="btn btn-outline-success mt-3 btn-block" style="font-weight : bold">Register</button>

                <?php
                if (isset($regmsg)) {
                    echo $regmsg;
                }

                ?>
            </form>
            <div class="text-center"><a href="login_page.php" class="btn btn-success mt-4 mb-5 shadow-sm" style="font-weight : bold">Login Form</a></div>
        </div>
    </div>