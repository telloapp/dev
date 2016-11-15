<?php
$thispage = 'upload';
error_reporting(E_ALL);
require './core/init.php';
$general->logged_out_protect();
//$user_id  = htmlentities($user['id']);

$all_client_Pending=$client_payment->all_pending_ad();
?>

<table width="100%" border="1" cellspacing="1" cellpadding="1">
              <tr>
                <td><h4>Contact</h4></td>
                <td><h4>User Name</h4></td>
                <td><h4>Viev</h4></td>
                

              </tr>
              
<?php 

foreach($all_client_Pending as $key) {?> 
                           <tr> 
              <td><a><?php echo $key['contacts'] ?></a></td>
              <td><a><?php echo $key['username'] ?></a></td>
              <td><a href="view_pending.php?user_id=<?php echo $key['user_id'];?>">View</a></td>
              
             
                            
  <th>
  
  
   </th>
   </tr>
  
<?php }?>