
<?php
require '../core/init.php';
$general->logged_out_protect();

$username  = htmlentities($user['username']);
$user_id  = htmlentities($user['id']);

$id = $_GET['id'];
$view_payment = $billing->view_payment_complete($id);
$v_paymentBal = $billing->view_payment_completeBalnce($id); 

?>

<!doctype html>
<html>

<head>
<div align="center">
    <h1><img src="image/invoice1.png" /></h1>
  
 </div>
<form>
<button formaction="work_complete.php">Go Back</button> <br><br><br><br>
</form>
</head>

<body>

    <header>
    </header>

    <?php foreach ($view_payment as $rey) { ?>
    
    <?php if ($rey['payment_type'] == 'Full Amount' )  { ?>

    <table align="center" width="1000" border="5" cellspacing="5" cellpadding="5">
    <th>Payment Type</th>
    <th>Payment Method</th>
    <th>Amount Paid</th>
    <th>Date</th>
    <th>Amount Due</th>
    <th>Amount Deducted</th>

                     <?php foreach ($view_payment as $row) { ?>
                    <div>
                        <?php $amount_due = ($row['amount'] - 700); ?>
                        
                        <tr>
                        <td><p><?php echo $row['payment_type']; ?></p></td>
                        <td><p><?php echo $row['payment_method']; ?></p></td>
                        <td><p><?php echo "R " ; ?><?php echo $row['amount']; ?></p></td>
                        <td><p><?php echo $row['date']; ?></p></td>
                        <td><p><?php echo "R " ; ?><?php echo $amount_due; ?></p></td>
                        <td><p><?php echo "R 700"; ?></p></td>
                        </tr>
                    </div>
                    <?php } ?>
    </table> 
    &nbsp;

    <?php }else { ?>

    <table align="center" width="1000" border="5" cellspacing="5" cellpadding="5">
    <th>Payment Type</th>
    <th>Payment Method</th>
    <th>Amount Paid</th>
    <th>Date</th>
    <th>Amount Deducted</th>

                    <?php foreach ($view_payment as $row) { ?>
                    <div>
                    
                    
                        <tr>
                        <td><p><?php echo $row['payment_type']; ?></p></td>
                        <td><p><?php echo $row['payment_method']; ?></p></td>
                        <td><p><?php echo "R " ; ?><?php echo $row['amount']; ?></p></td>
                        <td><p><?php echo $row['date']; ?></p></td>
                        <td><p><?php echo "R 700"; ?></p></td>
                        </tr>
                    </div>
                    <?php } ?>
    </table> 
    &nbsp;

    <table align="center" width="1000" border="5" cellspacing="5" cellpadding="5">
    <th>Payment Type</th>
    <th>Payment Method</th>
    <th>Amount Paid</th>
    <th>Amount Due</th>
    <th>Date</th>
    <th>Amount Deducted</th>

                    <?php foreach ($v_paymentBal as $row) { ?>
                    <div>
                    <?php $amt_due = ($row['amount'] - 700 );
                      ?>
                    
                        <tr>
                        <td><p><?php echo $row['payment_type']; ?></p></td>
                        <td><p><?php echo $row['payment_method']; ?></p></td>
                        <td><p><?php echo "R " ; ?><?php echo $row['amount']; ?></p></td>
                        <td><p><?php echo "R " ; ?><?php echo $amt_due; ?></p></td>
                        <td><p><?php echo $row['date']; ?></p></td>
                        <td><p><?php echo "R 700"; ?></p></td>
                        </tr>
                    </div>
                    <?php } ?>
    </table> 
    <?php }?>
   
      
    <?php } ?>


              
               
</body>

</html>
