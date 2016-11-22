<?php 
require '../core/init.php';
//$general->logged_out_protect();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<h3>Designer Project List</h3>
<p><a href="list_all_designer.php">Go Back</a></p>
<hr>
<p><a href="designer_project_details.php?id=<?php echo "$id";?>">All Sent Quote</a></p>
<p><a href="admin_list_draft_quote.php?id=<?php echo "$id";?>">All Saved Quote</a></p>
<p><a href="admin_list_rejected_quote.php?id=<?php echo "$id";?>">All Rejected Quote</a></p>

</body>
</html>