<?php
require_once './config/db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Hampers</title>
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
                                <h1><a href="index.php">Hampers<span>The Best Gift this Season</span><b>N<br>G</b></a></h1>
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
                                                    <li class=" active"><a href="customize_home.php" class="hyper "><span>Home</span></a></li>
                                                    <li><a href="about.php" class="hyper"><span>About</span></a></li>
                                                    <li><a href="select_packaging.php" class="hyper"><span>Build a Hamper</span></a></li>
                                                    <li><a href="contact.php" class="hyper"><span>Contact Us</span></a></li>
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
                                             }
                                             echo '<h4 align="right">Welcome <b>'.$current_name.'</b></h4>';
                                         }
                                         else
                                         {
                                             echo "<h4 align='right'>Welcome Guest</h4>";
                                         }
                                         ?>
                                    </div>
					 <div class="cart">
                                             
                                            <!-- <span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>-->
					</div>
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>
  <!---->
  <div data-vide-bg="video/video">
    <div class="container">
		<div class="banner-info">
			<h3>Hampers Slogan Place Holder </h3>	
			<div class="search-form">
				<form action="#" method="post">
					<input type="text" placeholder="Search..." name="Search...">
					<input type="submit" value=" " >
				</form>
			</div>		
		</div>	
    </div>
</div>


    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="js/jquery.vide.min.js"></script>

<!--content-->
<div class="content-top">
	<div class="container">
		
	</div>
</div>
<div class=""align="left">
		<div class="spec">
                    <h2 align="left">Content</h2>
                   <!-- <h2 align="left">Start <a href="select_packaging.php">Here</a></h2>-->
		</div>
	</div>

  <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         <a href="kitchen.html"> <img class="first-slide" src="images/ba.jpg" alt="First slide"></a>
       
        </div>
        <div class="item">
         <a href="care.html"> <img class="second-slide " src="images/ba1.jpg" alt="Second slide"></a>
         
        </div>
        <div class="item">
          <a href="hold.html"><img class="third-slide " src="images/ba2.jpg" alt="Third slide"></a>
          
        </div>
      </div>
    </div><!-- /.carousel -->
<!--content-->

<!--content-->
	
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
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>
  
  <!-- product -->
</body>
</html>