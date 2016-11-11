<?php
require '../core/init.php';
$general->logged_out_protect();

$id = $_GET['id'];

$view_quote_details = $quotation->view_quote_details($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Details of the quotation</h3>
<hr>

<form method="post" class=" " role="form" enctype="multipart/form-data">
<?php foreach ($view_quote_details  as $row){?>

Site_Id : <?php echo $row['site_id']; ?>
<br><br>
Quote_Num : <?php echo $row['quote_num']; ?>
<br><br>
Quote_Price : <?php echo $row['quote_price']; ?>
<br><br>
Finish_Date : <?php echo $row['finish_date']; ?>
<br><br>
Own_maintenance : <?php echo $row['own_maintenance']; ?>
<br><br>
Basic_M_Amt: <?php echo $row['basic_m_amt']; ?>
<br><br>
Advanced_M_Amt : <?php echo $row['advanced_m_amt']; ?>
<br><br>
Basic_M_Period : <?php echo $row['basic_m_period']; ?>
<br><br>
Advanced_M_Period : <?php echo $row['advanced_m_period']; ?>
<br><br>
</form>
<?php }?>

<hr>
<a href="list_all_rejected_quote.php">Goback</a>
</body>
</html>