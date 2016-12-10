<?php 
require '../core/init.php';
$general->logged_out_protect();


$username  = htmlentities($user['username']);
$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.


//$dispObj = $users->dispBiz($user_id);
//$dispObj2 = $users->dispBiz2($user_id);

?>



<!DOCTYPE html>
<html>
<head>
  <title>Select Options</title>
</head>

<body align="center">
<label><p  style="font-family:tahoma; font-size:30px; color:black;">Select From The Following Options</label></p>

<hr>
<a href="payment_cancel_inprogress.php">In Progress Sites</a><br><br>
<a href="work_cancelled.php">Complete Sites</a><br><br>

<hr>






</body>
<form>

<a align="left" href="designer_index.php">Home</a><br><br><br><br>

</form>
</html>