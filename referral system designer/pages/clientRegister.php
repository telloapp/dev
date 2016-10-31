<?php 
require '../core/init.php';
$general->logged_in_protect();

if (isset($_POST['submit'])) {

	if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])  || empty($_POST['contact'])){

		$errors[] = 'You must fill in all of the fields.';

	}else
	{
	      	      
        if ($client->user_exists($_POST['username']) === true) 
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
        }else if ($client->email_exists($_POST['email']) === true) {
            $errors[] = 'That email already exists.';
        }
	}

	if(empty($errors) === true)
	{
			
		$username 	= htmlentities($_POST['username']);
		$password 	= $_POST['password'];
		$email 		= htmlentities($_POST['email']);
		$contact = htmlentities($_POST['contact']);
		
		$client->register($username, $password, $email, $contact);
		$login = $client->login($username, $password);
		if ($login === false) {
			$errors[] = 'Sorry, that username or password is invalid';
		}else {
			$_SESSION['id'] =  $login;
			header('Location: client_Panel.php');
			exit();
		}
		exit();
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User reqistration</title>

</head>
<body class="page-brand">

    
                                        <h1 class="card-heading">user registration form</h1>
    <form action="" method="POST">
    
        <label>e-mail<span>*</span></label>
        <input class="form-control" type="email" name="email" required><br><br>
        <label class=>contact<span>*</span></label>
        <input class="form-control" type="text" name="contact" required><br><br>
        <label >Username<span>*</span></label>
        <input class="form-control" type="texr" name="username" required><br><br>
        <label class="" for="ui_login_password">password<span>*</span></label>
        <input class="form-control" type="password" name="password" required><br><br>

        <button name="submit">Submit</button>
        <input type="reset" class="btn btn-default pull-right" name="submit" value="clear">                                    
    </form>                               
</body>
</html>


