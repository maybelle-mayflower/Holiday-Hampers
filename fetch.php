<?php
require_once './config/db.php';
  global $connect;
  $query = "SELECT * FROM tbl_product WHERE type='product'";
  $request=$_POST['request'];
  if($request=='all')
  {
      $query = "SELECT * FROM tbl_product WHERE type='product'";
  }
  else
  {
      $query = "SELECT * FROM tbl_product WHERE type='product' AND category='$request'"; 
  }
  $output=mysqli_query($connect,$query);
  if(mysqli_num_rows($output)==0)
  {
      echo "No products in this category";
  }
  while($row = mysqli_fetch_array($output))
  {?>
       <div class="col-md-4">
                        <div class="col-m" style="margin-bottom: 10px;">								
                        <img src="myimages/<?php echo $row["image"]; ?>" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-image="<?php echo $row['image'];?>" data-price="<?php echo $row['price']; ?>" data-type="<?php echo $row["type"];?>" class="img-responsive product_drag" style="height: 90px;" align="center"/>  
                         <div class="mid-1" style="height: 130px;">
                        <div class="">
                            <h6 id="name"><?php echo $row["name"]; ?></h6>							
                        </div>
                        <div class="mid-2">
                                <p ><em class="item_price">N<?php echo $row["price"]; ?></em></p>
                        </div>
                         <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                         <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                        </div>
                    </div>
                    </div>  
            
 <?php
 }
?>
