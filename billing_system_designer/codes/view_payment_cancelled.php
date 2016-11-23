<?php
require '../designers/init.php';
$general->logged_out_protect();

$username  = htmlentities($designer['username']);
$user_id  = htmlentities($designer['id']);

$id = $_GET['id'];
$view_payment = $billing->view_payment_cancelled($id,$user_id); 

?>

<!doctype html>
<html>

<head>
<div align="center">
    <h1><img src="image/invoice1.png" /></h1>
  
 </div>
<form>
<button formaction="work_cancelled.php">Go Back</button> <br><br><br><br>
</form>
</head>

<body>

    <header>
    </header>
    <table align="center" width="1000" border="5" cellspacing="5" cellpadding="5">
    <th>Amount Deducted</th>
    <th>Payment Method</th>
    <th>Amount Paid</th>
    <th>Date</th>
    <th>Amount Due</th>

     				<?php foreach ($view_payment as $row) { ?>
                    <div>
                    <?php $amt_due = ($row['amount'] - 700); ?>
					
                        <tr>
                        <td><p><?php echo "R 700"; ?></p></td>
                        <td><p><?php echo $row['payment_method']; ?></p></td>
                        <td><p><?php echo "R " ; ?><?php echo $row['amount']; ?></p></td>
                        <td><p><?php echo $row['date']; ?></p></td>
                        <td><p><?php echo "R ". $amt_due; ?></p></td>
                        </tr>
                    </div>
                   <?php } ?> 
    </table>          
                  
</body>

</html>
