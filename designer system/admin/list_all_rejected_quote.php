<?php
require '../core/init.php';

$id = $_GET['id'];

$list = $admin->list_all_rejected_quote($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Details of Rejected Quotes</h3>
  <a href = "designer_project.php?">Back</a>
<hr>
<form method="post" class=" " role="form" enctype="multipart/form-data">
<?php foreach ($list  as $row){?>

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
</body>
</html>