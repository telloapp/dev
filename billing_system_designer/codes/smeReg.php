<?php 
require '../core/init.php';
$general->logged_in_protect();

if (isset($_POST['submit'])) {

	if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){

		$errors[] = 'You must fill in all of the fields.';

	}else
	{
	      	      
        if ($users->user_exists($_POST['username']) === true) 
        {
            $errors[] = 'That username already exists';
        }
        if (strlen($_POST['password']) <6)
        {
            $errors[] = 'Your password must be at least 6 characters long';
        } 
        else if (strlen($_POST['password']) >18){
            $errors[] = 'Your password cannot be more than 18 characters long';
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'Please enter a valid email address';
        }else if ($users->email_exists($_POST['email']) === true) {
            $errors[] = 'That email already exists.';
        }
	}

	if(empty($errors) === true)
	{
			
		$username 	= htmlentities($_POST['username']);
		$password 	= $_POST['password'];
		$email 		= htmlentities($_POST['email']);
		
		
		$users->register($username, $password, $email);
		$login = $users->login($username, $password);
		if ($login === false) {
			$errors[] = 'Sorry, that username or password is invalid';
		}else {
			$_SESSION['id'] =  $login;
			header('Location: home.php');
			exit();
		}
		exit();
	}
}

?>




<!--sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
    <title>sme registration page</title>

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
    </header>
    <main class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-push-4 col-sm-6 col-sm-push-3">
                    <section class="content-inner">
                        <div class="card">
                            <div class="card-main">
                                <div class="card-header">
                                    <div class="card-inner">
                                        <h1 class="card-heading">Register as a user</h1>

                                    </div>
                                </div>
                                <div class="card-inner">
                                    
                                    <form class="form" method="POST" action="">
                                        
                                            
                                        <div class="form-group form-group-label">
                                            <div class="row">
                                                <div class="col-md-10 col-md-push-1">
                                                    <input type="text" name="email" placeholder = "e-mail" required = "required"><br><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <div class="row">
                                                <div class="col-md-10 col-md-push-1">
                                                     <input type="text" name="username" placeholder = "username" required = "required"><br><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <div class="row">
                                                <div class="col-md-10 col-md-push-1">
                                                     <input type="password" name="password" placeholder = "password" required = "required"><br><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10 col-md-push-1">
                                                    <input type="submit" name="submit" value="Submit">
                                                    <a href="home.php"></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <p class="margin-no-top pull-left"><a class="btn btn-flat btn-brand waves-attach" href="javascript:void(0)">Already have an account?</a></p>
                            <p class="margin-no-top pull-right"><a href="smeLogin.php">Login Here...</a></p>

                            
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