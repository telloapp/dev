<?php 
require 'core/init.php';
$general->logged_out_protect();

if (isset($_POST['submit'])) {

	if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){

		$errors[] = 'You must fill in all of the fields.';

	}else{
	      	      
        //if ($users->user_exists($_POST['username']) === true) {
        //    $errors[] = 'That username already exists';
        //}
        //if(!ctype_alnum($_POST['username'])){
        //    $errors[] = 'Please enter a username with only alphabets and numbers, with no spaces in between';	
        //}
        if (strlen($_POST['password']) <6){
            $errors[] = 'Your password must be atleast 6 characters';
        } else if (strlen($_POST['password']) >18){
            $errors[] = 'Your password cannot be more than 18 characters long';
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'Please enter a valid email address';
        }else if ($users->email_exists($_POST['email']) === true) {
            $errors[] = 'That email already exists.';
        }
	}

	if(empty($errors) === true){
			
		$username 	= htmlentities($_POST['username']);
		$password 	= $_POST['password'];
        $email      = htmlentities($_POST['email']);
        $contacts      = htmlentities($_POST['contacts']);
        $website        = htmlentities($_POST['website']);
		$d_origin		= htmlentities($_POST['d_origin']);
		
		$designer->register($username, $password, $email, $contacts, $website, $d_origin);
		$login = $designer->login($username, $password);
		if ($login === false) {
			$errors[] = 'Sorry, that username or password is invalid';
		}else {
			$_SESSION['id'] =  $login;
			header('Location: index.php');
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

        <div class="form-box" id="login-box">
            <div class="header">Create Your Account With Us</div>
            <br><br>
            <hr>
            <form action="" method="post">
                <div class="body bg-white">
                <div class="form-group">
                       Username : <input type="text" name="username" class="form-control" placeholder="username"/>
                    </div>

                    <div class="form-group">
                        Email :   <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email']); ?>"/>
                    </div>

                     <div class="form-group">
                     Contacts : <input type="contacts" name="contacts" class="form-control" placeholder="Contacts" value="<?php if(isset($_POST['contacts'])) echo htmlentities($_POST['contacts']); ?>"/>
                    </div>

                     <div class="form-group">
                    Website  :  <input type="website" name="website" class="form-control" placeholder="Website" value="<?php if(isset($_POST['website'])) echo htmlentities($_POST['website']); ?>"/>
                    </div>
                    
                     <div class="form-group">
                    D_origin :  <input type="d_origin" name="d_origin" class="form-control" placeholder="d_origin" value="<?php if(isset($_POST['d_origin'])) echo htmlentities($_POST['d_origin']); ?>"/>
                    </div>

                    <div class="form-group">
                    Password :  <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                    
                </div>
                <div class="footer">                    

                    <button type="submit" name="submit" class="btn bg-blue btn-block">Get Started</button>

                    <a href="login.php" class="text-center">I already have an account</a><br>
					
                </div>
            </form>
		<?php 
		if(empty($errors) === false){
			echo '<p>' . implode('</p><p>', $errors) . '</p>';	
		}

		?>
        <hr>
            <div class="margin text-center">
                <span>By clicking below to sign up, you are agreeing to the Handoutt <a href="">Terms of Service.</a></span>
                <br/>

            </div>
        </div>

    </body>
</html>