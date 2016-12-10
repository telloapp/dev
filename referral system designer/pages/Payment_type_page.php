<?php
$thispage = 'payment_method_page';
error_reporting(E_ALL);
require '../core/init.php';

$general->logged_out_protect();

$user_id  = htmlentities($user['id']);

$site_id = $_GET['site_id'];
$d_q_id = $_GET['d_q_id'];


if (isset($_POST['submit'])) {

$payment_method               = htmlentities($_POST['payment_method']);
$payment_type             = htmlentities($_POST['payment_type']);

if($payment_method == 'Direct Payment')
{
	$client_status = 'Pending';
}
elseif($payment_method == 'EFT payment')
{
	$client_status = 'Completed';
}
elseif($payment_method == 'Credit Payment')
{
	$client_status = 'Completed';
}



$client_payment->client_pay($user_id,$payment_method,$payment_type,$client_status,$site_id,$d_q_id);

}


?>
<html>
<head>
	<body>
<form method="POST">
 <table >

        <select name="payment_method" required="">

           <option value="">Payment Method</option> 
           <option value="Direct Payment">Direct Payment</option>
           <option value="EFT payment">EFT payment</option>
           <option value="Credit Payment">Credit Payment</option>
        </select> <br><br><br><br><br>

        <select name="payment_type" required="">

           <option value="">Payment Type</option> 
           <option value="Deposit">Deposit 50%</option>
           <option value="Full Amount">Full Amount 100%</option>
          
        </select> <br><br><br><br><br>
 
    <input type="submit" value="Save" name ="submit">
  </table>
  
  </form>

   <div class="copyright" style="background: #A9A9A9;">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 text-block" style="color: #fff;">
              &copy; <?php echo date("Y"); ?> www.handoutt.co.za All Rights Reserved.
              <br />
              
             
              <br>
            </div>
            <div class="col-xs-12 col-sm-6 logo-block">
              <!--div class="logo-image">
                <a href="index.php"><img src="images/logo/logo.png" alt="Afrilisting"></a>
              </div-->
            </div>
          </div>          
        </div>
       
        <!-- START BACK TO TOP -->
        <div id="back-to-top" class="back-to-top">
          <i class="fa fa-angle-up"></i>
        </div>
        <!-- END BACK TO TOP -->
      </div>
      <!-- END COPY

  </body>
</head>
</html>