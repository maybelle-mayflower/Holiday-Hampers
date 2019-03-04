<?php
session_start();
require_once '../config/db.php';
include '../functions/functions.php';
  
?>
<!DOCTYPE html>
<html>
<head>
<title>Hampers::Account Details</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="../js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="header">
        <div class="container">

        <div class="logo">
            <h1><a href="../customize_home.php">Hampers<span>The Best Gift this Season</span><b>N<br>G</b></a></h1>
        </div>
        <div class="head-t">
                <ul class="card">
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo '<li><a href="../register.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>';
                                echo"<li><a href='../login.php'><i class='fa fa-user' aria-hidden='true'></i>Login</a></li>";
                            }
                            else{
                                echo"<li><a href='../logout.php'><i class='fa fa-user' aria-hidden='true'></i>Logout</a></li>";
                            }
                        ?>
                        <li><a href="../shipping.php" ><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li>
                </ul>	
        </div>

    </div>
</div>
    
  <!---->
 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >My Account</h3>
                
                 <?php
                    if(isset($_SESSION['customer_email'])){
                        $current_email = $_SESSION['customer_email'];
                        $get_customer = "SELECT * FROM customers WHERE customer_email='$current_email'";
                        $run_get = mysqli_query($connect, $get_customer);
                        while($current_row= mysqli_fetch_assoc($run_get)){
                            $current_name = $current_row['customer_name'];
                            $current_id = $current_row['customer_id'];
                            $current_city = $current_row['customer_city'];
                            $current_address = $current_row['customer_address'];
                            $current_number = $current_row['customer_number'];
                            echo '<h4><a href="../customize_home.php">Home</a><label>/</label>'.$current_name.'</h4>';

                    ?>
		<div class="clearfix"> </div>
	</div>
</div>
 
<!--login-->
<div class="account_container">
    <div class="form-w3agile" style="margin-top:30px;">
                <form action="my_account.php?current_id=<?php echo $current_id; ?>" method="post">
                    <label align="left">Name : </label>
                            <div class="key">
                                <input type="text" value="<?php echo $current_name;?>" name="name" readonly="">
                                <div class="clearfix"></div>
                            </div>
                        <label align="left">Email : </label>
                        <div class="key">
                            <input type="text" value="<?php echo $current_email;?>" name="name" readonly="">
                                <div class="clearfix"></div>
                        </div>
                        <label align="left">Phone Number : </label>
                        <div class="key">
                            <input  type="text" value="<?php echo $current_number;?>" name="phone" required="">
                                <div class="clearfix"></div>
                        </div>
                        <label align="left">City : </label>
                        <div class="key">
                            <input  type="text" value="<?php echo $current_city;?>" name="city">
                                <div class="clearfix"></div>
                        </div>
                        <label align="left">Address : </label>
                        <div>
                            <textarea value="<?php echo $current_address;?>" name="address" style="width: 260px; height: 150px; border: solid 1px #999;"></textarea>
                                <div class="clearfix"></div>
                        </div>
                        <?php
                            }
                        }
//                    else {
//                        echo '<h3>Please Login to manage your account details</h3>';
//                    }
                        ?>
                        <input type="submit" name="update" value="Update">
                </form>
       </div>   
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
				<li><a href="../shipping.html">Shipping</a></li>
				<li><a href="../terms.html">Terms & Conditions</a></li>
				<li><a href="../faqs.html">Faqs</a></li>
				<li><a href="../contact.php">Contact</a></li>						 
			</ul>
		</div>
		<div class="col-md-3 footer-grid">
			<h3>My Account</h3>
			<ul>
				<li><a href="../login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="copy-right">
			<p> &copy; 2017 Hampers. All Rights Reserved</p>
		</div>
	</div>
</div>
<!-- //footer-->
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

</body>
</html>
<?php
if(isset($_POST['update'])){
    $ip = getIp();
    
    $c_id = $_GET['current_id'];
    //$c_name=$_POST['name'];
    //$c_email=$_POST['email'];
    $c_pass=$_POST['password'];
    $c_city = $_POST['city'];
    $c_address = $_POST['address'];
    $c_number = $_POST['phone'];
    
    $update_c = "update customers set customer_city='$c_city',customer_address='$c_address',customer_number='$c_number' where customer_id='$c_id'";
    $run_update = mysqli_query($connect, $update_c);
    if($run_update){
        echo "<script>alert('Account successfully updated.')</script>";
        echo "<script>window.open('../customize_home.php','_self')</script>";
    }
}
?>