<?php 
require '../../core_admin/init.php';
$general->logged_out_protect();


$username  = htmlentities($user['username']);
$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.




?>



<!DOCTYPE html>
<html>
<head>
	<title>All Client Dashboard</title>
</head>
<body align="center">
<label><p  style="font-family:tahoma; font-size:30px; color:black;">Project Management  System For Client Deshboard</label></p>
<hr>
 <p><a href="client_completed.php">Completed Site</a></p>
    <!--li><a href="addbiz.php">Register My Business</a></li-->
   <p><a href="client_inprogress.php">In Progress Site</a></p>
   <p><a href="client_cancelledsite.php">All Cancelled Site</a></p>
  <p> <a href="client_approvedsite.php">All Approved Site</a></p>
  <p> <a href="client_revisions.php">All revisions Site</a></p>
  <p> <a href="client_complains.php">All Complaints Site</a></p>
<hr>




<br><a href="admin_homepage.php">Home</a>

</body>
</html>