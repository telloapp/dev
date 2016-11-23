<?php
require '../designers/init.php';
$general->logged_out_protect();

$username  = htmlentities($user['username']);
$user_id  = htmlentities($user['id']);

//$id = $_GET['id'];
$list_work_inprogress = $billing->view_penalties($user_id);
//$all_site_data = $billing->all_site_data(); 

?>

<!doctype html>
<html>

<head>
  <div align="center">
  <b>View Penalties!</b>
</div>
<form>

<a href="designer_index.php">Home</a><br><br><br><br>

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
                    	<td><a href="view_penalties.php?id=<?php echo $row['id']; ?>">View Penalties</a></td>                   	
                    </form>

                    </dev>
                   </tr>
                  <?php } ?>
   </table>
</body>

</html>
