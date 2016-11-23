
<?php
require '../designers/init.php';
$general->logged_out_protect();
//$id ='1';
//$id = $_GET['id'];
$username  = htmlentities($user['username']);
$user_id  = htmlentities($user['id']);

$list_work_inprogress = $billing->site_completed($user_id);
//$all_site_data = $billing->all_site_data(); 
?>

<!doctype html>
<html>
<title>completed sites</title>

<head>
  <div align="center">
  <h1><img src="image/completed.jpg" /></h1>
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
                      <td><a href="view_payment_complete.php?id=<?php echo $row['id']; ?>">View Payment From Client</a></td>                     
                    </form>

                    </dev>
                   </tr>
                  <?php } ?>
   </table>
</body>

</html>
