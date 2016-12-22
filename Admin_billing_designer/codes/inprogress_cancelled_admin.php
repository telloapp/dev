<?php
require '../core_admin/init.php';
$general->logged_out_protect();
//$id ='1';

$username  = htmlentities($user['username']);
//$user_id  = htmlentities($user['id']);

//$user_id = $_GET['user_id'];
$list_work_inprogress = $admin_billing->cancelled_inprogress();
//$all_site_data = $billing->all_site_data(); 

?>

<!doctype html>
<html>

<head>
  <div align="center">
  <b>Sites still in progress!</b>
</div>
<form>

<a href="cancelled_inprogress11.php">Go Back</a><br><br><br><br>

</form>
<hr>

</head>

<body>

    <header>
    </header>

    <table align="center" width="1000" border="5" cellspacing="5" cellpadding="5">
    
    <th>Username</th>
    <th>Site name</th>
    <th>Details</th>
    
    
                  <?php foreach ($list_work_inprogress as $row) { ?>
                  	<tr>
                  	<dev>
                  		
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['site_name']; ?></td>

                    <form>                   
                    	<td><a href="payment_cancel_inprogressAd.php?id=<?php echo $row['id']; ?>">View Details</a></td>                   	
                    </form>

                    </dev>
                   </tr>
                  <?php } ?>
   </table>
</body>

</html>
