<?php
$thispage = 'upload';
error_reporting(E_ALL);
require '../core/init.php';
$c_id = $_GET['c_id'];

$client_payment->insert_id($c_id);
?>

<html>
<head>
	<body>
     <p><h1>Online payment is currently offline</h1></p>


     <div class="copyright" style="background: #A9A9A9;">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 text-block" style="color: #fff;">
              &copy; <?php echo date("Y"); ?> www.handoutt.co.za All Rights Reserved.
              <br />
              
              <span style="color: #fff;">Powered by <a title="handoutt" href="http://www.handoutt.co.za/" target="_blank" style="color: #fff;">Handout technologies</a>.</span>
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
      <br><br>
      <form action="client_deshbord.php" onsubmit="alert('Wellcome to your  deshbord ');" method="get">
 <table >

  
 
    <input type="submit"  value=" Go to your deshbord">
  </table>
  
  </form>
	</body>
</head>
</head>	