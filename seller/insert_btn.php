<?php
include './config/db.php';
if(isset($_POST['insert_pro'])){
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $product_brand=$_POST['product_brand'];
    if(isset($_FILES['product_image'])){
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];
    }
        move_uploaded_file($product_image_tmp, "product_img/$product_image");
        $product_desc=$_POST['product_desc'];
    
    if(isset($_POST['product_price'])){
        $product_price = $_POST['product_price'];
    }
        if(isset($_POST['product_keyword'])){
        $product_keywords = $_POST['product_keyword'];
    }

     $insert_product = "INSERT INTO products(product_cat, product_brand,product_title,product_price,product_desc,product_image,product_keywords) VALUES('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
     $res = mysqli_query($con, $insert_product);
     if($res){
         echo"<script>alert('Product successfully entered!')</script>";
         echo"<script>window.open('index.php','_self')</script>";
     }
}
?>
