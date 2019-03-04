<?php
include './seller_functions/functions.php';
?>
<!doctype html>
<html lang="en">
<head>
<title>Product Entry Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Product Order Form Widget Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- fonts  -->
<link href="//fonts.googleapis.com/css?family=Metrophobic" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Nova+Flat" rel="stylesheet">
<!-- /fonts -->
<!-- css -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" /> 
<!-- /css -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
<h1 class="header-agileits w3layouts w3 w3l w3ls">Product Entry Form</h1>
<div class="content-w3ls agileits agileinfo wthree">
    <form action="insert_btn.php" method="post" enctype="multipart/form-data">
		<div class="form-wthree1 agileits agileinfo wthree">
		
			<div class="form-control"> 
				<label class="header">Title<span>:</span></label>
				<input type="text" id="firstname" name="product_title" required="">
			</div>
			
			<div class="form-control">	
				<label class="header">Category <span>:</span></label>
                                <select name="product_cat" required="">
                                    <option>Select a category</option>
                                    <?php getCat();?>
                                </select>
			</div>
			
			<div class="form-control">	
				<label class="header">Brand <span>:</span></label>
                                <select name="product_brand" required="">
                                    <option>Select a brand</option>
                                    <?php getBrand();?>
                                </select>
			</div>
		
		</div>
		<div class="clear"></div>
		
		<div class="form-control1"> 
			<label class="header">Image <span>:</span></label>
                        <input type="file" id="pro_img" name="product_image"/>
		</div>
		
		<div class="form-wthree3 w3-agileits agileits-w3layouts agile">
			<div class="form-control"> 
				<label class="header">Price <span>:</span></label>
                                <input type="number" id="city" name="product_price" required="">
			</div>
		
			<div class="form-control"> 
				<label class="header">Description <span>:</span></label>
                                <textarea id="zip" name="product_desc" cols="62" rows="10"></textarea>
			</div>
		</div>
	
		<div class="clear"></div>
                <div class="form-control"> 
                            <label class="header">Keywords<span>:</span></label>
                            <input type="text" id="keywords" name="product_keyword">
                </div>
		
		<div class="form-control last">
                    <input type="submit" name="insert_pro" class="register" value="Insert Product">
			<!--<input type="reset" class="reset" value="Reset">-->
			<div class="clear"></div>
		</div>	
	</form>
</div>
<p class="copyright w3layouts w3 w3l w3ls">© 2017. All Rights Reserved | </p>
</body>
</html>