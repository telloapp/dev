<?php
require '../core_admin/init.php';
$general->logged_out_protect();

$username  = htmlentities($user['username']);
//$user_id  = htmlentities($user['id']);

$id = $_GET['id'];
//$user_id = $_GET['user_id'];
$view_payment = $admin_billing->view_payment_inprogress($id,$user_id); 
//$view_payment = $admin_billing->get_site_name($user_id); 

?>
<!doctype html>
<html>
<head>

<div align="center">
    <h1><img src="image/invoice1.png" /></h1>
  
 </div>
 
<!--a href ="work_designer_inprogress.php">Go Back</a> <br><br><br><br-->

</head>

<body>

    <header>
    </header>
    <table align="center" width="1000" border="5" cellspacing="5" cellpadding="5">
    <th>Payment Type</th>
    <th>Payment Method</th>
    <th>Amount Paid</th>
    <th>Date</th>

     				<?php foreach ($view_payment as $row) { ?>
                    <div>                   					
                        <tr>
                        <td><p><?php echo $row['payment_type']; ?></p></td>
                        <td><p><?php echo $row['payment_method']; ?></p></td>
                        <td><p><?php echo "R " ; ?><?php echo $row['amount']; ?></p></td>
                        <td><p><?php echo $row['date']; ?></p></td>
                        </tr>
                    </div>
                   <?php } ?> 
    </table>          
                  
</body >

</html>
