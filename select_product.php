<?php
include './functions/functions.php';

require_once './config/db.php';

session_start();
?>
<!DOCTYPE html>
<html>
    <head>
<title>Hampers-Customize</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Hamper Nigeria Supermarket" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style2.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style3.css">
<link rel="stylesheet" href="css/bootstrap.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

<script src="js/jquery.easyResponsiveTabs.js" type="text/javascript"></script>
<!-- start-smoth-scrolling -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
<!---//End-rate---->
<script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

<link rel="stylesheet" href="css/accordion_style.css">

  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.vertical-tabs.css">

<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css"href="css/jquery.jscrollpane.css"/>

<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>


<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>


<script src="main.js"></script>
<link rel="stylesheet" href="css/csslider.light.css" />
 <style>

        * {
            margin: 0;
            padding: 0;
        }  

        ::-webkit-scrollbar {
            width: 2px;
            background: rgba(255, 255, 255, 0.1);
        }

        ::-webkit-scrollbar-track {
            background: none;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(0, 94, 168, 0.6);
        }

        ul, ol {
            padding-left: 4px;
        }
        html, body {
            height: 100%;
            text-align: center;
            font: 400 100% 'Raleway', 'Lato';
            color: #333;
            background-color: #FFF;
        }

        .scrollable p {
            padding: 30px;
            text-align: justify;
            line-height: 140%;
            font-size: 120%;
        }
    </style>
