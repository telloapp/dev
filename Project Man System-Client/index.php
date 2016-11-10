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
    <li><a href="completed_project.php">Completed Site</a></li>
    <!--li><a href="addbiz.php">Register My Business</a></li-->
    <li><a href="in_progress.php">In Progress Site</a></li>
</ol>


 


<br>
</body>
</html>