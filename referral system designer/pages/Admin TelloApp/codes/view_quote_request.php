<?php
require '../core_admin/init.php';
//$general->logged_out_protect();

$id = $_GET['id'];


$list = $admin->list_quote_request();

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
<?php foreach ($list as $row){?>

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
</form>
<hr>

<a href="admin_list_request.php">Goback</a>
</body>
</html>