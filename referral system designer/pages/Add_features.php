<?php
require '../core/init.php';
$general->logged_out_protect();

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$id = $_GET['id'];
$request_id = $id;

$features = $client->list_features();

if (isset($_POST['submit'])) {

$status = "sent";
	$feature_id = $_POST['feature_id'];
	$client->add_features($user_id, $feature_id,$request_id,$status);
	/*function call to insert id into business profile table*/
	$client->insertId($request_id,$request_id);
	$client->updateStatus($request_id);
	header('location:outbox.php');
}
else
if (isset($_POST['save'])) {

$status = "draft";
	$feature_id = $_POST['feature_id'];
	$client->add_features($user_id, $feature_id,$request_id,$status);
	header('location:drafts.php');
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
<form action="" method="POST">
<h3>Add items to be featured on your website</h3>
<br>

<label>Choose features here:</label>&nbsp;
<?php foreach ($features as $rows) {?>
<input name="feature_id[]" type="checkbox" value="<?php echo $rows['id'];?>" />
<label class="" for="<?php echo $rows['id']; ?>"><?php echo $rows['pages']; ?></label><br><br>
																<?php }?>

<input type="hidden" name="user_id" value="<?php echo "$user_id ";?>">
<input type="submit" name="submit" value="Send qoute request">
<input type="submit" name="save" value="Save request">

</form>

</body>
</html>