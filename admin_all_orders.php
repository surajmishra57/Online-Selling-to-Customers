<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>


<body>
    <div class="container-fluid">
        <?php
        include_once("./admin_navbar.php");
        ?>
        <div class="row">
            <?php
            include_once("./admin_sidenavbar.php");
            ?>
            <div class="col-sm-10" style="background-color: #FFFFFF;">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="alert-warning p-2 mt-2"><i class="fas fa-gifts"></i> All Orders Information</h3>
                        <?php
                        include_once("./dbconnection.php");
                        $sql = "SELECT * FROM order_tb";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo '<table class="table">';
                            echo ' <thead>';
                            echo ' <tr>';
                            echo ' <th scope="col">S.No</th>';
                            echo '<th scope="col">Product Id Name</th>';
                            echo '<th scope="col">Product Name</th>';
                            echo '<th scope="col">User ID</th>';
                            echo '<th scope="col">Product Price</th>';
                            echo '<th scope="col">Order Date</th>';
                            echo '<th scope="col">Order Time</th>';

                            echo '</tr>';
                            echo '</thead>';
                            echo ' <tbody>';
                            $num = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>$num</td>";
                                echo "<td>" . $row['product_id'] . "</td>";
                                echo "<td>" . $row['product_name'] . "</td>";
                                echo "<td>" . $row['r_email'] . "</td>";
                                echo "<td>" . $row['product_dis_price'] . "</td>";
                                echo "<td>" . $row['order_date'] . "</td>";
                                echo "<td>" . $row['order_time'] . "</td>";
                                echo "</tr>";
                                $num += 1;
                            }
                            echo ' </tbody>';
                            echo ' </table>';
                        } else {
                            echo ' <h3 class="alert-danger p-2 mt-5">No Order Regester</h3>';
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>