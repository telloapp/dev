<?php
require '../designers/init.php';
$general->logged_out_protect();

$username  = htmlentities($user['username']);
$user_id  = htmlentities($user['id']);

//$id = $_GET['id'];
$view_payment = $designer->cancel_site_inprogress(); 

?>

<!doctype html>
<html>

<head>
<div align="center">
    <h1><img src="image/invoice1.png" /></h1>
  
 </div>
<form>
<button formaction="cancelled_inprogress.php">Go Back</button> <br><br><br><br>

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
    <th>Site Name</th>

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
                        <td><p><?php echo $row['site_name']; ?></p></td>
                        </tr>
                    </div>
                   <?php } ?> 
    </table>   

                  
</body>

</html>
