<?php
require 'core/init.php';
$general->logged_out_protect();


$id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.

?>
<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
     <a href="logout.php">logout</a>
     <?php include 'includes/goback.php'; ?>
</head>
<body>

<h1>Welcome Client Deshboard </h1>
<p></p>
<ol>
    <p><a href="completed_project.php">Completed Site</a></p>
    <!--li><a href="addbiz.php">Register My Business</a></li-->
   <p><a href="in_progress.php">In Progress Site</a></p>
   <p><a href="list_cancelledsite.php">All Cancelled Site</a></p>
  <p> <a href="list_approvedsite.php">All Approved Site</a></p>
  <p> <a href="all_user_revisions.php">All revisions Site</a></p>
</ol>


 


<br>
</body>
</html>