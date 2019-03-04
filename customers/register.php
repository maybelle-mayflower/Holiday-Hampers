<?php
include '../functions/functions.php';
require_once '../config/db.php';
   

global $connect;
if(isset($_POST['register'])){
    $ip = getIp();
    
    $c_name=$_POST['name'];
    $c_email=$_POST['email'];
    $c_pass=$_POST['password'];
    $confirm_pass=$_POST['confirm_password'];
    $code = md5(uniqid(rand(10, 1000)));
    
    if($c_pass==$confirm_pass)
    {
        $hashToStoreInDb = password_hash($c_pass, PASSWORD_BCRYPT);
        $validate_email="SELECT * FROM customers WHERE customer_email='$c_email'";
        $val_run= mysqli_query($connect, $validate_email);
        if(!mysqli_num_rows($val_run)>0)
        {
            $insert_customer = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,code,status) values ('$ip','$c_name','$c_email','$hashToStoreInDb','$code','0')";
            $customer_res = mysqli_query($connect, $insert_customer);
            if($customer_res)
                {
                    $to = $c_email;
                    $subject = "Your confirmation link";
                    $header = "from: HampersNG";
                    
                    $message ="Your Confirmation Link \r\n";
                    $message.="Click on this link to activate your account \r\n";
                    $message.="http://78.110.170.51/hamperstest/customers/verifyemail.php?passkey=$code";
                    
                    $sentmail = mail($to, $subject,$message,$header);
                    /*$_SESSION['customer_email']=$c_email;
                    header("Location: ../login.php?success=true");
                    exit();*/
                }
                else
                {
                    echo'<script>alert("Account creation error'.mysqli_error($connect).'")</script>';
                }
                if($sentmail){
                    echo "<script>alert('A Confirmation Link Has Been Sent To Your Email Address! Please Verify your Email Address to Login')</script>";
                }
                else{
                    echo "Email could not be sent";
                }
        }
        else
        {
            echo "<script>alert('Email is already been registered!')</script>";
        }
    }
    else
    {
        echo "<script>alert('Passwords do not match!')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Hampers::Register</title>
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
<!--- start-rate---->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="../css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
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
                                        <li><a href="register.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
                                        <?php
                                         if(!isset($_SESSION['customer_email'])){
                                             echo"<li><a href='../login.php'><i class='fa fa-user' aria-hidden='true'></i>Login</a></li>";
                                         }
                                         else{
                                             echo"<li><a href='../logout.php'><i class='fa fa-user' aria-hidden='true'></i>Logout</a></li>";
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
                                                    <li class=" active"><a href="../customize_home.php" class="hyper "><span>Home</span></a></li>
                                                    <li><a href="../about.php" class="hyper"><span>About</span></a></li>
                                                        <li><a href="../select_packaging.php" class="hyper"><span>Build a Hamper</span></a></li>
                                                        <li><a href="../contact.php" class="hyper"><span>Contact Us</span></a></li>
						</ul>
					</div>
					</nav>
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>
  <!---->

     <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Register</h3>
                <h4><a href="../customize_home.php">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!--login-->

	<div class="register">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
                                        <form  name="reg" action="register.php" method="post">
                                                <label align="left">Name : </label>
                                                <div class="key">
                                                    <input  type="text" value="" name="name" required="">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
							<div class="clearfix"></div>
                                                </div>
                                                        
                                                    <label align="left">Email : </label>
                                                    <div class="key">
                                                     <input  type="text" value="" name="email" required="">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
							<div class="clearfix"></div>
                                                    </div>
						
						<label align="left">Password : </label>
                                                <div class="key">
                                                    <input  type="password" id="password" name="password" required="">
                                                        <i class="fa fa-lock" aria-hidden="true"></i>
							<div class="clearfix"></div>
                                                </div>
						
						<label align="left">Confirm Password : </label>
                                                <div class="key">
                                                    <input  type="password" value="" id="confirm_password" name="confirm_password" required="" onchange="checkPasswordMatch();"/>
                                                    <i class="fa fa-lock" aria-hidden="true"></i>
							<div class="clearfix"></div>
                                                </div>
                       
                                                <div class="registrationFormAlert" id="divCheckPasswordMatch">
                                                    
                                                </div>
                                                <p>I agree with the <a href="#" data-toggle="modal" data-target="#termsconditionsmodal" style="text-decoration: underline;">Terms & Conditions </a> <input type="checkbox" onchange="document.getElementById('register').disabled =!this.checked;" required=""/></p><br>
                                                
                                                <input type="submit" id="register" name="register" value="Submit"/>
                                                
					</form>
				</div>
				
			</div>
		</div>

<!---Modal-->
<div class="modal fade" id="termsconditionsmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 500px;">
            <div class="modal-content modal-info">
                    <div class="modal-header">
                        <h3>Terms and Conditions</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
                    </div>
                    <div class="modal-body modal-spa">
                        
                        <p style="margin-top: 30px">Terms and conditions go here</p>
                    </div>
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
				<li><a href="../login.php">Login</a></li>
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
<script>
    function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#confirm_password").val();
    
    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
    {
        $("#divCheckPasswordMatch").html("Passwords match.");
    }
}

$(document).ready(function () {
   $("#confirm_password").keyup(checkPasswordMatch);
});

</script>

<script>
    function checkEmailAvailable() {
    var email = $("#email").val();
    
    
    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
    {
        $("#divCheckPasswordMatch").html("Passwords match.");
    }
}

$(document).ready(function () {
   $("#confirm_password").keyup(checkPasswordMatch);
});

</script>
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
<script type='text/javascript' src="../js/jquery.mycart.js"></script>
 

</body>
</html>