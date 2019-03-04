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

<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css"href="css/jquery.jscrollpane.css"/>

<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>

    <script src="main.js"></script>
<link rel="stylesheet" href="css/csslider.light.css" />

</head>
      <body> 
          <div class="header">
    <div class="container">

        <div class="logo">
            <h1><a href="customize_home.php">Hampers<span>The Best Gift this Season</span><b>N<br>G</b></a></h1>
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
                <h4><a href="customize_home.php">Back to Shop</a></h4>
	    </div>
	</div>

    </div>
 </div>
           <br />  
           <div class="container" style="width:90%; font-size: 1.4em;">  
               <h3>Your Orders</h3>
               
               <?php
               global $connect;
               if(isset($_SESSION['customer_email'])){
                   $current_email = $_SESSION['customer_email'];
                    $get_customer = "SELECT * FROM customers WHERE customer_email='$current_email'";
                    $run_get = mysqli_query($connect, $get_customer);
                    while($current_row= mysqli_fetch_assoc($run_get)){
                        $current_name = $current_row['customer_name'];
                        $current_id = $current_row['customer_id'];
                    }
                                            
                    $order_details ='';
                    $total=0;
                    $ref_no= time().rand(10*45, 100*98);
                    
                   if(isset($_POST["confirm_hamper"]))
                   {
                    $wrap = $_POST["wrapping"];
                   
                    $hname = mysqli_real_escape_string($connect,$_POST["hamper_name"]);
                    $cid = $_POST["customer_id"]; 
                    $oid = $_POST["order_id"]; 
                    $tot= $_POST["total"]; 
                    $email = $_POST["customer_email"]; 
                    $message = mysqli_real_escape_string($connect,$_POST["special_message"]); 
                    $address = mysqli_real_escape_string($connect, $_POST["delivery_address"]); 
                    $status = "Pending";
                    
                    if($wrap == "yes"){
                        $tot= $_POST["total"]+200; 
                    }

                    $qry = "INSERT INTO hampers(order_id,customer_id,hamper_name,total,email,message,address,wrapping,status,ref_no)
                            VALUES('$oid','$cid','$hname','$tot','$email','$message','$address','$wrap','$status','$ref_no')";
                    $qry_run = mysqli_query($connect, $qry);
                    if($qry_run)
                    { 
                    }
                    header("Location: mycart.php?success=true");
                    exit();
                   }

                   $sel_qry = "SELECT * FROM hampers WHERE status='Pending' AND customer_id='$current_id'";
                    $result = mysqli_query($connect, $sel_qry);
                    $totalinkobo =0;
                    while($row = mysqli_fetch_assoc($result)){
                     $order_details .= "  
                                       <tr>  
                                            <td>".$row["hamper_name"]."</td>  
                                            <td>".number_format($row["total"],2)."</td>  
                                            <td>".$row["message"]."</td>  
                                            <td>".$row["address"]."</td>
                                            <td>".$row["wrapping"]."</td>
                                            <td>".$row["status"]."</td>
                                            <form action='#' method='post'>
                                            <input type='hidden' name='hamper_id' id='hamper_id' value=".$row["hamper_id"].">
                                            
                                            <td><input type='submit' class='linkbutton' onclick='ConfirmDelete()' name='delete_hamper' id='delete_hamper' value='Delete'></td>  
                                            </form>
                                       </tr>  
                                  ";  
                     $total = $total + $row["total"];
                     $totalinkobo = $total*100;
                    }

                       if(isset($_POST["delete_hamper"]))
                       {
                           $id = $_POST["hamper_id"];
                            $del_qry = "DELETE FROM hampers WHERE hamper_id='$id'";
                            $del_run = mysqli_query($connect, $del_qry);
                            if($del_run){
                            }
                                header("Location: mycart.php?success=true");
                                exit();
                       }

                       echo  '<div class="table-responsive">  
                                  <table class="table">
                                  <tr>  
                                            <td><label>My Hampers</label></td>  
                                       </tr>  
                                       <tr>  
                                            <td>  
                                                 <table class="table table-bordered">  
                                                      <tr style="font-weight:bolder;">  
                                                           <th width="10%">Hamper Name</th>  
                                                           <th width="8%">Cost</th>  
                                                           <th width="25%">Message</th>  
                                                           <th width="25%">Recipient\'s Address</th>
                                                           <th width="5%">Wrap Hamper</th> 
                                                           <th width="7%">Status</th>  
                                                           <th width="10%"></th>
                                                            
                                                      </tr>  
                                                      '.$order_details.'  
                                                      <tr>   
                                                      </tr> 
                                                      <tr>  
                                                           <td colspan="3" align="right"><label>Total</label></td>  
                                                           <td><b>N'.number_format($total, 2).'</b></td>
                                                           <form action="save-order-and-pay.php" method="POST">
                                                           <input type="hidden" name="email_prepared_for_paystack" value="'.$current_email.'"> 
                                                            <input type="hidden" name="amount" value="'.$totalinkobo.'"> 
                                                            <input type="hidden" name="refno" value="'.$ref_no.'"> 
                                                             <input type="hidden" name="cid" value="'.$current_id.'"> 
                                                            <td colspan="3"><button type="submit" name="pay_now" id="pay_now" title="Pay now">Confirm and Pay</button></td>
                                                           </form>
                                                      </tr>  
                                                 </table>  
                                            </td>  
                                       </tr>    

                                    </table>
                                    </div>
                                    ';?>
                <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                        <div class="modal-content modal-info">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
                                </div>
                                <div class="modal-body modal-spa">
                                    <?php
                                    $details ='';
                                    $detail_qry = "SELECT * FROM tbl_order_details WHERE order_id=4";
                                    $deet_run = mysqli_query($connect, $detail_qry);
                                    if($deet_run)
                                    {
                                    while($row = mysqli_fetch_array($deet_run)){
                                            $details .= "  
                                              <tr>  
                                                   <td>".$row["product_name"]."</td>  
                                                   <td>".$row["product_quantity"]."</td>  
                                                   <td>".$row["product_price"]."</td>  
                                                   <td>".number_format($row["product_quantity"] * $row["product_price"], 2)."</td>  
                                              </tr>  
                                         "; 

                                         $total = $total + ($row["product_quantity"] * $row["product_price"]);
                                        }
                                    }
                                    else
                                    {
                                        echo mysqli_error($connect);
                                    }
                                     
                                     echo '<div class="table-responsive">  
                                         <table class="table table-bordered">  
                                                  <tr style="font-weight:bolder;">  
                                                       <th width="50%">Product Name</th>  
                                                       <th width="15%">Quantity</th>  
                                                       <th width="15%">Price</th>  
                                                       <th width="20%">Total</th>  
                                                  </tr>  
                                                  '.$details.'
                                                  <tr>  
                                                       <td colspan="3" align="right"><label>Total</label></td>  
                                                       <td>'.number_format($total, 2).'</td>  
                                                  </tr>  
                                             </table>
                                             </div>';
                                        
                                    ?>
                                </div>
                        </div>
                </div>
            </div>
               <?php
               }
               else
               {
                   echo"<script>window.open('login.php','_self')</script>"; 
               }
                   
               ?>
           </div>
            
      </body>
       <script type="text/javascript">
      function ConfirmDelete()
      {
            if (confirm("Delete Hamper?"))
             {
                 location.href='mycart.php';
             }
             else
             {
                 return false;
             }
      }
      
      function ConfirmPayment(){
             if (confirm("Proceed to Payment?"))
             {
                 location.href='save-order-and-pay.php';
             }
      }
        </script>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
 </html> 
