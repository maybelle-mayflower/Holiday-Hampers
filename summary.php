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
<!-- js -->
   <script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
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
<!-- start-smoth-scrolling -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
<!---//End-rate---->

</head>
<body>
<div class="header">

		<div class="container">
			
			<div class="logo">
                                <h1><a href="index.php">Hampers<span>The Best Supermarket</span><b>N<br>G</b></a></h1>
			</div>
			<div class="head-t">
				<ul class="card">
					<li><a href="wishlist.html" ><i class="fa fa-heart" aria-hidden="true"></i>Wishlist</a></li>
                                        <?php
                                         if(!isset($_SESSION['customer_email'])){
                                             echo '<li><a href="register.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>';
                                             echo"<li><a href='login.php'><i class='fa fa-user' aria-hidden='true'></i>Login</a></li>";
                                         }
                                         else{
                                             echo"<li><a href='logout.php'><i class='fa fa-user' aria-hidden='true'></i>Logout</a></li>";
                                             echo "<li><a href='customers/my_account.php' ><i class='fa fa-file-text-o' aria-hidden='true'></i>Account</a></li>";

                                         }
                                         ?>
					<li><a href="shipping.html" ><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li>
				</ul>	
			</div>
				<div class="nav-top">
					<nav class="navbar navbar-default">
					
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
			</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
                                                    <li class=" active"><a href="customize_hamper.php" class="hyper "><span>Home</span></a></li>
                                                        <li><a href="contact.html" class="hyper"><span>About</span></a></li>
                                                        <li><a href="contact.html" class="hyper"><span>Packaging</span></a></li>
							<li><a href="contact.html" class="hyper"><span>Contact Us</span></a></li>
						</ul>
					</div>
					</nav>
                                    <div>
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
                                             echo '<h4 align="right">Welcome <b>'.$current_name.'</b></h4>';
                                             ?>

                                    </div>
					 <div class="cart">
                                             
                                             <span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
					</div>
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>
  <!---->

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="js/jquery.vide.min.js"></script>

<!--content-->
<div class="content-top ">
	<div class="container ">
		<div class="spec ">
			<h3 align="left">Summary</h3>
		</div>
		
	</div>
	</div>

 
<!--content-->
<div class="container" style="width: 100%;">
    <?php
    $connect2 = mysqli_connect("localhost", "root", "", "tester"); 
    if(isset($_POST["move_to_cart"])){
        $insert_order = "INSERT INTO hampers(customer_id,hamper_name,creation_date) VALUES($current_id,'My Hamper','".date('Y-m-d')."')";
        $order_id = "";
        if(mysqli_query($connect2, $insert_order)){
            
            $order_id= mysqli_insert_id($connect2);
            echo'<script>alert("order_id : '.$order_id.'")</script>';
        }
        else
        {
            echo'<script>alert("failed insert order'. mysqli_error($connect2).'")</script>';
        }
        $_SESSION["order_id"] = $order_id;
        $order_details ="";
        foreach($_SESSION["shopping_cart"] as $keys =>$values)
        {
            $order_details .= "INSERT INTO hamper_details(order_id, product_name, product_price, product_quantity)  
                          VALUES('".$order_id."', '".$values["item_name"]."', '".$values["item_price"]."', '".$values["item_quantity"]."');  
                          "; 
        }   
        $multi_insert = mysqli_multi_query($connect2, $order_details);
        if($multi_insert)
        { 
            unset($_SESSION["shopping_cart"]);
            echo'<script>alert("Thank you for your order!")</script>';
            echo'<script>window.location.href="cart.php"</script>';
        }
    }
    if(isset($_SESSION["order_id"])){
        $customer_details='';
        $order_details='';
        $total =0;
        $query = 'SELECT * FROM hampers INNER JOIN hamper_details ON hamper_details.order_id = hampers.order_id INNER JOIN customers ON customers.customer_id=hampers.customer_id WHERE hampers.customer_id ="1" GROUP BY hampers.order_id, hamper_details.id';
        $result = mysqli_query($connect2, $query);
        while($row = mysqli_fetch_assoc($result)){
            $customer_details = '<label>'.$row["customer_name"].'</label><p>'.$row["customer_address"].
                    '</p><p>'.$row["customer_city"].','.$row["customer_number"].'</p>';
             $order_details .= "  
                               <tr>  
                                    <td>".$row["product_name"]."</td>  
                                    <td>".$row["product_quantity"]."</td>  
                                    <td>".$row["product_price"]."</td>  
                                    <td>".number_format($row["product_quantity"] * $row["product_price"], 2)."</td>  
                               </tr>  
                          ";  
                          $total = $total + ($row["product_quantity"] * $row["product_price"]);  
        }
                    echo '  
                     <h3 align="center">Order Summary for Order No.'.$_SESSION["order_id"].'</h3>  
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
                                                   <td colspan="3" align="right"><label>Total</label></td>  
                                                   <td>'.number_format($total, 2).'</td>  
                                              </tr>  
                                         </table>  
                                    </td>  
                               </tr>  
                          </table>  
                     </div>  
                     ';   
    }
}
else
{
    echo "<h4 align='right'>Welcome Guest</h4>";
}
?>
</div>
<!--footer-->
<div class="footer">
	<div class="container">
		<div class="col-md-3 footer-grid">
			<h3>About Us</h3>
			<p>Nam libero tempore, cum soluta nobis est eligendi 
				optio cumque nihil impedit quo minus id quod maxime 
				placeat facere possimus.</p>
		</div>
		<div class="col-md-3 footer-grid ">
			<h3>Customer Services</h3>
			<ul>
				<li><a href="shipping.html">Shipping</a></li>
				<li><a href="terms.html">Terms & Conditions</a></li>
				<li><a href="faqs.html">Faqs</a></li>
				<li><a href="contact.html">Contact</a></li>						 
			</ul>
		</div>
		<div class="col-md-3 footer-grid">
			<h3>My Account</h3>
			<ul>
				<li><a href="login.html">Login</a></li>
				<li><a href="register.html">Register</a></li>
				<li><a href="wishlist.html">Wishlist</a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="copy-right">
			<p> &copy; 2017 Hampers. All Rights Reserved</p>
		</div>
	</div>
</div>

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>
  
  <!-- product -->
</body>
</html>