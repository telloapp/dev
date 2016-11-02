<?php 
require '../core/init.php';
$general->logged_out_protect();


$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<a href="drafts.php">View Drafts</a>&nbsp;&nbsp;
<a href="inbox.php">view inbox(quotes)</a>&nbsp;&nbsp;
<a href="outbox.php">Send requests(outbox)</a>&nbsp;&nbsp;
<a href="accepted_qoutes.php">my accepted quotes</a>&nbsp;&nbsp;
<a href="user_panel.php">Home</a>&nbsp;&nbsp;
<a href="logout.php">Logout</a>
</body>
</html>