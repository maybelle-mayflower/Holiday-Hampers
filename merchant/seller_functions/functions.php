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

function get_merchantPro(){
    global $con;
    $get_pro = "Select * from products";
    $run_pro = mysqli_query($con, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_img = $row_pro['product_image'];
        $qry = "Select cat_title from categories where cat_id=$pro_cat";
        $run_qry = mysqli_query($con, $qry);
        while ($row = mysqli_fetch_assoc($run_qry)) {
            $cat_name = $row['cat_title'];
        }
        
        echo "<tr>
                            <td class='checkbox-cell'>
                              <span class='checkbox'>
                                <label>
                                  <input type='checkbox' value='' id=''>
                                  <span class='checkbox-material'></span>
                                </label>
                              </span>
                            </td>
                            <td><img src='product_img/$pro_img' alt='' height='50' width='50' class='img-thumbnail' /></td>
                            <td>$cat_name</td>
                            <td>$pro_title</td>
                            <td>$pro_price</td> 
                            <td><a href='javascript:void(0)' class='icon edit-product' data-drawer='open-right-lg'><i class='zmdi zmdi-edit'></i></a></td>
                          </tr>";
    }
}
?>