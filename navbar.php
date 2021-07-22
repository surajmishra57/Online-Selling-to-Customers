<style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    ul {
        list-style-type: none;
    }

    ul>li {
        display: inline-block;
        margin-left: 50px;
        margin-top: 5px;
    }

    ul>li>a {
        text-decoration: none;
        color: whitesmoke;
        font-size: 12px;
    }

    .cart-num {
        border: 1px solid lightgray;
        border-radius: 40%;
        font-size: 20px;
        color: white;
        background-color: #DC3545;
    }
</style>
<div class="row" style="background-color: black;">
    <div class="col-sm-8 " style="color : whitesmoke; font-size : 20px; margin-top : 5px">
        <?php
        if (isset($_SESSION['rName'])) {
            echo "<i class='fas fa-user'></i> Hello " . $_SESSION['rName'];
        } else {
            echo '<i class="fas fa-user"></i> Hello {User}';
        }
        ?>

        <span style="font-size : 15px; margin-left : 20px;"> Today's Deals</span>
        <span style="font-size : 15px; margin-left : 20px;"> My Orders</span>
        <span style="font-size : 15px; margin-left : 20px;"> Prime Membership</span>
        <span style="font-size : 15px; margin-left : 20px;"> Best Seller</span>
        <span style="font-size : 15px; margin-left : 20px;"> About Us</span>
        <span style="font-size : 15px; margin-left : 20px;"> Complain</span>

    </div>
    <div class="col-sm-4">
        <ul>
            <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg> Your Location</a> </li>
            <?php
            if (isset($_SESSION['is_auth'])) {
                echo '<li><a href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
              </svg> Logout</a></li>';
            } else {
                echo '<li><a href="login_page.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                     <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                     <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                 </svg> Sign In</a></li>';
                echo '<li><a href="registration_page.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                  </svg> Sign Up</a></li>';
            }
            ?>
        </ul>
    </div>
</div>
<div class="row ">
    <div class="col-sm-3 f2">
        <a href="#"><img src="image/title.png" width="
        250px" height="50px" style="margin-top: 10px;"></a>
    </div>
    <div class="col-sm-6 f2">
        <form action="">
            <div class="input-group mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Search Here...." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button style="color : white" class="btn  bg-success" type="button" id="button-addon2">SEARCH</button>
            </div>
        </form>
    </div>
    <div class="col-sm-3 f2">
        <?php
        $count = 0;
        if (isset($_SESSION['is_auth'])) {
            include_once('./dbconnection.php');
            $ename = $_SESSION['rEmail'];
            $s = "SELECT cart_id FROM my_cart WHERE r_email= '" . $ename . "'";
            $result = $conn->query($s);
            $count = $result->num_rows;
        }
        ?>
        <h1 class="mt-3" style="margin-left:70px;"><a href="./mycart.php"><i class="fas fa-cart-plus"></i></a><span class="cart-num"><?php echo $count; ?></span></h1>
    </div>
</div>