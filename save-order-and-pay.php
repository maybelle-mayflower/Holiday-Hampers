<?php
  
session_start();  
require './config/db.php'; 
require 'paystack/src/autoload.php';
use Yabacon\Paystack;
use Yabacon\Paystack\MetadataBuilder;


global $connect;
if(isset($_POST["pay_now"]))
{
    $cartid = 1;
    $cemail = $_POST["email_prepared_for_paystack"];
    $amount = $_POST["amount"];
    $refno = $_POST["refno"];
    $cid = $_POST["cid"];
    
    $insert_order = "INSERT INTO saved_orders (customer_id,ref_no,total,c_email) VALUES('$cid','$refno','$amount','$cemail')";
    $run = mysqli_query($connect, $insert_order);
    if($run){
        $cartid = mysqli_insert_id($connect);
    }
    try{
    $paystack = new Yabacon\Paystack("sk_test_89c7bd39efd3ae90d3a12159620d1e9043a63a45");
    $paystack->disableFileGetContentsFallback();
    $trx = $paystack->transaction->initialize([
        'amount'=>$amountinkobo,
        'email'=>$email,
        'callback_url'=> "http://78.110.170.51/hamperstest/verify.php"   //change this to your your application's url. this is where Paystack will redirect the user to after a payment.
    ]);
    //echo "Worked <br />";
    } catch(Exception $e){
        http_response_code(400);
        //echo "something went wrong <br />";
        die($e->getMessage());
    }


// the $trx contains the response from the transaction initialization
//print_r($trx);

//these are the returned values, you can save the $ref so you can use it to query the verify transaction endpoint in your webhook, incase something happens and the user isn't returned. 
$status = $trx->status;
$ref = $trx->data->reference;
$auth_url = $trx->data->authorization_url;


// redirect to page so User can pay
header('Location: ' . $trx->data->authorization_url);

}