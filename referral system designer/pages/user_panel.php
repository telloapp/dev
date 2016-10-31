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

<a href="home.php">post info</a>
<a href="view_info.php">view my info</a>
<a href="logout.php">Logout</a>
</body>
</html>