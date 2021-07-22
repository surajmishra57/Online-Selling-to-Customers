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
                        <?php
                        include_once("./admin_add_product_form.php")
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