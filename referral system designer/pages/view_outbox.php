<?php
require '../core/init.php';
$general->logged_out_protect();


$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$outboxid = $_GET['id'];

$outboxObj =$client->viewSelectedOutbox($outboxid);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h2>My send requests</h2><hr>
<a href="outbox.php">Back</a>
<br>
<br>

<?php foreach ($outboxObj as $key) {?>
<?php echo $key['website_type'];?><br>
<?php echo $key['site_name'];?><br>
<?php echo $key['due_date'];?><br>
<a href="edit_outbox.php?id=<?php echo $key['id'];?>">Edit</a>&nbsp;
<a href="dlt_outbox.php?id=<?php echo $key['id'];?>" onclick='return confirm("This Send request will be deleted, continue?")'>Delete</a><br><br>
<?php }?>


</body>
</html>