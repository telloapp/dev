<?php
require '../core/init.php';
$general->logged_out_protect();

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.
$site_id = $_GET['id'];
$designerQuote = $client->viewInbox($site_id);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h2>Quotation replies</h2><hr>
<a href="client_panel.php">Home</a>
<br>
<br>

<?php foreach ($designerQuote as $key) {?>

<input type="submit" name="submit" value="accept quotation">

<?php }?>




</body>
</html>