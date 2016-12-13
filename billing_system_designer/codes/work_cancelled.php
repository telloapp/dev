
<?php
require '../core/init.php';
$general->logged_out_protect();
//$id ='1';
//$id = $_GET['id'];
$username  = htmlentities($user['username']);
$user_id  = htmlentities($user['id']);

$list_work_inprogress = $billing->site_cancelled($user_id);
$all_site_data = $billing->all_site_data(); 

?>

<!doctype html>
<html>

<head>
  <div align="center">
  <b>Cancelled Sites!</b>
</div>
<form>

<button formaction="Cancelled_inprogress10.php">Go Back</button> <br><br><br><br>

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
                      <td><a href="view_payment_cancelled.php?id=<?php echo $row['id']; ?>">Payment From Tello</a></td>                     
                    </form>

                    </dev>
                   </tr>
                  <?php } ?>
   </table>
</body>

</html>
