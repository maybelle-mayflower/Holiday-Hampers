<?php
session_start();


include './functions/functions.php';
require_once './config/db.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>Hampers::Login</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
            <h1><a href="customize_home.php">Hampers<span>The Best Supermarket</span><b>N<br>G</b></a></h1>
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
				</div>
        <div class="clearfix"></div>

    </div>
</div>
  <!---->
 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Login</h3>
                <h4><a href="customize_home.php">Home</a><label>/</label>Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<!--login-->

	<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Login</h3>
                                        <form action="login.php" method="post">
                                            <label align="left">Email : </label>
                                                    <div class="key">
                                                     <input  type="text" value="" name="email" required="">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
							<div class="clearfix"></div>
                                                    </div>
						
						<label align="left">Password : </label>
                                                <div class="key">
                                                    <input  type="password" value="" name="password" required="">
                                                        <i class="fa fa-lock" aria-hidden="true"></i>
							<div class="clearfix"></div>
                                                </div>
						<input type="submit" name="login" value="login">
					</form>
                               </div>
				<div class="forg">
					<a href="#" class="forg-left">Forgot Password</a>
					<a href="customers/register.php" class="forg-right">Register</a>
				<div class="clearfix"></div>
				</div>
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
                                <li><a href="customers/register.php">Register</a></li>
				<li><a href="wishlist.html">Wishlist</a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="copy-right">
			<p> &copy; 2017 Hampers. All Rights Reserved</p>
		</div>
	</div>
</div>
<!-- //footer-->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>

</body>
</html>
<?php
global $connect;
if(isset($_POST['login']))
    {
        $user_email = $_POST["email"];
        $user_pass = $_POST["password"];
        $hashedpass = "SELECT customer_pass from customers WHERE customer_email = '$user_email' AND status = 1";
        
        $result = mysqli_query($connect, $hashedpass);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        
        if($count == 1 && (password_verify($user_pass, $row['customer_pass'])))
        {
            $_SESSION['customer_email']=$user_email;
            echo"<script>window.open('customize_home.php','_self')</script>";  
        }
        else
        {
           echo"<script>alert('Email or Password is incorrect')</script>"; 
        }
}
?>