<?php
require '../core/init.php';
$general->logged_out_protect();


$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$draftId = $_GET['id'];
$draftObj = $client->viewSelectedDraft($draftId);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h2>My saved requests</h2><hr>
<a href="drafts.php">Back</a>
<br>
<br>

<?php foreach ($draftObj as $key) {?>
<?php echo $key['website_type'];?><br>
<?php echo $key['site_name'];?><br>
<?php echo $key['due_date'];?><br>
<a href="edit_drafts.php?id=<?php echo $key['id'];?>">Edit</a>&nbsp;
<a href="dlt_drafts.php?id=<?php echo $key['id'];?>" onclick='return confirm("This draft request will be deleted, continue?")'>Delete</a><br><br>
<?php }?>

</body>
</html>