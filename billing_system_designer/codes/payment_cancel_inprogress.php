<?php
require '../core/init.php';
$general->logged_out_protect();

$username  = htmlentities($user['username']);
$user_id  = htmlentities($user['id']);

//$id = $_GET['id'];
$view_payment = $billing->cancel_site_inprogress($user_id); 

?>

<!doctype html>
<html>

<head>
<div align="center">
    <h1><img src="image/invoice1.png" /></h1>
  
 </div>
<form>
<button formaction="cancelled_inprogress10.php">Go Back</button> <br><br><br><br>
</form>
</head>

<body>

    <header>
    </header>
    <table align="center" width="1000" border="5" cellspacing="5" cellpadding="5">
    <th>Amount Deducted</th>
    <th>Amount Due</th>
    <th>Payment Method</th>
    <th>Amount Paid</th>
    <th>Date</th>
    <th>Amount Forfeited</th>

     				<?php foreach ($view_payment as $row) { ?>
                    <div>
                    <?php $perc = 10;
                          $amt_due_p = ($row['amount'] - 700);
                          $perc_deduct = ($perc / 100) * $amt_due_p;
                          $amount_due = ($amt_due_p - $perc_deduct); ?>
					
                        <tr>
                        <td><p><?php echo "R 700"; ?></p></td>
                        <td><p><?php echo "R "; ?><?php echo $perc_deduct; ?></p></td>
                        <td><p><?php echo $row['payment_method']; ?></p></td>
                        <td><p><?php echo "R " ; ?><?php echo $row['amount']; ?></p></td>
                        <td><p><?php echo $row['date']; ?></p></td>
                        <td><p><?php echo "R ". $amount_due; ?></p></td>
                        </tr>
                    </div>
                   <?php } ?> 
    </table>          
                  
</body>

</html>
