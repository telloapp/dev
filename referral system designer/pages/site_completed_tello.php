
<?php
require '../designers/init.php';
$general->logged_out_protect();
//$id ='1';
//$id = $_GET['id'];
$username  = htmlentities($user['username']);
$user_id = htmlentities($user['id']);

$site_complete = $billing->site_completed($user_id);
$all_site_data = $billing->all_site_data(); 

?>

<!doctype html>
<html>

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
    
    
                  <?php foreach ($site_complete as $row) { ?>
                    <tr>
                    <dev>
                      
                    <td><?php echo $row['site_name']; ?></td>

                    <form>                   
                      <td><a href="view_payment_tello.php?id=<?php echo $row['id']; ?>">View Payment From Tello</a></td>                     
                    </form>

                    </dev>
                   </tr>
                  <?php } ?>
   </table>
</body>

</html>
