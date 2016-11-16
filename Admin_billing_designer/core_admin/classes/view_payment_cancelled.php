
<?php
require '../core/init.php';
$id = $_GET['id'];
$view_payment = $billing->view_payment_cancelled($id); 

?>

<!doctype html>
<html>

<head>
<div align="center">
  <b>Invoice</b>
 </div>
<form>
<button formaction="work_inprogress.php">Go Back</button> <br><br><br><br>
</form>
</head>

<body>

    <header>
    </header>
    <table width="1000" border="5" cellspacing="5" cellpadding="5">
    <th>Payment Type</th>
    <th>Payment Method</th>
    <th>Amount Paid</th>
    <th>Date</th>

                    <?php foreach ($view_payment as $row) { ?>
                    <div>
                    
                    <?php } ?>
                        <tr>
                        <td><p><?php echo $row['payment_type']; ?></p></td>
                        <td><p><?php echo $row['payment_method']; ?></p></td>
                        <td><p><?php echo "R " ; ?><?php echo $row['amount']; ?></p></td>
                        <td><p><?php echo $row['date']; ?></p></td>
                        </tr>
                    </div>
    </table>          
                  
</body>

</html>
