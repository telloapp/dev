<?php
require '../designers/init.php';
$general->logged_out_protect();

$id = $_GET['id'];

$view_quote_details = $quotation->view_quote_details($id);
$view_site_data = $quotation->list_infor_quote($id);
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
<hr>
<h3>Product details</h3>
<hr>
<?php foreach ($view_site_data as $key){?>

Website Type : <?php echo $key['website_type']; ?>
<br><br>

Due Date : <?php echo $key['due_date']; ?>

<br><br>


No of pages : <?php echo $key['no_of_pages']; ?>

<br><br>

Site Name : <?php echo $key['site_name']; ?>

<br><br>

Business Profile : <?php echo $key['business_profile']; ?>

<br><br>

Template : <?php echo $key['template_id']; ?>

<br><br>


Status : <?php echo $key['status']; ?>
<br><br>

Origin : <?php echo $key['origin'];?>
<br><br>

Home : <?php echo $key['home'];?>
<br><br>
Facebook : <?php echo $key['facebook'];?>
<br><br>
Twitter : <?php echo $key['twitter'];?>
<br><br>
Instagram : <?php echo $key['instagram'];?>

<?php }?>
</form>
<?php }?>

<hr>
<a href="list_sent_quote.php">Goback</a>
</body>
</html>