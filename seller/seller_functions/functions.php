<?php
include '../config/db.php';
function getBrand(){
    global $con;
    $get_brands = "SELECT * FROM brands";
    $run_brands = mysqli_query($con, $get_brands);
    while ($row_brands= mysqli_fetch_array($run_brands)){
        $brand_id = $row_brands['brand_id'];
        $brand_title = $row_brands['brand_title'];

        echo "<option value='$brand_id'>$brand_title</option></li>";
    }
}
function getCat(){
    global $con;
    $get_cat = "SELECT * FROM categories";
    $run_cat = mysqli_query($con, $get_cat);
    while ($row_cat= mysqli_fetch_array($run_cat)){
        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['cat_title'];

        echo "<option value='$cat_id'>$cat_title</option></li>";
    }
}
?>