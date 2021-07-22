<?php

include_once("./dbconnection.php");
if (isset($_REQUEST['p_Save'])) {
    $pname = $_REQUEST['p_Name'];
    $pcname = $_REQUEST['p_Company_Name'];
    $pprice = $_REQUEST['p_Price'];
    $pdisprice = $_REQUEST['p_Dis_price'];
    $pdic = $_REQUEST['p_Dis'];
    $pimage = $_FILES['p_Image']['name'];
    $tmp_name = $_FILES['p_Image']['tmp_name'];
    $pstock = $_REQUEST['p_Stock'];
    $wgt = $_REQUEST['p_Wgt'];
    move_uploaded_file($tmp_name, "./upload/$pimage");
    $sql = "INSERT INTO product_tb(product_name,com_name,product_price,product_dis_price,product_disc,product_image,product_in_stock,wgt
        ) VALUES('$pname','$pcname','$pprice','$pdisprice','$pdic','$pimage','$pstock','$wgt')";
    if ($conn->query($sql))
        echo "Save";
    else {
        echo "Not save";
    }
}

?>
<div class="row justify-content-center">
    <div class="col-sm-6">
        <div class="mt-5 mb-5">
            <h3 class="text-center mb-3"><i class="fas fa-table"></i> Prodcut Form <i class="fas fa-table"></i></h3>
            <form action="" class="shadow-lg p-4" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="p_name" style="font-weight:bold;" class="pl-2"><i class="fab fa-product-hunt"></i> Product Name*</label>
                    <input type="text" name="p_Name" id="" class="form-control" placeholder="Product Name" required>

                </div>
                <div class="form-group mt-2">
                    <label for="p_company" style="font-weight:bold;" class="pl-2"><i class="fas fa-building"></i> Company Name*</label>
                    <input type="text" name="p_Company_Name" id="" class="form-control" placeholder="Company Name" required>
                </div>
                <div class="form-group mt-2">
                    <label for="p_company" style="font-weight:bold;" class="pl-2"><i class="fas fa-tags"></i> Product Price*</label>
                    <input type="number" step=0.01 name="p_Price" id="" class="form-control" placeholder="Product Price" required>
                </div>
                <div class="form-group mt-2">
                    <label for="p_company" style="font-weight:bold;" class="pl-2"><i class="fas fa-tag"></i> Product Discount Price*</label>
                    <input type="number" step=0.01 name="p_Dis_price" id="" class="form-control" placeholder="Product Discount" required>
                </div>
                <div class="form-group mt-2">
                    <label for="p_discription" style="font-weight:bold;" class="pl-2"><i class="fas fa-pen-alt"></i> Product Discription*</label>
                    <input type="text" name="p_Dis" id="" class="form-control" placeholder="Product Discription" required>
                </div>
                <div class="form-group mt-2">
                    <label for="p_company" style="font-weight:bold;" class="pl-2"><i class="fas fa-camera-retro"></i> Product Image*</label>
                    <input type="file" name="p_Image" id="" class="form-control" placeholder="Product Price" required>
                </div>
                <div class="form-group mt-2">
                    <label for="p_company" style="font-weight:bold;" class="pl-2"><i class="fas fa-layer-group"></i> Product In Stock*</label>
                    <!-- <input type="" name="p_Stock" id="" class="form-control" placeholder="Product Price" required> -->
                    <select name="p_Stock" id="p_Stock" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="p_discription" style="font-weight:bold;" class="pl-2"><i class="fas fa-weight"></i> Product Weight(g,kg,l,ml,etc.)*</label>
                    <input type="text" name="p_Wgt" id="" class="form-control" placeholder="Product Weight" required>
                </div>
                <button type="submit" class="btn btn-outline-success mt-3 btn-block" style="font-weight : bold" name="p_Save">Save</button>
            </form>
            <div class="text-center"><a href="admin_my_store.php" class="btn btn-success mt-4 shadow-sm " style="font-weight : bold"><i class="fas fa-store"></i> My Store</a></div>
        </div>
    </div>