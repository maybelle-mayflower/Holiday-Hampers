<html>
   
   <head>
      <title>Verify Email</title>
   </head>
   
   <body>
      
      <?php
       
         session_start();
        $v;
        $e="";


        $email = $_SESSION["email"];
        $passw = $_SESSION["password"];
        $name1 = $_SESSION["name"];
        $veri_code = $_POST["code"];
        
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'tester';

         $con = mysqli_connect($host, $user, $pass, $db);
         
         $retval = "select * from random where verification = $veri_code";

          $res = mysqli_query($con,$retval);
   
         while($temp=mysqli_fetch_assoc($res))
                { 
			
                    $e = $temp['email'];
                    $v = $temp['verification'];

                  }
         /* echo $v.'<br>';
          echo $e.'<br>';
          echo $email.'<br>';
          echo $passw.'<br>';
          echo $veri_code;*/
         if($v == $veri_code and $e == $email)
          {
              $sql2 = "insert into customers value ('$name','$email','$pass')";
              $run2 = mysqli_query($con,$sql2);
             
             include ('../customize_home.php');
          }
          else
          {
             echo "Code is incorrect";
           }

      ?>
      
   </body>
</html>						