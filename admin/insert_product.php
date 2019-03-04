<!DOCTYPE>
<?php
include ("./includes/config.php");
?>
<html>
    <head>
        <title>Insert product</title>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
    </head>
    <body bgcolor="lightgrey">
        <form method="post" action="insert_btn.php" enctype="multipart/form-data">
            <table align="center" width="750" border="2" bgcolor="orange">
                <tr align="center">
                    <td colspan="8"><h2>Insert a new product</h2></td>
                </tr>
                <tr>
                    <td align="right"><b>Product Title: </b></td>
                    <td><input type="text" name="product_title" size="50" required=""/></td>
                </tr>
                <tr>
                    <td align="right"><b>Product Category: </b></td>
                    <td>
                        <select name="product_cat">
                            <option>Select a category</option>
                                <?php
                                
                            $get_cats = "SELECT * FROM categories";
                            $run_cats = mysqli_query($con, $get_cats);
                            while ($row_cats= mysqli_fetch_array($run_cats)){
                                $cat_id = $row_cats['cat_id'];
                                $cat_title = $row_cats['cat_title'];

                                echo "<option value='$cat_id'>$cat_title</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>Product Brand: </b></td>
                    <td>
                        <select name="product_brand">
                            <option>Select a Brand</option>
                                <?php
                                    $get_brands = "SELECT * FROM brands";
                                    $run_brands = mysqli_query($con, $get_brands);
                                    while ($row_brands= mysqli_fetch_array($run_brands)){
                                        $brand_id = $row_brands['brand_id'];
                                        $brand_title = $row_brands['brand_title'];

                                        echo "<option value='$brand_id'>$brand_title</option></li>";
                                    }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td align="right"><b>Product Image: </b></td>
                    <td><input type="file" name="product_image"/></td>
                </tr>
                <tr>
                    <td align="right"><b>Product Price: </b></td>
                    <td><input type="text" name="product_price" size="50"/></td>
                </tr>
                <tr>
                    <td align="right"><b>Product Description: </b></td>
                    <td><textarea name="product_desc" cols="30" rows="10"></textarea></td>
                </tr>

                <tr>
                    <td align="right"><b>Product Keywords: </b></td>
                    <td><input type="text" name="product_keyword" size="50"/></td>
                </tr>
                <tr align="center">
                    <td colspan="8"><input type="submit" name="insert_post" value="insert"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>
