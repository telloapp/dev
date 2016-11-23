<?php
require '../core/init.php';

$general->logged_out_protect();

$designer_id = htmlentities($user['id']);

$view_notifications =  $chartforum->get_notifications($designer_id);

$view_comments = $chartforum->get_msg_id($designer_id);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Designer Dashboard</title>
</head>
<body>

<form method="post" action="">
	<h1>Welcome to Tello App</h1>
	<p>What do you want to do ?</p>
	<ol>
		<li><a href="list_messages.php">view messages</a>

	<?php foreach ($view_comments as $row) { ?>
		<a href="list_myMsgs.php?designer_id=<?php echo $row['designer_id']?>">Notifications</a>
	    <?php echo $num_rows = count($view_notifications); ?>
	<?php } ?>
		</li>
	    <li><a href="send_message.php">Add Message</a></li>
	    <li><a href="logout.php">logout</a></li>


            
	</ol>
</form>

<h1>Dashboard</h1>

<br>
</body>
</html>