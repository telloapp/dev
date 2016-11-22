<?php 
require '../core/init.php';
$general->logged_out_protect();


$username  = htmlentities($designer['username']);
$designer_id  = htmlentities($designer['id']); // storing the user's username after clearning for any html tags.


//$dispObj = $users->dispBiz($user_id);
//$dispObj2 = $users->dispBiz2($user_id);

?>



<!DOCTYPE html>
<html>
<head>
	<title>Dasigner Dashboard</title>
</head>
<body align="center">
<label><p  style="font-family:tahoma; font-size:30px; color:black;">Welcome to Your Billling System</label></p>
<hr>
<a href="work_inprogress.php">In Progress</a><br><br>
<a href="work_complete.php">Complete</a><br><br>
<a href="cancelled_inprogress10.php">Cancelled</a><br><br>
<a href="site_completed_tello.php">Payment From Tello</a><br><br>
<a href="work_penalties.php">Penalties</a><br><br>
<hr>



<br><a href="logout.php">Logout</a>


</body>
</html>