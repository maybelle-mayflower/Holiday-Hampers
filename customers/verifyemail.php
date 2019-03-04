<?php

include '../config/db.php';

global $connect;
$passkey=$_GET['passkey'];
$sql1="SELECT * FROM customers WHERE code ='$passkey'";
//echo $sql1;
$result1= mysqli_query($connect,$sql1);
if($result1)
    {
    $count= mysqli_num_rows($result1);
    if($count==1)
        {
        echo "result one!";
            $rows=mysqli_fetch_array($result1);
            $email = $rows["customer_email"];
            
            $update_acct = "UPDATE customers SET status=1 WHERE customer_email = '$email'";
            $update_run = mysqli_query($connect, $update_acct);
            if($update_run){
                 header("Location: ../login.php?success=true");
                 exit(); 
            }
            else
            {
                echo "Problem verifying your account, Please contact HampersNG";
            }
            
        }
    else 
    {
        echo "Verification link is broken";
    }
}
else{
    echo "Email address not registered ";
}
?>