<?php
error_reporting(E_ALL);
require '../../core_admin/init.php';


$general->logged_out_protect();

$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.

?>

<!doctype html>

<html>
<body>


<h1> List Of All Projects </h1>
 <td> <a href="admin_new_projects.php" class="user-link active" class="btn btn-danger btn-sm">New Projects</a> 
<a href="admin_inprogress_project.php" class="btn btn-danger btn-sm">Inprogress</a>

<a href="admin_completed_project.php" class="btn btn-danger btn-sm">Complete</a>
<a href="admin_cancelled_project.php" class="btn btn-danger btn-sm">Cancelled</a>
<a href="admin_approved_project.php" class="btn btn-danger btn-sm">Approved</a>
<a href="admin_client_complaint.php" class="btn btn-danger btn-sm">Clients Complains</a>
<a href="admin_revision.php" class="btn btn-danger btn-sm">Revision</a>
<a href="admin_completed_revision.php" class="btn btn-danger btn-sm">Completed Revision</a>






</body>


</html>