<?php
require '../core/init.php';
$general->logged_out_protect();

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$outboxid = $_GET['id'];
$featuresIDobj = $client->view_features($outboxid);
/*check feature id*/
$features = $client->list_unselected($outboxid);

if (isset($_POST['submit'])) {
$status = "sent";
	$feature_id = $_POST['feature_id'];
	$client->add_features($user_id, $feature_id,$outboxid,$status);
	$client->updateStatus($outboxid);
	
	header('location:outbox.php');
}
else
if (isset($_POST['save'])) {

$status = "draft";
	$feature_id = $_POST['feature_id'];
	$client->add_features($user_id, $feature_id,$outboxid,$status);
	header('location:client_panel.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<ul>

	<li><a href="client_panel.php">my dashboard</a></li>
</ul>
<h2>Your selected features</h2>
<form action="" method="POST">
	<?php if (empty($featuresIDobj)) {
				echo "You have no features yet.<br>";
				echo "Add features below";
}else{ ?> <?php foreach ($featuresIDobj as $key) { ?>

<input id="<?php echo $key['id']; ?>" name="feature_id[]" type="checkbox" class="checkbox" checked="checked" value="<?php echo $key['id'];?>" disabled = "disabled">
<label class="" for="<?php echo $key['id']; ?>"><?php echo $key['pages']; ?>
	<a href="delete_draft_features.php?feature_id=<?php echo $key['feature_id']?>&id=<?php echo $outboxid;?>" onclick='return confirm("Are you sure you want to delete this feature?")'>&nbsp;Delete feature</a>
</label><br><br>

<?php } } ?>

<h3>Add items to be featured on your website</h3>
<br>
<label>Choose features here:</label>&nbsp;

<?php foreach($features as $rows) { ?>
<input name="feature_id[]" type="checkbox" class="checkbox" value="<?php echo $rows['id']; ?>" />
<label class="" for="<?php echo $rows['id']; ?>"><?php echo $rows['pages']; ?></label><br><br>
<?php } ?>
<br><br>
<input type="hidden" name="user_id" value="<?php echo "$user_id ";?>">
<input type="submit" name="submit" value="sent qoute request">
<input type="submit" name="save" value="Save request">

</form>

</body>
</html>