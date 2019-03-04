
 <button type="button" style="cursor:pointer;" value="Pay Now" id="submit">Pay Now</button>


 <script src="js/jquery-1.11.1.min.js"></script>
 <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
<script>
 <script>
    document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("submit").addEventListener("click", function() {
    alert("test");
       /*var chargeResponse = "",
           trxref = "FDKHGK" + Math.random(),// add your transaction ref here
           pubkey = ""
         getpaidSetup({
           customer_email: "jenniferejeme@gmail.com",// 
           amount: 100,
           currency: "NGN",
           country: "NG",
           custom_logo: "http://imgur.com/uuRnkV9",
           custom_description:"",
           custom_title: "The Start",
           txref: trxref,
           PBFPubKey: pubkey,
           onclose: function(response) {},
           callback: function(response) {
             //flw_ref = response.tx.flwRef;
             console.log("This is the response returned after a charge", response);
             if(response.tx.chargeResponse =='00' || response.tx.chargeResponse == '0') {
               window.location.replace('success.php');
             } else {
                window.location.replace('customize_home.php');
             }
           }
         });*/
       });
  });

 </script>