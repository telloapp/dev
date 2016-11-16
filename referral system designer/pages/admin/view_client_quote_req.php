<?php
error_reporting(E_ALL);
require '../adminClasses/init.php';

$user_id = $_GET['id'];
$sendRequests =$adminLogin->viewSend($user_id);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h2>CLient qoute request</h2><hr>
<a href="view_clients.php">Back</a>
<br>
<br>

<?php if(empty($sendRequests)) { ?>
<?php echo "The selected client does not have a request for quotation";?>
<?php } else { ?>
<h4>Client website</h4>
<?php foreach ($sendRequests as $key) { ?>
<label>Website Name:</label>
<?php echo $key['site_name'];?><br>
<label>Website type :</label>
<?php echo $key['website_type'];?><br>
<label>Due date :</label>
<?php echo $key['due_date'];?><br>

<a href="client_site_features.php?id=<?php echo $key['id'];?>">View features</a>
<br><br>
<?php } } ?>


</body>
</html>