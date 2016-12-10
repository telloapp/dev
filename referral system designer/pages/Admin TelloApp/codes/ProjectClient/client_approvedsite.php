<?php
require '../../core_admin/init.php';
$general->logged_out_protect();
//$id ='1';

$username  = htmlentities($user['username']);
//$user_id  = htmlentities($user['id']);

//$user_id = $_GET['user_id'];
$show_all_approvedsite = $admin_client->show_client_approved_site();
//$all_site_data = $billing->all_site_data(); 

?>

<!doctype html>
<html>

<head>
  <div align="center">
  <b>Sites still that are Approved!</b>
</div>
<form>

<a href="manage_client.php">Go Back</a><br><br><br><br>

</form>
<hr>

</head>

<body>

    <header>
    </header>

    <table align="center" width="1000" border="5" cellspacing="5" cellpadding="5">
    
    <th>Username</th>
    <th>Details</th>
    
    
                  <?php foreach ($show_all_approvedsite as $row) { ?>
                  	<tr>
                  	<dev>
                  		
                    <td><?php echo $row['username']; ?></td>

                    <form>                   
                    	<td><a href="list_approvedsite.php?id=<?php echo $row['id']; ?>">View client Details</a></td>                   	
                    </form>

                    </dev>
                   </tr>
                  <?php } ?>
   </table>
</body>

</html>
