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
                        <h3 class="alert-warning p-2 mt-2"><i class="fas fa-users"></i> All Customer Information</h3>
                        <?php
                        include_once("./dbconnection.php");
                        $sql = "SELECT f_name,l_name,r_email,r_phone,r_address,r_pin_code,join_date FROM user";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo '<table class="table">';
                            echo ' <thead>';
                            echo ' <tr>';
                            echo ' <th scope="col">S.No</th>';
                            echo '<th scope="col">First Name</th>';
                            echo '<th scope="col">Last Name</th>';
                            echo '<th scope="col">Email</th>';
                            echo '<th scope="col">Phone Number</th>';
                            echo '<th scope="col">Address</th>';
                            echo '<th scope="col">Pin Code</th>';
                            echo '<th scope="col">Join Date</th>';

                            echo '</tr>';
                            echo '</thead>';
                            echo ' <tbody>';
                            $num = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>$num</td>";
                                echo "<td>" . $row['f_name'] . "</td>";
                                echo "<td>" . $row['l_name'] . "</td>";
                                echo "<td>" . $row['r_email'] . "</td>";
                                echo "<td>" . $row['r_phone'] . "</td>";
                                echo "<td>" . $row['r_address'] . "</td>";
                                echo "<td>" . $row['r_pin_code'] . "</td>";
                                echo "<td>" . $row['join_date'] . "</td>";
                                echo "</tr>";
                                $num += 1;
                            }
                            echo ' </tbody>';
                            echo ' </table>';
                        } else {
                            echo ' <h3 class="alert-danger p-2 mt-5">No Customer Regester</h3>';
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
