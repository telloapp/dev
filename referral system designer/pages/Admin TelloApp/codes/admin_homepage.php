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
	<title>Admin Dashboard</title>
</head>
<body align="center">
<label><p  style="font-family:tahoma; font-size:30px; color:black;">Welcome to Your Deshboard Admin</label></p>
<hr>
<a href="BillingClient/client_pending_complited.php">Billing System - Client</a><br><br>
<a href="billingDesigner/bill_homepage.php">Billing System - Designer</a><br><br>
<a href="chatforum/homee.php">Chat Forum</a><br><br>
<a href="ProjectClient/manage_client.php">Project Management System - Client</a><br><br>
<a href="projectman_designer/index.php">Project Management System - Designer</a><br><br>
<a href="admin_panel.php">Referral System - Designer</a><br><br>
<a href="admin_index.php">Designer System</a><br><br>
<hr>



<br><a href="logout.php">Logout</a>


</body>
</html>