<?php
require '../core_admin/init.php';

$id = $_GET['id'];

$list = $admin->display_rejected_quote_details($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>All Rejected Quotes</h3>
  <a href = "designer_project.php?id=<?php echo "$id";?>">Back</a>
<hr>
  <?php foreach ($list as $row ) { ?>

	 
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
Instagram : 
     <br>

  


  <hr>  
  <?php }?>
  <br><br>



</body>
</html>