<?php
require '../core/init.php';
$general->logged_in_protect();

$super_admin_id = 1;

         
if (empty($_POST) === false) {

	$email    = trim($_POST['email']);
	$password = trim($_POST['password']);

	if (empty($email) === true || empty($password) === true) {
		$errors[] = 'Sorry, but we need your email and password.';

	} else {
		if (strlen($password) > 18) {
			$errors[] = 'The password should be less than 18 characters, without spacing.';
		}
		$login = $admin->super_admin_login($email, $password,$super_admin_id);
		if ($login === false) {
			$errors[] = 'Sorry, that username or password is invalid';
		}else {
			$_SESSION['id'] =  $login;
			header('Location: home.php');
			exit();
		}
	}
} 
?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Log In</div>
            <form action="" method="post">
                <div class="body bg-white">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="E-mail "/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="submit" name="submit" class="btn bg-blue btn-block">Log In</button>  <br>
		<?php 
		if(empty($errors) === false){
			echo '<p>' . implode('</p><p>', $errors) . '</p>';	
		}
		?>                    
                </div>
            </form>

        </div>
      

    </body>
</html>