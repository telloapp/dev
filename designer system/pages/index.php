<?php 
require '../core/init.php';
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
<p><a href="list_all_request.php">Quote Request</a></p>
<p><a href="list_all_updated_request.php">Upadted Quote Request</a></p>
<p><a href="list_sent_quote.php">Sent Quote </a></p>
<p><a href="list_draft_quote.php">Saved Quote </a></p>
<p><a href="list_all_rejected_quote.php">Rejected Quote </a></p>
<p><a href="logout.php">Logout </a></p>
</body>
</html>