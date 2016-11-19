<?php
require '/core/init.php';
$general->logged_out_protect();


$username  = htmlentities($user['username']);

$list_completed_client = $admin_client->show_all_revisions()



?>

<!doctype html>
<html>

<head>
  <div align="center">
  <b>Sites Complete!</b>
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
    
    
                  <?php foreach ($list_completed_client as $row) { ?>
                  	<tr>
                  	<dev>
                  		
                    <td><?php echo $row['username']; ?></td>

                    <form>                   
                    	<td><a href="all_user_revisions.php?id=<?php echo $row['id']; ?>">View Client Details</a></td>                   	
                    </form>

                    </dev>
                   </tr>
                  <?php } ?>
   </table>
</body>

</html>
