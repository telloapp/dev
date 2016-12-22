<?php
require '../core_admin/init.php';
$general->logged_out_protect();
//$id ='1';

$username  = htmlentities($user['username']);
//$user_id  = htmlentities($user['id']);

//$user_id = $_GET['user_id'];
$list_work_compltd = $admin_billing->list_payment_tello();
//$all_site_data = $billing->all_site_data(); 

?>

<!doctype html>
<html>

<head>
  <div align="center">
  <b>Sites Complete!</b>
</div>
<form>

<a href="bill_homepage.php">Go Back</a><br><br><br><br>

</form>
<hr>

</head>

<body>

    <header>
    </header>

    <table align="center" width="1000" border="5" cellspacing="5" cellpadding="5">
    
    <th>Username</th>
    <th>Amount Paid</th>
    <th>Site Name</th>
    <th>Amount Due </th>
    
    
    
                  <?php foreach ($list_work_compltd as $row) { ?>

                  <?php $amt_due = ($row['amount'] - 700); ?>
                  	<tr>
                  	
                  		
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo "R "; ?><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['site_name']; ?></td>
                    <td><?php echo "R "; ?><?php echo $amt_due; ?></td>

                    

                    
                   </tr>
                  <?php } ?>
   </table>
</body>

</html>
