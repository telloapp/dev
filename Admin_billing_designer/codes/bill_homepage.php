<?php 
require '../core_admin/init.php';
$general->logged_out_protect();


$username  = htmlentities($user['username']);
$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.


$dispObj = $users->dispBiz($user_id);
$dispObj2 = $users->dispBiz2($user_id);

?>



<!DOCTYPE html>
<html>
<head>
	<title>Dasigner Dashboard</title>
</head>
<body align="center">
<label><p  style="font-family:tahoma; font-size:30px; color:black;">Billling System Deshboard</label></p>
<hr>
<a href="designers_inprogress.php">In Progress</a><br><br>
<a href="designers_completed.php">Complete</a><br><br>
<a href="Cancelled_inprogress11.php">Cancelled</a><br><br>
<a href="payment_from_telloAd.php">Tello Payments</a><br><br>
<a href="view_penaltiesAdmin.php">Penalties</a><br><br>
<hr>




<br><a href="admin_homepage.php">Home</a>

</body>
</html>