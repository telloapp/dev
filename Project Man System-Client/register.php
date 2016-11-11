<?php 
require 'core/init.php';
$general->logged_in_protect();

if (isset($_POST['submit'])) {

	if(empty($_POST['password']) || empty($_POST['email']) || empty($_POST['contacts)']) || empty($_POST['username'])){

		$errors[] = 'You must fill in all of the fields.';

	}else{
	 
        if (strlen($_POST['password']) <6){
            $errors[] = 'Your password must be atleast 6 characters';
        } else if (strlen($_POST['password']) >18){
            $errors[] = 'Your password cannot be more than 18 characters long';
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'Please enter a valid email address';
        }else if ($project->email_exists($_POST['email']) === true) {
            $errors[] = 'That email already exists.';
        }
	}

	if(empty($errors) === true){
			
		//$username 	= htmlentities($_POST['username']);
		$password 	= htmlentities($_POST['password']);
        $email      = htmlentities($_POST['email']);
        $contacts      = htmlentities($_POST['contacts']);
		$username 		= htmlentities($_POST['username']);
		
		$project->register($username, $password, $email, $contacts);
		$login = $project->login($email, $password);
		if ($login === false) {
			$errors[] = 'Sorry, that email or password is invalid';
		}else {
			$_SESSION['id'] =  $login;
			header('Location:index.php');
			exit();
		}
		exit();
	}
}

?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Registration Page</title>

    </head>
    <body class="bg-black">

        
            <div class="header">Create Your Page</div>
            <form action="" method="POST">
               
                        <input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email']); ?>">
                 
                        <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo htmlentities($_POST['password']); ?>" placeholder="Password">

                        <input type="text" name="username" value="<?php if(isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" placeholder="Username">

                        <input type="text" name="contacts" value="<?php if(isset($_POST['contacts'])) echo htmlentities($_POST['contacts']); ?>" placeholder="contacts">                    

                    <input type="submit" name="submit" value="get started">

                    <a href="login.php">I already have an account</a><br>
					
                
            </form>
		<?php 
		if(empty($errors) === false){
			echo '<p>' . implode('</p><p>', $errors) . '</p>';	
		}

		?>
            <div class="margin text-center">
                <span>By clicking below to sign up, you are agreeing to the Handoutt <a href="">Terms of Service.</a></span>
                <br/>

            </div>
        </div>

    </body>
</html>