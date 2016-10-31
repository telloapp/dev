<?php
//require '../core/init.php';
//$general->logged_in_protect();
        
if (empty($_POST) === false) 
{
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if (empty($username) === true || empty($password) === true) 
    {
    $errors[] = 'Sorry, but we need your username and password.';
  } 
    else
        if($users->user_exists($username) === false) 
        {
            $errors[] = 'Sorry that username doesn\'t exist, please sign up first';
        } 
        else if($users->email_confirmed($username) === false) 
            {
                $errors[] = 'Sorry, but you need to activate your account. Please check your email.';
            }
             else 
            {
                if (strlen($password) > 18) 
                {
                    $errors[] = 'The password should be less than 18 characters, without spacing.';
                }

                $login = $users->login($username, $password);

                if ($login === false) 
                {
                    $errors[] = 'Sorry, that username or password is invalid';
                }
                else
                {
                    $_SESSION['id'] =  $login;
                    header('Location: index.php');
                    exit();
                }
            }
        } 


?>
<!doctype html>
<html lang="en">

<head>

</head>

<body class="page-fullwidth">
  <!-- START SITE -->
  <div class="site">
    <!-- START HEADER -->
    <header class="noo-header">
      
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
								          <div class="logreg-title">Sign In</div>
								          <div class="form-message"></div>
								          <div class="logreg-content">
								            <div class="form-group">
								              <input type="text" class="form-control" id="log" name="username" placeholder="Username *" value="<?php if(isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" required="">
								            </div>
								            <div class="form-group">
								              <input type="password" class="form-control" id="pwd" name="password" placeholder="Password *" required="">
								            </div>
								          </div>
								          <div class="logreg-action">
								          	<button type="submit" class="btn navbar-btn">Login</button>
								          </div>
                          <br>
                            <?php 
                            if(empty($errors) === false){
                                    echo "<div class='alert alert-danger alert-dismissable'>";
                              echo '<p>' . implode('</p><p>', $errors) . '</p>';  
                                    echo "</div>";
                            }elseif (!empty($username) === true && !empty($password) === true) {
                                    echo "<div class='alert alert-success'>";
                                    echo 'Login Successful';  
                                    echo "</div>";
                                }
                            ?>                            
                          <p class="logreg-desc">Register Here <a href="register.php">Click here to Sign Up</a></p>
								          
								          </p>
								        </form>
								      </div>
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
