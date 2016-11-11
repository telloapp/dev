<?php
$thispage = 'direct_tello_payment';
error_reporting(E_ALL);
require './core/init.php';

$general->logged_out_protect();

$user_id  = htmlentities($user['id']);

if (isset($_GET['submit'])) {

$payment_method               = htmlentities($_GET['payment_method']);


$client_payment-> client_pay_meth($user_id,$payment_method);
header('Location:direct_tello_payment.php');
}
?>

<html>
<head>
	<body>
<form  method="get">
 <table >

        <select name="payment_method" >

           <option value="">Payment Method</option> 
           <option value="Deposit">Deposit 50%</option>
           <option value="Full Amount">Full Amount 100%</option>
          
        </select> <br><br><br><br><br>
 
    <input type="submit" value="Save" name = "submit">
  </table>
  
  </form>

  </body>
</head>
</html>