<?php  
 session_start();  
require_once './config/db.php';
  
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

</head>
      <body>
          <div class="header">
    <div class="container">

        <div class="logo">
            <h1><a href="customize_home.php">Hampers<span>The Best Supermarket</span><b>N<br>G</b></a></h1>
        </div>
        <div class="head-t">
                <ul class="card">
                    <li><a href='logout.php'><i class='fa fa-user' aria-hidden='true'></i>Logout</a></li>
                    <li><a href='customers/my_account.php' ><i class='fa fa-file-text-o' aria-hidden='true'></i>Account</a></li>
                    <li><a href="shipping.html" ><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li>
                </ul>	
        </div>
        <div class="nav-top">
            <div align="left">
                <h4><a href="select_packaging.php">Back to Shop</a></h4>
	    </div>
	</div>

    </div>
 </div>
           <br />  
           <div class="container" style="width:90%; font-size: 1.1em;">  
                <?php
                
              global $connect;
                if(isset($_SESSION['customer_email'])){
                    $current_email = $_SESSION['customer_email'];
                    $get_customer = "SELECT * FROM customers WHERE customer_email='$current_email'";
                    $run_get = mysqli_query($connect, $get_customer);
                    while($current_row= mysqli_fetch_assoc($run_get)){
                        $current_name = $current_row['customer_name'];
                        $current_id = $current_row['customer_id'];
                        $current_address = $current_row['customer_address'];
                        $current_phone = $current_row['customer_number'];
                        $current_city = $current_row['customer_city'];
                    }

                    if(isset($_POST["place_order"]))  
                    {  
                        //$package_size = $_POST["package_size"];
                        //$hamper_count = $_POST["hamper_size"];
                        $pck_price = $_POST["hamper_price"];
                                                
                        $insert_order = "  
                        INSERT INTO tbl_order(customer_id, package_price, creation_date, order_status)  
                        VALUES('$current_id','$pck_price','".date('Y-m-d')."', 'pending')  
                        ";  
                        $order_id = "";  
                        if(mysqli_query($connect, $insert_order))  
                        {  
                             $order_id = mysqli_insert_id($connect);  
                        }  
                        $_SESSION["order_id"] = $order_id;  
                        $order_details = "";  
                        foreach($_SESSION["shopping_cart"] as $keys => $values)  
                        {  
                             $order_details .= "  
                             INSERT INTO tbl_order_details(order_id, product_name, product_price, product_quantity)  
                             VALUES('".$order_id."', '".$values["item_name"]."', '".$values["item_price"]."', '".$values["item_quantity"]."');  
                             ";  
                        }  
                        if(mysqli_multi_query($connect, $order_details))  
                        {  
                             unset($_SESSION["shopping_cart"]);   
                             echo '<script>window.location.href="confirm_hamper.php"</script>';  
                        }
                    }  
                    if(isset($_SESSION["order_id"]))  
                    {  
                         $customer_details = '';  
                         $order_details = '';  
                         $total = 0;
                         $ptotal=0;
                         $query = '  
                         SELECT * FROM tbl_order  
                         INNER JOIN tbl_order_details  
                         ON tbl_order_details.order_id = tbl_order.order_id  
                         INNER JOIN customers  
                         ON customers.customer_id = tbl_order.customer_id  
                         WHERE tbl_order.order_id = "'.$_SESSION["order_id"].'"  
                         ';  
                         $result = mysqli_query($connect, $query);
                         if(!$result)
                         {
                             echo "select failed ". mysqli_error($connect);
                         }
                         else
                        {
                            while($row = mysqli_fetch_array($result))  
                            {  
                                 $customer_details = '  
                                 <label>'.$row["customer_name"].'</label>  
                                 <p>'.$row["customer_address"].'</p>  
                                 <p>'.$row["customer_city"].'</p>  
                                 <p>'.$row["customer_email"].'</p>  
                                 ';  
                                 $order_details .= "  
                                      <tr>  
                                           <td>".$row["product_name"]."</td>  
                                           <td>".$row["product_quantity"]."</td>  
                                           <td>".$row["product_price"]."</td>  
                                           <td>".number_format($row["product_quantity"] * $row["product_price"], 2)."</td>  
                                      </tr>  
                                 ";  
                                 $total = $total + ($row["product_quantity"] * $row["product_price"]);
                                 $ptotal = $total + $row["package_price"];
                                 $cust_id = $current_id;
                                 $orderid = $_SESSION["order_id"];
                                 $cust_email = $current_email;
                                 $pprice = $row["package_price"];

                            }
                         }
                         echo '
                         <div class="col-md-6" align="left">
                         <h3 align="left">Order Summary for Order No.'.$_SESSION["order_id"].'</h3>  
                         <div class="table-responsive">  
                              <table class="table">  
                                   <tr>  
                                        <td><label>Customer Details</label></td>  
                                   </tr>  
                                   <tr>  
                                        <td>'.$customer_details.'</td>  
                                   </tr>  
                                   <tr>  
                                        <td><label>Order Details</label></td>  
                                   </tr>  
                                   <tr>  
                                        <td>  
                                             <table class="table table-bordered">  
                                                  <tr>  
                                                       <th width="50%">Product Name</th>  
                                                       <th width="15%">Quantity</th>  
                                                       <th width="15%">Price</th>  
                                                       <th width="20%">Total</th>  
                                                  </tr>  
                                                  '.$order_details.'
                                                         <tr>  
                                                       <td colspan="3" align="right"><label>Package Price</label></td>  
                                                       <td>'.number_format($pprice, 2).'</td>  
                                                  </tr> 
                                                  <tr>  
                                                       <td colspan="3" align="right"><label>Total</label></td>  
                                                       <td>'.number_format($ptotal, 2).'</td>  
                                                  </tr>  
                                             </table>  
                                        </td>  
                                   </tr>  
                              </table>  
                         </div>
                         </div>
                         <div class="col-md-6" align="right" style="margin-top: 55px;">
                         <form method="post" action="mycart.php">
                         <div class="table-responsive">  
                              <table class="table">  
                                   <tr>  
                                        <td><label>Hamper Name: </label></td>
                                        <td><input type="text" id="hamper_name" name="hamper_name" required="" placeholder="My Hamper"></td> 
                                   </tr>  
                                    <tr>  
                                        <td><label>Special Message: </label></td>
                                        <td><textarea id="special_message" name="special_message" placeholder="Deliver your hamper with a special message..." style="width:100%; height:120px;"></textarea></td> 
                                   </tr>  
                                    <tr>  
                                        <td><label>Delivery Address: </label></td>
                                        <td><textarea id="delivery_address" name="delivery_address" required="" placeholder="Recipient\'s delivery address" style="width:100%; height:120px;"></textarea></td> 
                                   </tr> 
                                    <tr>  
                                        <td><label>Would you like this hamper wrapped for N200?</label></td>
                                        <td>
                                        <input type="radio" name="wrapping" value="no"> No<br>
                                        <input type="radio" name="wrapping" value="yes"> Yes<br></td>
                                   </tr> 
                                </table>
                                <input type="hidden" name="order_id" id="order_id" value="'.$orderid.'">
                                <input type="hidden" name="customer_id" id="customer_id" value="'.$cust_id.'">
                                <input type="hidden" name="total" id="total" value="'.$ptotal.'">
                                <input type="hidden" name="customer_email" id="customer_email" value="'.$cust_email.'">
                                    
                                <input type="submit" name="confirm_hamper" id="confirm_hamper" value="Confirm Hamper">
                            </div>
                         </form>
                                   </div>
                                 
                         ';  
                    }  
                }
                else
                {
                    echo"<script>window.open('login.php','_self')</script>"; 
                }

                ?>  
           </div>  
      </body>  
 </html> 
