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
  <title>Select Options</title>
</head>

<body align="center">
<label><p  style="font-family:tahoma; font-size:30px; color:black;">Select From The Following Options</label></p>

<hr>
<a href="inprogress_cancelled_admin.php">In Progress Sites</a><br><br>
<a href="complete_cancelled_admin.php">Complete Sites</a><br><br>

<hr>






</body>
<form>

<a align="left" href="bill_homepage.php">Go Back</a><br><br><br><br>

</form>
</html>