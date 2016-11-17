<?php
error_reporting(E_ALL);
require '../InvestorCore/init.php';

$viewBiz2 = $investors->viewBiz();
?>




<!--ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss-->

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
	<header class="header header-brand ui-header">
		<span class="header-logo"></span>
	</header>
	<nav aria-hidden="true" class="menu" id="ui_menu" tabindex="-1">
	</nav>
	<main class="content">
		
	

		<div class="container">
			<div class="row">
				<div class="col-lg-24 col-lg-offset-13 col-md-13 col-md-offset-13">
					<section class="content-inner margin-top-no">
						<div class="card">
							<div class="card-main">
								
								<div class="card-inner">
									<ul class="nav nav-list">
										<li>
											<a class="waves-attach" href="investorReg.php">sign up as investor</a>
										</li>
										<li>
											<a class="waves-attach" href="investorLogin.php">login as investor</a>
										</li>
										<li>
											<a class="waves-attach" href="smeReg.php">sign up as sme</a>
										</li>
										
										<li>
											<a class="waves-attach" href="smeLogin.php">login as sme</a>
										</li>

										<li>
											<a class="waves-attach" href="javascript:void(0)">Contact Us</a>
										</li>

										<li>
											<a class="waves-attach" href="javascript:void(0)">About Us</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>	
				</section>
				</div>
			</div>
		</div>

		
	</main>
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