<body>
        <div class="header">
    <div class="container">

        <div class="logo">
            <h1><a href="customize_home.php">Hampers<span>The Best Gift this Season</span><b>N<br>G</b></a></h1>
        </div>
        <div class="head-t">
                <ul class="card">
                    <?php
                     if(!isset($_SESSION['customer_email'])){
                         echo '<li><a href="customers/register.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>';
                         echo"<li><a href='login.php'><i class='fa fa-user' aria-hidden='true'></i>Login</a></li>";
                     }
                     else{
                         echo"<li><a href='logout.php'><i class='fa fa-user' aria-hidden='true'></i>Logout</a></li>";
                         echo "<li><a href='customers/my_account.php' ><i class='fa fa-file-text-o' aria-hidden='true'></i>Account</a></li>";
                     }
                     ?>
                    <li><a href="shipping.php" ><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li>
                </ul>	
        </div>
        <div class="nav-top">
            <div align="left" class="col-md-6" style="">
                <h4><a href="select_packaging.php">Back</a></h4>
				</div>
                                    <div class="col-md-6">
                                        <div class="">
                                         <?php
                                         global $connect;
                                         if(isset($_SESSION['customer_email'])){
                                             $current_email = $_SESSION['customer_email'];
                                             $get_customer = "SELECT * FROM customers WHERE customer_email='$current_email'";
                                             $run_get = mysqli_query($connect, $get_customer);
                                             while($current_row= mysqli_fetch_assoc($run_get)){
                                                 $current_name = $current_row['customer_name'];
                                             }
                                             echo '<h4 align="right">Hi <b>'.$current_name.'</b><label>/</label><a href="mycart.php">View Cart</a></h4>';
                                         }
                                         else
                                         {
                                             echo "<h4 align='right'>Guest</h4>";
                                         }
                                         ?>`
                                        </div>
					<div class="clearfix"></div>
                                    </div>
				</div>

    </div>
 </div>
        <div class="" style="margin-top: 10px; height: 100%; max-height: 1500px;">
        <?php
        if(isset($_POST["step_2"])){
            $package_size = $_POST['package_cat'];
            $package_name = $_POST['package_name'];
            $package_price = $_POST['package_price'];
            $package_img = $_POST['package_img'];
            
            ?>
        <div class="cart3 col-md-4" style="width: 25%; margin-top: 40px; max-height: 800px; float: right;">  
            <div class="table-responsive" id="order_table" style="height:auto;">  
                <table class="table">   
                    <tr>  
                         <td style="word-wrap: break-word;"><img src="myimages/<?php echo $package_img?>" class="img-thumbnail"><?php echo $package_name ;?></td>  
                         <td id="price_test" name='price_test'><?php echo $package_price ;?></td>
                         <td><a href="select_packaging.php">Change</a></td>
                    <input type="hidden" id="size_test" value="<?php echo $package_size;?>">
                    </tr> 
                </table>
            </div>
            <div align="center">  
                 <div class="product_drag_area">Drop Product Here</div>  
            </div>  
            <div id="dragable_product_order" style="height: 100%; max-height: 350px; overflow: scroll;">  
                <div class="table-responsive" id="order_table">  
                               <table class="table table-bordered">  
                                    <tr>  
                                        <th width="50%">Item</th>
                                        <th width="10%">Qty</th>
                                        <th width="20%">Total Price</th>
                                        <th width="5%">Del</th>  
                                    </tr>  
                                        
                                        <?php
                                        if(!empty($_SESSION["shopping_cart"]))  
                                        {  
                                             $total = 0;
                                             foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                             {                                               
                                        ?>  
                                        <tr>  
                                             <td style="word-wrap: break-word;"><img src="myimages/<?php echo $values["item_image"]?>" class="img-thumbnail"><?php echo $values["item_name"]?></td>  
                                             <td><input type="number" style="width:30px; height: 25px;" name="quantity[]" id="quantity<?php echo $values["item_id"]?>" value="<?php echo $values["item_quantity"]?>" data-product_id="<?php echo $values["item_id"]?>" class="quantity"></td> 
                                             <td><?php echo $values["item_price"]*$values["item_quantity"]?></td>  
                                             <td><a href="select_packaging.php" class="remove_product" id="<?php echo $values["item_id"]?>"><span class="text-danger"><img src="myimages/del.png" width="20px" height="20px"></span></a></td>
                                        </tr>  
                                        <?php  
                                                  $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                                             } 
                                             $count = count($_SESSION["shopping_cart"]);
                                             
                                             $ptotal = $total + $package_price;
                                        ?>
                                        <tr>  
                                            <td colspan="3" align="right">Packaging</td>  
                                            <td>N <span id="package_price">N<?php echo $package_price; ?></span></td>  
                                       </tr>
                                        <tr>  
                                             <td colspan="3" align="right">Total</td>  
                                             <td align="right">N <?php echo number_format($ptotal, 2); ?></td>  
                                             <td><input type="hidden" name="cartqty" id="cartqty" value="<?php echo $count;?>"</td>  
                                        </tr>
                                        <tr>
                                            <td colspan="5" align="center">
                                                <form method="post" action="confirm_hamper.php">
                                                    <input type="hidden" name="hamper_price" id="hamper_price" value="<?php $ptotal;?>"/>
                                                    <input type="submit" class="cart_button" name="place_order" value="Go to Step 3" class="btn">
                                                </form>
                                            </td>

                                        </tr>
                                        <?php  
                                        }  
                                    
                                        ?>  
                               </table> 
                          </div> 
            </div>
            
            
        </div>
        <div class="col-md-6" style="width: 70%; margin-right: 2px; float: left; height: 100%; max-height: 1500px; margin-left: 5px; padding: 0;">
                <!-- Tab panes -->
                        <div class="container" style="width:70%; height: 100%;">  
                        <h3 align="left" style="margin-top: 5px; color: grey;">Step 2: Fill your Hamper</h3>
                        <select id="fetchval" name="fetchby" class="fetchval" style="float: right;">
                            <option value="all">All Products</option>
                            <option value="wines">Wines & Champagne</option>
                            <option value="drinks">Soft Drinks</option>
                            <option value="alcohol">Alcoholic Drinks</option>
                            <option value="chocolates">Chocolate</option>
                            <option value="biscuits">Biscuits</option>
                            <option value="fruit">Fruit</option>
                            <option value="christmas">Christmas Hampers</option>
                            <option value="birthday">Birthday Hampers</option>
                       </select>
                            <h5 align="left" style="margin-top: 10px; color: grey;">Click the image to <b>drag and drop</b> products in your hamper</h5>
                   <div id="product-container" style="max-height: 800px; overflow: scroll;">
                    <?php
                    global $connect;
                    $query = "SELECT * FROM tbl_product WHERE type='product' ORDER BY id ASC";  
                    $result = mysqli_query($connect, $query);  
                    if(mysqli_num_rows($result) > 0)  
                    {  
                         while($row = mysqli_fetch_array($result))  
                         {  
                    ?>               
                       <div class="col-md-4">
                        <div class="col-m" style="margin-bottom: 10px;">								
                        <img src="myimages/<?php echo $row["image"]; ?>" data-cat="<?php echo $package_size;?>" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-image="<?php echo $row['image'];?>" data-price="<?php echo $row['price']; ?>" data-type="<?php echo $row["type"];?>" class="img-responsive product_drag" style="height: 90px;" align="center"/>  
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
                         }
                    }
                ?>  
                <div style="clear:both"></div>  
                <br />  
                        </div>
           </div>  
           <br />  

            </div>
        </div>
    </div>
    </body> 
 </html> 
 <script>
     var qty = document.getElementById("cartqty").value;
     var size = document.getElementById("size_test").innerHTML;
     
     function getlimit(size){
        if(size === "small")
        {
            return 4;
        }
        else if(size === "medium"){
            return 7;
        }
        else if(size === "large"){
            return 11;
        }
     }
    
 </script> 
   <script>  
 $(document).ready(function(data){  
      $('.product_drag_area').on('dragover', function(){  
           $(this).addClass('product_drag_over');  
           return false;  
      });  
      $('.product_drag_area').on('dragleave', function(){  
           $(this).removeClass('product_drag_over');  
           return false;  
      });  
      $('.product_drag').on('dragstart', function(e){  
           e.originalEvent.dataTransfer.setData("id", $(this).data("id"));  
           e.originalEvent.dataTransfer.setData("name", $(this).data("name"));
           e.originalEvent.dataTransfer.setData("image", $(this).data("image"));
           e.originalEvent.dataTransfer.setData("price", $(this).data("price"));  
      });  
      $('.product_drag_area').on('drop', function(e){  
           e.preventDefault();  
           $(this).removeClass('product_drag_over');  
           var id = e.originalEvent.dataTransfer.getData('id');  
           var name = e.originalEvent.dataTransfer.getData('name');
           var image = e.originalEvent.dataTransfer.getData('image');
           var price = e.originalEvent.dataTransfer.getData('price');
           var testprice = document.getElementById("price_test").innerHTML;
           var size = getlimit(document.getElementById("size_test").value);
           var action = "add";  
           $.ajax({  
                url:"action.php",  
                method:"POST",  
                data:{id:id, name:name, price:price, image:image, testprice:testprice, size:size, action:action},  
                success:function(data){  
                     $('#dragable_product_order').html(data);  
                }  
           })  
      });  
      $(document).on('click', '.remove_product', function(){  
           if(confirm("Are you sure you want to remove this product?"))  
           {  
                var id = $(this).attr("id");  
                var action="delete";  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     data:{id:id, action:action},  
                     success:function(data){  
                          $('#dragable_product_order').html(data);  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });
      $(document).on('keyup mouseup','.quantity', function(){

                var product_id = $(this).data("product_id");
                var quantity = $(this).val();
                var size = getlimit(document.getElementById("size_test").value); 
                var action = "quantity_change";
                if(quantity !== ''){
                         $.ajax({
                             url: "action.php",
                             method:"POST",
                             data:{id:product_id, quantity:quantity, size:size, action:action},
                             success:function(data){
                                 $('#dragable_product_order').html(data)
                             }
                         });
                }
      });
    $(document).on('change','.fetchval', function()
    {
            var keyword = $(this).val();
            $.ajax(
            {
                url:'fetch.php',
                type:'POST',
                data:'request='+keyword,
                success:function(data)
                {
                    $("#product-container").html(data);
                            
                $('.product_drag_area').on('dragover', function(){  
                 $(this).addClass('product_drag_over');  
                 return false;  
                  });  
                 $('.product_drag_area').on('dragleave', function(){  
                      $(this).removeClass('product_drag_over');  
                      return false;  
                 }); 
                    
                 $('.product_drag').on('dragstart', function(e){  
                 e.originalEvent.dataTransfer.setData("id", $(this).data("id"));  
                 e.originalEvent.dataTransfer.setData("name", $(this).data("name"));
                 e.originalEvent.dataTransfer.setData("image", $(this).data("image"));
                 e.originalEvent.dataTransfer.setData("price", $(this).data("price"));  
            });
            $('.product_drag_area').on('drop', function(e){  
                e.preventDefault();  
                $(this).removeClass('product_drag_over');  
                var id = e.originalEvent.dataTransfer.getData('id');  
                var name = e.originalEvent.dataTransfer.getData('name');
                var image = e.originalEvent.dataTransfer.getData('image');
                var price = e.originalEvent.dataTransfer.getData('price');
                var testprice = document.getElementById("price_test").innerHTML;
                var size = getlimit(document.getElementById("size_test").value);
                var action = "add";  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     data:{id:id, name:name, price:price, image:image, testprice:testprice, size:size, action:action},  
                     success:function(data){  
                          $('#dragable_product_order').html(data);  
                     }  
                });  
                });
                }
            });
    });
 });  
 </script>  


   <script type="text/javascript">
     
      $(document).ready(function () {
          if (!$.browser.webkit) {
              $('.container').jScrollPane();
          }
      });
     
    </script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="js/jquery.vide.min.js"></script>


<!--footer-->
		<div class="copy-right">
			<p> &copy; 2017 Hampers. All Rights Reserved</p>
		</div>
<!-- //footer-->
 <script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>