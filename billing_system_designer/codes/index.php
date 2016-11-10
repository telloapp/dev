<?php
error_reporting(E_ALL);
require '../core/init.php';
$general->logged_out_protect();

$viewBiz2 = $billing->viewBiz();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<title>Menu</title>

	<!-- css -->
	<link href="../css/base.min.css" rel="stylesheet">
	<link href="../css/project.min.css" rel="stylesheet">
	
	<!-- favicon -->
	<!-- ... -->
</head>
<body class="page-brand">
	<header >

		<?php include 'includes/nav.php'; ?>
		<span class="header-logo"></span>
		<div id="slide">
        <div class="slider">
          
        </div>
        <a href="#" class="prev"></a><a href="#" class="next"></a> </div>
	</header>
	<nav aria-hidden="true" class="menu" id="ui_menu" tabindex="-1">
	</nav>
	
	<footer class="ui-footer">
		<div class="container">
			
		</div>
	</footer>
	
	<!-- js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="../js/base.min.js"></script>
	<script src="../js/project.min.js"></script>
</body>
</html>