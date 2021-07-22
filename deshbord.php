<!DOCTYPE html>
<?php
session_start();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/custom.css">

</head>

<body style="background-color: whitesmoke;">
    <div class="container-fluid">
        <?php
        include_once("./navbar.php");
        ?>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="./Image/e2b9e56d0f7a48bca8fd01d137504fa4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="./Image/e2b9e56d0f7a48bca8fd01d137504fa4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./Image/e2b9e56d0f7a48bca8fd01d137504fa4.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="row">
            <?php
            include_once('./dbconnection.php');
            $sql = "SELECT product_id,product_name,product_price,product_dis_price,product_image,product_in_stock,wgt FROM 
                    product_tb";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $img = $row['product_image'];
                    $id = $row['product_id'];
                    echo '<div class="col-sm-3">';
                    echo '<div class="card text-center mt-3 shadow-lg mb-3 " style="width : 18rem;">';
                    echo "<img src='./upload/$img' alt='' class='card-img-top' style='width : 10rem; height:10rem;'>";
                    echo ' <div class="card-body">';
                    echo ' <h5 class="card-title">' . $row['product_name'] . '</h5>';

                    echo '<p><span style="font-size : 30px;color : red;text-decoration :line-through;">' . $row['product_price'] . '</span><span style="font-size : 25px; color : green;">  ' . $row['product_dis_price'] . '</span></p>';
                    echo '<p><span style="font-weight: bold;"> wgt ' . $row['wgt'] . '<span><p>';
                    if ($row['product_in_stock'] == "Yes") {
                        echo '<p><span style="color : green">In Stock</span></p>';

                        echo "<a class='btn btn-danger' href='cart.php?id=$id'>Add To Cart</a>";
                    } else {
                        echo '<p><span style="color : red;">Out Of Stock</span></p>';
                        echo '<button class="btn btn-danger name="$id" disabled="disabled">Add To Cart</button>';
                    }


                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
            <?php
            include_once("./footer.php");

            ?>

        </div>
    </div>
</body>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>

</html>