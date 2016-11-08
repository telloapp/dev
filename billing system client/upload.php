<?php
$thispage = 'upload';
error_reporting(E_ALL);
require './core/init.php';
$general->logged_out_protect();

$user_id  = htmlentities($user['id']); 


$client_payment->upload_file($user_id);

?>
<html>
<head>
<body>

	 <script type="text/javascript" src="js/upload_status.js"></script>

</body>
</head>
</html>

