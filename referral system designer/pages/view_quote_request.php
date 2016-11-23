<?php
require '../designers/init.php';
$general->logged_out_protect();

$id = $_GET['id'];

$view_quote = $quotation->view_quote_request($id);
$view_quoteobj = $quotation->list_RequestFeatures($id);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Details of the quote request</h3>
<hr>

<form method="post" class=" " role="form" enctype="multipart/form-data">
<?php foreach ($view_quoteobj as $row){?>

Website Type : <?php echo $row['website_type']; ?>
<br><br>

Due Date : <?php echo $row['due_date']; ?>

<br><br>


No of pages : <?php echo $row['no_of_pages']; ?>

<br><br>

Site Name : <?php echo $row['site_name']; ?>

<br><br>

Business Profile : <?php echo $row['business_profile']; ?>

<br><br>

Template : <?php echo $row['template_id']; ?>

<br><br>


Status : <?php echo $row['status']; ?>
<br><br>

Origin : <?php echo $row['origin'];?>
<br><br>

Home : <?php echo $row['home'];?>
<br><br>
Facebook : <?php echo $row['facebook'];?>
<br><br>
Twitter : <?php echo $row['twitter'];?>
<br><br>
Instagram : <?php echo $row['instagram'];?>
<?php } ?>
<br><br>
<hr>
<h4>Website Pages(Features)</h4>
<?php foreach($view_quote as $row) { ?>
<?php echo $row['pages'];?><br>
<?php } ?>
</form>


<hr>
 <a href="create_quote.php?id=<?php echo $row['id']; ?>">Create Quote</a>
<a href="list_all_request.php">Goback</a>
</body>
</html>