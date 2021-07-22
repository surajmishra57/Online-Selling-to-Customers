<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['is_auth'])) {
    echo "<script> location.href='./login_page.php';</script>";
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/custom.css">

</head>
<style>
    .bt {
        color: red;
        font-size: 20px;
    }
</style>

<body style="background-color: whitesmoke;">
    <div class="container-fluid">
        <?php
        include_once("./navbar.php");
        ?>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mt-3 mb-3" style="text-align : center">Shoping Cart</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7" style="border : 1px solid black; background-color : whitesmoke;border-radius: 5px;">
                <h4>Cart Items</h4>
                <hr>
                <?php
                include_once('./dbconnection.php');
                $ename = $_SESSION['rEmail'];
                $s = "SELECT cart_id,product_id,Qyt FROM my_cart WHERE r_email= '" . $ename . "'";
                $sum = 0;
                $result = $conn->query($s);
                if ($result->num_rows < 1) {
                    echo "<h1> NO ITEM IN CART <h1/>";
                } else {
                    while ($row = $result->fetch_assoc()) {
                        $n = $row['product_id'];
                        $q = "SELECT * FROM product_tb WHERE product_id = '" . $n . "'";
                        $res = $conn->query($q);
                        while ($ow = $res->fetch_assoc()) {
                            $cart_id = $row['cart_id'];
                            $img_data = $ow['product_image'];
                            echo "<div class='row mb-5'>";
                            echo "<div class='col-sm-4'>";
                            echo "<img src='./upload/$img_data' alt='' width='150px' height='150'>";
                            echo "</div>";
                            echo "<div class='col-sm-4'>";
                            echo "<h5 style='font-weight: bold;'>" . $ow['product_name'] . "</h5>";
                            echo "<p>Wgt : " . $ow['wgt'] . "</p>";
                            echo "<p style='font-weight: bold;'>Quantity : <i class='fas fa-minus-square'></i>" . $row['Qyt'] . "<i class='fas fa-plus-square'></i></p>";
                            echo "<a href='./removecart.php?id=$cart_id' class='btn btn-danger' style='background-color: red; color : white; width: 150px; border-color: red; border-radius: 50px;'>Remove item</a>";
                            echo "</div>";
                            echo "<div class='col-sm-4'>";
                            echo "<p style='font-weight: bold;'>Rs :" . $ow['product_dis_price'] . "</p>";
                            $sum = $sum + $ow['product_dis_price'];
                            echo " </div>";
                            echo " </div>";
                            // echo " </div>";
                        }
                    }
                }

                ?>
                <!-- <div class="row mb-5"> -->
                <!-- <div class="col-sm-4"> -->
                <!-- <img src="./upload/51A8rjwKdPL._SX679_.jpg" alt="" width="150px" height="150"> -->
                <!-- </div> -->
                <!-- <div class="col-sm-4"> -->
                <!-- <h5 style="font-weight: bold;">Tea Pack</h5> -->
                <!-- <p>Wgt : 500g</p> -->
                <!-- <p style="font-weight: bold;">Quantity : <i class="fas fa-minus-square"></i> 1 <i class="fas fa-plus-square"></i></p> -->
                <!-- <button class="btn btn-danger" style="background-color: red; color : white; width: 150px; border-color: red; border-radius: 50px;">Remove item</button> -->
                <!-- </div> -->
                <!-- <div class="col-sm-4"> -->
                <!-- <p style="font-weight: bold;">Rs : 500.00</p> -->
                <!-- </div> -->
                <!-- </div> -->
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-4" style="border : 1px solid black; background-color : whitesmoke">
                <h4>The Total Amount of</h4>

                <div class="row">
                    <div class="col-sm-6">
                        <p style="font-weight: bold;">Amount</p>
                    </div>
                    <div class="col-sm-6">
                        <p style="font-weight: bold;">Rs. <?php echo "$sum" ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p style="font-weight: bold;">Shipping</p>
                    </div>
                    <div class="col-sm-6">
                        <p style="font-weight: bold;">Rs. 50.00</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <p style="font-weight: bolder;font-size:20px; color : red">Total</p>
                    </div>
                    <div class="col-sm-6">
                        <p style="font-weight: bolder;font-size: 20px;"><?php echo "$sum" + 50; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mb-2" style="text-align: center;">
                        <button class="btn btn-success" style="color : white; background-color: green; border-color: green; width : 300px; border-radius: 50px;">Place Order</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>