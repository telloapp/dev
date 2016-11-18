<?php 
require '/core/init.php';
$general->logged_out_protect();



$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.



?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
</head>
<body align="center">
<label><p  style="font-family:tahoma; font-size:30px; color:black;">Welcome to Your Deshboard Admin</label></p>
<hr>
<a href="">Billing System - Client</a><br><br>
<a href="bill_homepage.php">Billing System - Designer</a><br><br>
<a href="">Chat Forum</a><br><br>
<a href="manage_client.php">Project Management System - Client</a><br><br>
<a href="">Project Management System - Designer</a><br><br>
<a href="">Referral System - Designer</a><br><br>
<hr>



<br><a href="logout.php">Logout</a>


</body>
</html>