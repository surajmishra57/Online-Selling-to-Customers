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
                    <div class="col-sm-12">
                        <div>

                            <div class="text-center"><a href="admin_add_product.php" class="btn btn-success mt-4 shadow-sm add_btn" style="font-weight : bold"><i class="fas fa-plus"></i> Add Product</a></div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">

                        <h3 class="alert-warning p-2 mt-2 sticky-top"><i class="fas fa-store"></i> All Product Information</h3>
                        <?php
                        include_once("./dbconnection.php");
                        $sql = "SELECT * FROM product_tb";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo '<table class="table">';
                            echo ' <thead>';
                            echo ' <tr>';
                            echo ' <th scope="col">ID</th>';
                            echo '<th scope="col">Image</th>';
                            echo '<th scope="col">Name</th>';
                            echo '<th scope="col">Company</th>';
                            echo '<th scope="col">Price</th>';
                            echo '<th scope="col">Discount_Price</th>';
                            echo '<th scope="col">Discription</th>';
                            echo '<th scope="col">Add_Date</th>';
                            echo '<th scope="col">In_Stock</th>';
                            echo '<th scope="col">Weight</th>';
                            echo '<th scope="col">Action</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo ' <tbody>';
                            while ($row = $result->fetch_assoc()) {
                                $img_data = $row['product_image'];
                                $i = $row['product_id'];
                                echo "<tr>";
                                echo "<td>" . $row['product_id'] . "</td>";
                                echo "<td><image src='./upload/$img_data' width='100px' height='100px'/></td>";
                                echo "<td>" . $row['product_name'] . "</td>";
                                echo "<td>" . $row['com_name'] . "</td>";
                                echo "<td>" . $row['product_price'] . "</td>";
                                echo "<td>" . $row['product_dis_price'] . "</td>";
                                echo "<td>" . $row['product_disc'] . "</td>";
                                echo "<td>" . $row['product_add_date'] . "</td>";
                                echo "<td>" . $row['product_in_stock'] . "</td>";
                                echo "<td>" . $row['wgt'] . "</td>";
                                echo "<td><a href='edit_store.php?id=$i' class='btn btn-warning btn-sm btn-edit'>Edit</a><a href='delete_store.php?id=$i' class='btn btn-danger btn-sm btn-del'>Delete</a></td>";

                                echo "</tr>";
                            }
                            echo ' </tbody>';
                            echo ' </table>';
                        } else {
                            echo ' <h3 class="alert-danger p-2 mt-5">No Product Avalable In Store Go To  "+Add Product"</h3>';
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