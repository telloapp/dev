<?php

error_reporting(E_ALL);

require '../core/init.php';
$general->logged_out_protect();

$designer_id 	= htmlentities($user['id']);

$id =$_GET['id'];

$delete_quote = $quotation->delete_quote($id); 

header("location:list_draft_quote.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>