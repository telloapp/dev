<?php
$thispage = 'upload';
error_reporting(E_ALL);
require './core/init.php';
$general->logged_out_protect();
$user_id  = htmlentities($user['id']);

$all_client_complited=$client_payment->all_complated($user_id);
?>

<table width="100%" border="1" cellspacing="1" cellpadding="1">
              <tr>
                <td><h4>Contact</h4></td>
                <td><h4>User Name</h4></td>
                <td><h4>invoice</h4></td>
                <td><h4>Payment Type</h4></td>
                <td><h4>Payment Type</h4></td>
                <td><h4>Amount</h4></td>
                <td><h4>Date</h4></td>

              </tr>
              
<?php 

foreach($all_client_complited as $key) {?> 
                           <tr> 
              <td><a><?php echo $key['contacts'] ?></a></td>
              <td><a><?php echo $key['username'] ?></a></td>
              <td> <a href="index1.php?u_id=<?php echo $key['u_id'];?>">Upload your invoce</a>&nbsp;&nbsp;&nbsp;<a href="view.php?u_id=<?php echo $key['u_id'];?>">View</a></td>
              <td><a><?php echo $key['payment_type'] ?></a></td>
              <td><a><?php echo $key['payment_method'] ?></a></td>
              <td><a><?php echo $key['amount'] ?></a></td>
              <td><a><?php echo $key['date'] ?></a></td>
             
                            
  <th>
  
  
   </th>
   </tr>
  
<?php }?>