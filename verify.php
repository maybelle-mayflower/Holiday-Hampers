<?php

require 'paystack/src/autoload.php';

// documented at https://github.com/yabacon/paystack-php

use Yabacon\Paystack;
use Yabacon\Paystack\MetadataBuilder;


// Confirm that reference has not already gotten value
// This would have happened most times if you handle the charge.success event.
// If it has already gotten value by your records, you may call 
// perform_success()

// Get this from https://github.com/yabacon/paystack-class

// if using https://github.com/yabacon/paystack-php
// require 'paystack/autoload.php';

$paystack = new Paystack('sk_test_89c7bd39efd3ae90d3a12159620d1e9043a63a45');
// the code below throws an exception if there was a problem completing the request, 
// else returns an object created from the json response
$trx = $paystack->transaction->verify(
	[
	 'reference'=>$_GET['reference']
	]
);
// status should be true if there was a successful call
if(!$trx->status){
    exit($trx->message);
}
// full sample verify response is here: https://developers.paystack.co/docs/verifying-transactions
if('success' == $trx->data->status){
	// use trx info including metadata and session info to confirm that cartid
  // matches the one for which we accepted payment
  give_value($reference, $trx);
  perform_success();
}

// functions
function give_value($reference, $trx){
  // Be sure to log the reference as having gotten value
  // write code to give value
}

function perform_success(){
  // inline
  echo json_encode(['verified'=>true]);
  // standard
  header('Location: /success.php');
	exit();
}
?>

