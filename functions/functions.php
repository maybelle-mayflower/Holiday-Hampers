<?php
$con = mysqli_connect("localhost", "root", "", "ecom");
if(mysqli_connect_errno()){
    echo "Failed to connect to database: ". mysqli_connect_error($con);
}
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
function getTop(){
    
     global $con;
    $get_pro = "Select * from products LIMIT 4";
    $run_pro = mysqli_query($con, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_img = $row_pro['product_image'];
        
    echo "<div class='col-md-3 m-wthree'>"
        . "<div class='col-m'>
        <a href='#' data-toggle='modal' data-target='#myModal1' class='offer-img'>
    <img src='images/of.png' class='img-responsive' alt=''>
    <div class='offer'><p><span>Top Seller</span></p></div>
    </a>
        <div class='mid-1'>
    <div class='women'>
            <h6><a href='single.html>Moong</a>(1 kg)</h6>							
    </div>
    <div class='mid-2'>
            <p ><label>$2.00</label><em class='item_price'>$1.50</em></p>
              <div class='block'>
                    <div class='starbox small ghosting'> </div>
            </div>
            <div class='clearfix'></div>
    </div>
    <div class='add'>
       <button class='btn btn-danger my-cart-btn my-cart-b ' data-id='1' data-name='Moong' data-summary='summary 1' data-price='1.50' data-quantity='1' data-image='images/of.png'>Add to Cart</button>
    </div>
</div>
</div>
</div>";
    }
    
}
function getModal($id, $title, $image, $price, $desc){
   echo '<div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
                                                                                            <img src="admin/product_img/'.$image.'" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>'.$title.'</h3>
                                                                         <div class="clearfix"></div>
									<div class="price_single">
                                                                        <p><em>N'.$price.'</em></p>
					
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc">'.$desc.'</p>
									 <div class="add-to">
										   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="'.$id.'" data-name="'.$title.'" data-summary="summary 24" data-price="'.$price.'" data-quantity="1" data-image="admin/product_img/'.$image.'">Add to Cart</button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>';
}
function getPro(){
    global $con;
    $get_pro = "Select * from products";
    $run_pro = mysqli_query($con, $get_pro);
    while ($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_img = $row_pro['product_image'];

 echo "<div class='col-md-3 pro-1'>
        <div class='col-m'>
        <a href='single.html' data-toggle='modal' data-target='#myModal17' class='offer-img'>
                        <img src='admin/product_img/$pro_img' class='img-responsive' alt='' width='180' height='120'>
                </a>
                <div class='mid-1'>
                        <div class='women'>
                                <h6><a href='single.html'>$pro_title</a></h6>							
                        </div>
                        <div class='mid-2'>
                                <p ><em class='item_price'> $$pro_price</em></p>
                                  <div class='block'>
                                        <div class='starbox small ghosting'> </div>
                                </div>
                                <div class='clearfix'></div>
                        </div>
                                <div class='add add-2'>
                           <button class='btn btn-danger my-cart-btn my-cart-b' data-id='$pro_id' data-name='$pro_title' data-summary='summary 1' data-price='$pro_price' data-quantity='1' data-image='admin/product_img/$pro_img'>Add to Cart</button>
                        </div>
                </div>
        </div>
</div>";

        
    /*    echo "<div id='single_product'>"
        . "<h3>$pro_title</h3>"
                . "<img src='admin/product_img/$pro_img' width='180' height='180'/>"
                . "<p><b> N $pro_price</b></p>"
                . "<a href='details.php?pro_id=$pro_id' style='float:left;'>View</a>"
                . "<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a></div>";*/

    }
}
?>