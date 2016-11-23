<?php
require '../designers/init.php';
$general->logged_out_protect();

$designer_id  = htmlentities($user['id']);

$list = $quotation->list_all_draft_quote($designer_id);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>View quote details</h3>
<a href="index.php">Goback</a>
<hr>
<?php foreach ($list as $row){?>
<form method="post" class=" " role="form" enctype="multipart/form-data">

<label for="">Quote_Num :&nbsp;</label>
<?php echo $row['quote_num']; ?>

<br><br>

<label for="">Site_Id:&nbsp;</label>
<?php echo $row['site_id']; ?>

<br><br>

<label for="">Quote_Price :&nbsp;</label>
<?php echo $row['quote_price']; ?>
<br><br>

<label for="">Finish_Date :</label>
<?php echo $row['finish_date']; ?>

<br><br>

<a href="edit_quote.php?id=<?php echo $row['id']; ?>">EDIT</a>

<a href="delete_quote.php?id=<?php echo $row['id']; ?>"onclick='return confirm("Are you sure you want to delete this?")'>DELETE</a>
<br>
<a href="view_quote_details.php?id=<?php echo $row['id']; ?>">View Details</a>

<hr>
<br><br>

</form>

<?php } ?> 
</body>
</html>