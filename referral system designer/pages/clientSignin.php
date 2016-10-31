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
        if($client->user_exists($username) === false) 
        {
            $errors[] = 'Sorry that username doesn\'t exist, please sign up first';
        } 
             else 
            {
                if (strlen($password) > 18) 
                {
                    $errors[] = 'The password should be less than 18 characters, without spacing.';
                }

                $login = $client->login($username, $password);

                if ($login === false) 
                {
                    $errors[] = 'Sorry, that username or password is invalid';
                }
                else
                {
                    $_SESSION['id'] =  $login;
                    header('Location: user_panel.php');
                    exit();
                }
            }
        } 


?>

<!DOCTYPE HTML>
<!--
    ZeroFour by HTML5 UP
    html5up.net | @n33co
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Login</title>

    </head>
    <body class="homepage">
        <li class="current_page_item"><a href="index.php">Home</a></li>
        
<p>Dont have account? Sign up <a href="clientRegister.php">here</a></p>
                                
                               
                                        <p style="font-family:tahoma; font-size:20px;">Login</p>
                                    
                                    <form class="form" action="" method="POST">
                                        
                                                    <label class="" for="ui_login_username">Username</label>
                                                    <input class="form-control" placeholder="username" type="text" name="username" required></br></br>
                                                
                                                    <label class="" for="ui_login_password">Password</label>
                                                    <input class="form-control" type="password" name="password" required></br></br>
                                               
                                                    <button class="btn btn-block btn-brand waves-attach waves-light" name="submit">Sign In</button>
                                                
                                    
                                    </form>
                               

    </body>
</html