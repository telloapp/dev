<?php
require 'core/init.php';
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
                    header('Location: index.php');
                    exit();
                }
            }
        } 


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="" method="post">
	
<label>username <span>*</span> <input type="text" name="username" onkeypress="return onlyAlphabets(event,this);" required></label><br><br>
<label>password <span>*</span> <input type="password" name="password" required></label><br><br>

<input type="submit" name="submit" value="login">

</form>
<br><br>
 <script type="text/javascript" src="js/alpha.js"></script>
<script type="text/javascript" src="js/number.js"></script>

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


</body>
</html>