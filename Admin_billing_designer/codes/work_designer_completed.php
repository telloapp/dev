<?php
require '../core_admin/init.php';
$general->logged_out_protect();
//$id ='1';

$username  = htmlentities($user['username']);
//$user_id  = htmlentities($user['id']);

$user_id = $_GET['id'];
$list_work_inprogress = $admin_billing->get_sitename_completed($user_id);
//$all_site_data = $billing->all_site_data(); 

?>

<!doctype html>
<html>

<head>
  <div align="center">
  <b>Sites still in progress!</b>
</div>
<form>

<a href="designers_completed.php">Go Back</a><br><br><br><br>

</form>
<hr>

</head>

<body>

    <header>
    </header>

    <table align="center" width="1000" border="5" cellspacing="5" cellpadding="5">
    
    <th>Site Name</th>
    <th>View Payment</th>
    
    
                  <?php foreach ($list_work_inprogress as $row) { ?>
                    <tr>
                    <dev>
                      
                    <td><?php echo $row['site_name']; ?></td>

                    <form>                   
                      <td><a href="view_payment_completeAdmin.php?site_id=<?php echo $row['site_id']; ?>">View Payment From Client</a></td>                    
                    </form>

                    </dev>
                   </tr>
                  <?php } ?>
   </table>
</body>

</html>
