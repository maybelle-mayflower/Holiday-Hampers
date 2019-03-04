<?php
include './functions/functions.php';
require_once './config/db.php';

session_start();
 if(isset($_POST["add_package"]))  
 {  
      if(isset($_SESSION["packaging_cart"]))  
      {  
           $item_array_type = array_column($_SESSION["packaging_cart"], "item_type");
           if(!in_array($_GET["type"], $item_array_type))  
           {  
                $count = count($_SESSION["packaging_cart"]);  
                $item_array = array(
                     'item_type'               =>     $_GET["type"],
                     'item_id'               =>     $_POST["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],
                     'item_image'               =>     $_POST["hidden_image"],
                     'item_cat'               =>     $_POST["hidden_cat"],
                    'item_quantity'          =>     "1"
                );
           
                    $_SESSION["packaging_cart"][$count] = $item_array; 
           }  
           else  
           {  
                echo '<script>alert("Only one Package selection allowed per Hamper")</script>';  
                echo '<script>window.location="select_packaging.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array( 
                'item_type'               =>     $_GET["type"],
                'item_id'               =>     $_POST["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],
               'item_image'               =>     $_POST["hidden_image"],
               'item_cat'               =>     $_POST["hidden_cat"],
               'item_quantity'          =>     "1"
           );  
           $_SESSION["packaging_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["packaging_cart"] as $keys => $values)  
           {  
                if($values['item_id'] == $_GET["id"])  
                {  
                     unset($_SESSION["packaging_cart"][$keys]);    
                     echo '<script>window.location="select_packaging.php"</script>';  
                }  
           }  
      }  
 } 

?>
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
</head>
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
                <h4><a href="customize_home.php">Exit</a></h4>
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
                                             echo '<h4 align="right">Welcome <b>'.$current_name.'</b><label>/</label><a href="mycart.php">View Cart</a></h4>';
                                         }
                                         else
                                         {
                                             echo "<h4 align='right'>Welcome Guest</h4>";
                                         }
                                         ?>`
                                        </div>
					<div class="clearfix"></div>
                                    </div>
				</div>
<div class="main_area" style="margin-top: 10px; width: 100%;">
        <div class="cart3 col-md-4" style="width: 30%; height: 100%; max-height: 1000px; float: right; margin-top: 15px;">  
            <h3 style="color: grey;">Order Details</h3>
            <br>
            <div class="table-responsive" style="margin-top: 5px; color: grey;">
                <form action="select_product.php" method="post">
                <table class="table" style="color: grey;">  
                      <tr>  
                           <th width="60%">Package</th>  
                           <th width="20%">Price</th>    
                           <th width="5%">Action</th>  
                      </tr>  
                      <?php   
                      if(!empty($_SESSION["packaging_cart"]))  
                      {  
                           $total = 0;  
                           foreach($_SESSION["packaging_cart"] as $keys => $values)  
                           {  
                      ?>  
                      <tr>  
                          <td style="word-wrap: break-word;"><img src="myimages/<?php echo $values["item_image"]?>" class="img-thumbnail"><?php echo $values["item_name"]?></td>  
                           <td>N<?php echo number_format($values["item_price"], 2); ?></td>
                           <td><a href="select_packaging.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                      </tr>  
                      <?php  
                                $total = $total + $values["item_price"];  
                           }  
                      ?>
                     
                      <tr>  
                           <td colspan="2" align="right">Total</td>  
                           <td align="right">N<?php echo number_format($total, 2);?></td>  
                           <td></td>  
                      </tr>
                      <tr>
                      <input type="hidden" name="package_name" value="<?php echo $values["item_name"];?>" required=""/>
                       <input type="hidden" name="package_price" value="<?php echo $values["item_price"]; ?>"/>
                       <input type="hidden" name="package_cat" value="<?php echo $values["item_cat"];?>"/>
                       <input type="hidden" name="package_img" value="<?php echo $values["item_image"];?>"/>
                       <input type="submit" name="step_2" value="Go to Step 2" class="btn"/>
                    </tr>

                      <?php  
                      }  
                      ?>                      
                 </table>
                     
                </form>
            </div>
            <br><br>
            <div>
                <div class="table-responsive" style="margin-top: 5px; color: grey;">
                    <table class="table table-bordered" style="color: grey;">  
                        <tr style="font-weight: bolder; font-size: 1.2em;">  
                           <th width="20%">Size</th>  
                           <th width="50%">Guide</th>    
                      </tr>
                      <tr>
                          <td>Small</td>
                          <td>This package can contain a maximum of 5 items</td>
                      </tr>
                      <tr>
                          <td>Medium</td>
                          <td>This package can contain a maximum of 8 items</td>
                      </tr>
                      <tr>
                          <td>Large</td>
                          <td>This package can contain a maximum of 12 items</td>
                      </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="middle2 col-md-6" style="width: 65%; margin-right: 2px; float: left; height: 100%; max-height: 600px; margin-left: 5px; padding: 0;">
                <div class="container" style="width:100%; height: 90%;">  
                <h3 align="left" style="margin-top: 5px; color: grey;">Step 1: Choose Packaging</h3>
                <h5 align="left" style="margin-top: 10px; color: grey;">Click to <b>Select</b> preferred Hamper packaging in your shopping cart</h5>
                
                
                <div class="" style=" max-height: 600px; overflow: scroll;">
                <?php
                global $connect;
                $query = "SELECT * FROM tbl_product WHERE type='packaging' ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>
                                  
            <div class="col-md-4">
                <form action="select_packaging.php?action=add&type=<?php echo $row["type"]; ?>" method="post">
                    <div class="col-m" style="margin-bottom: 10px;">								
                    <img src="myimages/<?php echo $row["image"]; ?>" class="img-responsive" alt="">
                    <input style="float: center;" type="submit" name="add_package" value="Select" class="btn btn-default"/>
                    <div class="mid-1" style="height: 190px;">
                                <div class="">
                                        <h6><?php echo $row["name"]; ?></h6>							
                                </div>
                                <div class="mid-2"  style="border-radius: 2px;">
                                        <p ><em class="item_price">N<?php echo $row["price"]; ?></em></p>
                                </div>

                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                                <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />  
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                                <input type="hidden" name="hidden_cat" value="<?php echo $row["category"]; ?>"/>
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
                    </div>
                 </div>
                </form>
        </div> 
                <?php  
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
 </div>
</body>
</html>

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

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
        <script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>
<script>
 function submitForm()
 {
      document.getElementById('add_package').submit();
 }
</script>