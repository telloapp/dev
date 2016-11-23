<?php
error_reporting(E_ALL);
require 'core/init.php';


$general->logged_out_protect();

$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.

?>

<!doctype html>

<html>
<body>


<h1> List Of All Projects </h1>
 <td> <a href="new_projects.php" class="btn btn-danger btn-sm">New Projects</a>
<a href="inprogress_project.php" class="btn btn-danger btn-sm">Inprogress</a>

<a href="completed_project1.php" class="btn btn-danger btn-sm">Complete</a>
<a href="cancelled_project.php" class="btn btn-danger btn-sm">Cancelled</a>
<a href="approved_project.php" class="btn btn-danger btn-sm">Approved</a>
<a href="client_complaint.php" class="btn btn-danger btn-sm">Clients Complains</a>
<a href="revision.php" class="btn btn-danger btn-sm">Revision</a>
<a href="completed_revision.php" class="btn btn-danger btn-sm">Completed Revision</a>
</td>




</body>


</html>