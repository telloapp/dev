<?php 
require '../designers/init.php';
$general->logged_out_protect();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Designer Home Page</h3>
<hr>
<h3>Khutso</h3>
<p><a href="list_all_request.php">Quote Request</a></p>
<p><a href="list_all_updated_request.php">Upadted Quote Request</a></p>
<p><a href="list_sent_quote.php">Sent Quote </a></p>
<p><a href="list_draft_quote.php">Saved Quote </a></p>
<p><a href="list_all_rejected_quote.php">Rejected Quote </a></p>
<br><hr>
<h3>Ntebo</h3>
<label><p  style="font-family:tahoma; font-size:30px; color:black;">Welcome to Your Billling System</label></p>
<hr>
<a href="work_inprogress.php">In Progress</a><br><br>
<a href="work_complete.php">Complete</a><br><br>
<a href="cancelled_inprogress10.php">Cancelled</a><br><br>
<a href="site_completed_tello.php">Payment From Tello</a><br><br>
<a href="work_penalties.php">Penalties</a><br><br>
<hr>
<h3>billy</h3>
<h1> List Of All Projects </h1>
 <td> <a href="new_projects.php" class="btn btn-danger btn-sm">New Projects</a>
<a href="inprogress_project.php" class="btn btn-danger btn-sm">Inprogress</a>

<a href="completed_project1.php" class="btn btn-danger btn-sm">Complete</a>
<a href="cancelled_project.php" class="btn btn-danger btn-sm">Cancelled</a>
<a href="approved_project.php" class="btn btn-danger btn-sm">Approved</a>
<a href="client_complaint.php" class="btn btn-danger btn-sm">Clients Complains</a>
<a href="revision1.php" class="btn btn-danger btn-sm">Revision</a>
<a href="completed_revision.php" class="btn btn-danger btn-sm">Completed Revision</a>
</td>
<p><a href="logout.php">Logout </a></p>
</body>
</html>