<?php 
require 'core/init.php';
$general->logged_in_protect();

if (isset($_POST['submit'])) {

	if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])  || empty($_POST['contacts'])){

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
		$contacts = htmlentities($_POST['contacts']);
		
		$users->register($username, $password, $email, $contacts);
		$login = $users->login($username, $password);
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

<html lang="en">

<body>


<form action="" method="post">
<label>contacts <span>*</span> <input type="text" name="contacts" onkeypress="return onlyNos(event,this);" required></label><br><br>
<label>e-mail <span>*</span> <input type="email" name="email" required></label><br><br>
<label>username <span>*</span> <input type="text" name="username" onkeypress="return onlyAlphabets(event,this);" required></label><br><br>
<label>password <span>*</span> <input type="password" name="password" required></label><br><br>

<input type="submit" name="submit" value="Submit">

</form>
  <script type="text/javascript" src="js/alpha.js"></script>
  <script type="text/javascript" src="js/number.js"></script>

<br>
  <div class="copyright" style="background: #A9A9A9;">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 text-block" style="color: #fff;">
              &copy; <?php echo date("Y"); ?> www.handoutt.co.za All Rights Reserved.
              <br />
              
             
              <br>
            </div>
            <div class="col-xs-12 col-sm-6 logo-block">
              <!--div class="logo-image">
                <a href="index.php"><img src="images/logo/logo.png" alt="Afrilisting"></a>
              </div-->
            </div>
          </div>          
        </div>
       
        <!-- START BACK TO TOP -->
        <div id="back-to-top" class="back-to-top">
          <i class="fa fa-angle-up"></i>
        </div>
        <!-- END BACK TO TOP -->
      </div>
      <!-- END COPY
</body>
</html>