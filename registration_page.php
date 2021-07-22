<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <div class="container-fluid">
        <?php
        include_once("./navbar.php");
        ?>

        <!-- <div class="row">
            <div class="col-sm-12 f4">
                <h1>My Account</h1>
                <p><a href="#">Home</a> / My Account</p>
            </div>
        </div> -->

        <?php
        include_once("./registration_form.php")
        ?>
    </div>
    <?php
    include_once("./footer.php")
    ?>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>