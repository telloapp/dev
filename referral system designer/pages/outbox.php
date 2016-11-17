<?php
require '../core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.
$sendRequests =$client->viewSend($user_id);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php if (empty($sendRequests)) { ?>
<?php echo "You don't have any request for quotation sent yet.";?><br>
<a href="client_panel.php">OK</a><br>
<?php echo "Do you want a website?";?>&nbsp;<a href="site_Data.php">Fill in</a>&nbsp;<?php echo "your website data";?><br>

<?php } else { ?>
<h2>My send requests</h2><hr>
<a href="client_panel.php">Home</a>
<br><br>
<?php foreach ($sendRequests as $key) {?>
<?php echo $key['website_type'];?><br>
<?php echo $key['site_name'];?><br>
<?php echo $key['due_date'];?><br>
<a href="view_outbox.php?id=<?php echo $key['id'];?>">View details</a>&nbsp;&nbsp;&nbsp;
<a href="inbox.php?id=<?php echo $key['id'];?>">View replies</a><br><br>
<?php } } ?>
</body>
</html>