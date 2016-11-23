<?php
require '../designers/init.php';
$general->logged_out_protect();

$username  = htmlentities($user['username']);
$user_id  = htmlentities($user['id']);

$id = $_GET['id'];
$view_payment = $designer->see_penalties($id,$user_id); 

?>

<!doctype html>
<html>

<head>
<div align="center">
    <h1><img src="image/invoice1.png" /></h1>
  
 </div>
<form>
<button formaction="work_penalties.php">Go Back</button> <br><br><br><br>
</form>
</head>

<body>

    <header>
    </header>
    <table align="center" width="1000" border="5" cellspacing="5" cellpadding="5">
    <th>Amount Deducted</th>
    <th>Price</th>
    <th>Days Missed</th>
    <th>Total Amount</th>

            <?php foreach ($view_payment as $row) { ?>
                    <div>
                    <?php $fixed_amt = ($row['days_missed'] * 50 );
                     $tot_amt = ($row['price'] - $fixed_amt) ?>
          
                        <tr>
                        <td><p><?php echo "R " ; ?><?php echo $fixed_amt; ?></p></td>                        
                        <td><p><?php echo "R " ; ?><?php echo $row['price']; ?></p></td>
                        <td><p><?php echo $row['days_missed']; ?></p></td>
                        <td><p><?php echo "R " ; ?><?php echo $tot_amt; ?></p></td>
                        </tr>
                    </div>
                    <?php } ?>
    </table>          
                  
</body>

</html>
