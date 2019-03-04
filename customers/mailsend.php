<!DOCTYPE html>
<html>
   <head>
      <title>Sending email/title>
   </head>
   
   <body>
      <?php
        session_start();

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'tester';

         $con = mysqli_connect($host, $user, $pass,$database);

          $pass = $_POST["password"];
          $email = $_POST["email"];
          $name = $_POST["name"];

          $_SESSION["email_id"]=$email;
          $_SESSION["passwd"]=$pass;
          $_SESSION["cname"]=$name;

          $a = rand(100,999999);
           //echo $a;
            $_SESSION["random"]=$a;


         $to = $email;
         $subject = "Your Registration Verification Code";
         
         $message = $a;
         
         $header = "From:jenniferejeme@gmail.com \r\n";
         $header = "Cc:jenniferejeme@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail($to,$subject,$message,$header);
         
         if( $retval == true ) {
           // echo "Message sent successfully...";
              echo "check your email for verification code".'<br>';
            
            $sql = "insert into random(test,email,verification) values (NULL,'$email',$a)";
            $run = mysqli_query($con,$sql);
            if($run){
                include ('verifyemail.php');
            }
            else{echo 'could not insert: '.mysqli_error($con);}

         }else {
            echo "Message could not be sent...";
         }
      ?>
      
   </body>
</html>				