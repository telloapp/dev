<?php
require '../core/init.php';
$general->logged_out_protect();


$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$draftsObj=$client->viewDrafts($user_id);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php if (empty($draftsObj)) { ?>
<?php echo "You don't have any saved drafts.";?><br>
<?php echo "Saving a draft allows you to keep a message you aren't ready to send yet.";?><br>
<a href="client_panel.php">OK</a>
<?php } else { ?>
<h2>My saved requests</h2><hr>
<a href="client_panel.php">Home</a>
<br>
<br>
<?php foreach ($draftsObj as $key) {?>
<?php echo $key['website_type'];?><br>
<?php echo $key['site_name'];?><br>
<?php echo $key['due_date'];?><br>
<a href="view_drafts.php?id=<?php echo $key['id'];?>">View details</a><br><br>
<?php } }?>

</body>
</html>