<?php
require '../core/init.php';
$general->logged_in_protect();
        
?>
<!doctype html>
<html lang="en">

<head>
<?php include 'includes/head.php'; ?>
</head>


<body class="page-fullwidth">
  <!-- START SITE -->
  <div class="site">
    <!-- START HEADER -->
    <header class="noo-header">
      <?php include 'includes/nav.php'; ?>
    </header>
    <!-- END HEADER -->

    <!-- START NOO WRAPPER -->
		<div class="noo-wrapper">
		  <!-- START NOO MAINBODY -->
		  <div class="container-fluid noo-mainbody">
		  	<div class="noo-mainbody-inner">
		  		<div class="row clearfix">
				  	<!--START MAIN CONTENT -->
				  	<div class="noo-content col-xs-12">
							<div class="page-content row">
								<div class="col-md-12">
									<div class="noo-logreg both">
								  <div class="logreg-container">
								    <div class="row clearfix logreg-content">
								      <div class="col-md-6 col-md-offset-2 login-form">
								        <form method="post" role="form">
								          <div class="logreg-title">Password Recovery</div>
								          <div class="form-message">
                          <?php
                                  if (isset($_GET['success']) === true && empty ($_GET['success']) === true) {
                                      ?>
                                      <p>Thank you. We've sent a randomly generated password to your email.
                                <br><br>
                                <b>Didn't receive the email? </b><br> If you cannot find the email in your inbox, check it in your spam mail or bulk folders.
                                <br><br>
                                      <b>Please change your password once you have logged in using the temporary password.</b></p>
                                      <br />   
      <a href="login.php" class="btn navbar-btn">Back to Login</a>                       
                          </div>
								          <div class="logreg-content">
           <?php
            
        } else if (isset ($_GET['email'], $_GET['generated_string']) === true) {
            
            $email    =trim($_GET['email']);
            $string     =trim($_GET['generated_string']); 
            
            if ($users->email_exists($email) === false || $users->recover($email, $string) === false) {
                $errors[] = 'Sorry, something went wrong and we couldn\'t recover your password.';
            }
            
            if (empty($errors) === false) {       

            echo '<p>' . implode('</p><p>', $errors) . '</p>';
          
            } else {

                header('Location: recover.php?success');
                exit();
            }
        
        } else {
            header('Location:index.php'); // If the required parameters are not there in the url. redirect to index.php
            exit();
        }
        ?>           
                          <br>                           
                          <p class="logreg-desc">New to Afrilisting.com? <a href="register.php">Click here to Sign Up</a></p>
								          </p>
								        </form>                        
								      </div>
								      
								      <!--div class="col-md-6 register-form">
								        <form name="registerform" id="registerform" method="post" role="form">
								          <div class="logreg-title">Register Form</div>
								          <p class="logreg-desc">Don't have an account? Please fill in the form below to create one.</p>
								          <div class="form-message"></div>
								          <div class="logreg-content">
								            <div class="form-group">
								              <label for="user_login" class="sr-only">Username</label>
								              <input type="text" class="form-control" id="user_login" name="user_login" placeholder="Username *" required="">
								            </div>
								            <div class="form-group">
								              <label for="user_email" class="sr-only">Your Email</label>
								              <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Your Email *" required="">
								            </div>
								          </div>
								          <div class="logreg-action">
								          	<button type="button" class="btn navbar-btn">Register Account</button>
								          </div>
								        </form>
								      </div-->
								    </div>
								  </div>
								</div>
								</div>
							</div>	  		
						</div>	  		
				  	<!-- END MAIN CONTENT -->
				  </div>
		  	</div>
		  </div>
		  <!-- END NOO MAINBODY -->
		</div>
		<!-- END NOO WRAPPER -->

    <!-- START FOOTER -->
    <footer class="footer">
    <?php include 'includes/footer.php'; ?>
    </footer>
    <!-- END FOOTER -->
  </div>
  <!-- END SITE -->

  <!-- JQUERY PLUGIN -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
  <script type="text/javascript" src="js/SmoothScroll.js"></script>

  <!-- THEME SCRIPT -->
  <script type="text/javascript" src="js/script.js"></script>
  
</body>

</html>
