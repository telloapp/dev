<?php 
require '../core/init.php';
$general->logged_out_protect();


$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>law</h3>
<a href="drafts.php">View Drafts</a>&nbsp;&nbsp;
<a href="outbox.php">Send requests(outbox)</a>&nbsp;&nbsp;
<a href="accepted_qoutes.php">my accepted quotes</a>&nbsp;&nbsp;
<a href="user_panel.php">Home</a>&nbsp;&nbsp;
<a href="logout.php">Logout</a>
<hr>
<h3>mash</h3>
    <p><a href="completed_project.php">Completed Site</a></p>
    <!--li><a href="addbiz.php">Register My Business</a></li-->
   <p><a href="in_progress.php">In Progress Site</a></p>
   <p><a href="list_cancelledsite.php">All Cancelled Site</a></p>
  <p> <a href="list_approvedsite.php">All Approved Site</a></p>
  <p> <a href="all_user_revisions.php">All revisions Site</a></p>
  <hr>
  <h3>Akani</h3>
    <br>
 <span>
     <a href="client_payment_status.php" class="user-link "><i class="fa fa-user"></i>Payment</a> 
   </span>
     <br>
 <span>
     <a href="view_work.php" class="user-link "><i class="fa fa-user"></i>View the work</a> 
   </span>
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
</body>
</html>