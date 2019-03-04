<?php    
 session_start();  
 
 if($_POST["action"] == "add")  
 {
     $size = $_POST["size"];
     $pkg_price = $_POST["testprice"];

      if(isset($_SESSION['shopping_cart']))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_POST["id"], $item_array_id))  
           { 
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_POST["id"],  
                     'item_name'               =>     $_POST["name"],
                     'item_image'               =>     $_POST["image"],
                     'item_price'          =>     $_POST["price"],
                     'package_price'          =>     $pkg_price,
                     'item_quantity'          =>     "1"
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
                
                if($count > $size)
                {
                    echo '<script>alert("Maximum number of items reached for this package size. Further additions will not fit into your hamper but you may still be charged.")</script>';
                }
           }  
           else  
           {  
                //echo '<script>alert("Item Already Added")</script>';  
           }  
      }  
      else  
      {
           $item_array = array(  
                'item_id'               =>     $_POST["id"],  
                'item_name'               =>     $_POST["name"],
                'item_image'               =>     $_POST["image"],
                'item_price'          =>     $_POST["price"],
               'package_price'          =>     $pkg_price,
                'item_quantity'          =>     "1"
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      } 
      
      echo make_cart_table();  
 }  
 if($_POST["action"] == "delete")  
 {
      foreach($_SESSION["shopping_cart"] as $keys => $values)  
      {  
           if($values['item_id'] == $_POST["id"])  
           {  
                unset($_SESSION["shopping_cart"][$keys]);
                //array_values($_SESSION["shopping_cart"]);
                echo make_cart_table();  
           }
      }  
 }
 if($_POST["action"]=="quantity_change"){
     $pcksize = $_POST["size"];
     $count = count($_SESSION["shopping_cart"]);
     
      foreach($_SESSION["shopping_cart"] as $keys => $values)  
      {
          if($_SESSION["shopping_cart"][$keys]['item_id']==$_POST["id"]){
              $_SESSION["shopping_cart"][$keys]['item_quantity']=$_POST["quantity"];
              
              if($count>=$pcksize)
              {
                  echo '<script>alert("Warning: Increasing the quantity of this item might cause you to exceed your product allowance for this package. All items might not fit into your hamper but you will still be charged.")</script>';
              }
              echo make_cart_table(); 
          }
      }
 }
 function make_cart_table()  
 {  
      $output = '';  
      if(!empty($_SESSION["shopping_cart"]))  
      {  
           $total = 0;  
           $qty_count = 0;
           $output .= '    
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item</th>
                               <th width="10%">Qty</th>
                               <th width="20%">Total Price</th>
                               <th width="10%">Delete</th>
                          </tr>  
           ';  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                $output .= '  
                     <tr>  
                          <td style="word-wrap: break-word;"><img src="myimages/'.$values["item_image"].'" class="img-thumbnail">'.$values["item_name"].'</td>  
                          <td><input type="number" style="width:30px; height: 25px;" name="quantity[]" id="quantity'.$values["item_id"].'" value="'.$values["item_quantity"].'" data-product_id="'.$values["item_id"].'" class="quantity"></td> 
                          <td style="margin-top:10px;">N'.$values["item_price"]*$values["item_quantity"].'</td> 
                          <td><a href="#" class="remove_product" id="'.$values["item_id"]. '"><span class="text-danger"><img src="myimages/del.png" width="20px" height="20px"></span></a></td>
                     </tr>  
                ';  
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                
           }
           $count = count($_SESSION["shopping_cart"]);
           $pck_price = $values["package_price"];
           $output .= '
                 <tr>  
                     <td colspan="3" align="right">Packaging </td>  
                     <td>N <span id="package_price">'.$values["package_price"].'</span></td>  
                </tr>
                <tr>  
                     <td colspan="3" align="right">Total</td>  
                     <td>N <span id="total_price">'.number_format(($total + $pck_price), 2).'</span></td>  
                </tr>
                <tr>
                
                <td colspan="5" align="center">
                    <form method="post" action="confirm_hamper.php">
                        <input type="hidden" id="hamper_price" name="hamper_price" value="'.$pck_price.'">
                        <input type="hidden" name="hamper_size" id="hamper_size" value="'.$count.'">
                        <input type="hidden" name="p_price" id="p_price" value="">
                        <input type="submit" name="place_order" value="Go to Step 3" class="btn-default">
                    </form>
                </td>
            </tr>
           </table>  
           ';  
      }  
      return $output;  
 }  
 ?>  