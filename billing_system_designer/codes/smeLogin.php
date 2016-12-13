<?php
require '../core/init.php';
$general->logged_in_protect();

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
                    header('Location: home.php');
                    exit();
                }
            }
        } 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
    <title>Login</title>

    <!-- css -->
    <link href="../css/base.min.css" rel="stylesheet">
    <link href="../css/project.min.css" rel="stylesheet">

    <!-- favicon -->
    <!-- ... -->
</head>
<body class="page-brand">

      
    
    <header >
    <?php include 'includes/nav.php'; ?>

    
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
                                        <h1 class="card-heading">login as user</h1>

                                    </div>
                                </div>
                                <div class="card-inner">
                                    <p class="text-center">
                                        <span class="avatar avatar-inline avatar-lg">
                                            <img alt="Login" src="../images/users/avatar-001.jpg">
                                        </span>
                                    </p>
                                    <form class="form" method="POST" action="">
                                        
                                            
                                        <div class="form-group form-group-label">
                                            <div class="row">
                                                <div class="col-md-10 col-md-push-1">
                                                    <label class="floating-label" for="ui_login_username"></label>
                                                    <input type="text" name="username" placeholder = "username"><br><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-label">
                                            <div class="row">
                                                <div class="col-md-10 col-md-push-1">
                                                     <label class="floating-label" for="ui_login_password"></label>
                                                     <input type="password" name="password" placeholder = "password"><br><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10 col-md-push-1">
                                                    <input type="submit" name="submit" value="Sign in" .el-loading>
                                                    <a href="index.php"></a>
                                                </div>
                                            </div>
                                        </div>


                                        <!--div class="progress-circular">
                                            <div class="progress-circular-wrapper">
                                                <div class="progress-circular-inner">
                                                    <div class="progress-circular-left">
                                                        <div class="progress-circular-spinner"></div>
                                                        </div>
                                                    <div class="progress-circular-gap"></div>
                                                <div class="progress-circular-right">
                                            <div class="progress-circular-spinner"></div>
                                         </div>
                                            </div>
                                                </div>
                                                    </div-->


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10 col-md-push-1">
                                                    <div class="checkbox checkbox-adv">
                                                        <label for="ui_login_remember">
                                                            <input class="access-hide" id="ui_login_remember" name="ui_login_remember" type="checkbox">Stay signed in
                                                            <span class="checkbox-circle"></span><span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <p class="margin-no-top pull-left"><a class="btn btn-flat btn-brand waves-attach" href="javascript:void(0)">Forget Password?</a></p>
                            <p class="margin-no-top pull-right"><a class="btn btn-flat btn-brand waves-attach" href="smeReg.php">Create an account</a></p>
                            
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