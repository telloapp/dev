<?php
require '/core/init.php';
$general->logged_out_protect();
//$id ='1';

$username  = htmlentities($user['username']);
//$user_id  = htmlentities($user['id']);

//$user_id = $_GET['user_id'];
$list_completed_client = $admin_client->show_all_complains();


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
                    	<td><a href="complaints_details.php?id=<?php echo $row['id']; ?>">View Client Details</a></td>                   	
                    </form>

                    </dev>
                   </tr>
                  <?php } ?>
   </table>
</body>

</html>
