<?php
require '../core/init.php';

//$id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.


$id = $_GET['id'];
$show_site_info = $client_project->feature_category($id);
//$countpercent=$client_project->countproject();

if(isset($_POST['submit']))
{

    $home_page                    = htmlentities($_POST['home page']);
    $about_page                   = htmlentities($_POST['about page']);
    $service_page                 = htmlentities($_POST['service page']);
    $team_page                    = htmlentities($_POST['team page']);
    $contact_page                 = htmlentities($_POST['contact page']);
   



header("Location: " . $_SERVER['REQUEST_URI']);

}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
</head>
<body>

<a href="in_progress.php">Go Back</a>
<h1>list of features </h1>

<div id="myProgress">
  <div id="myBar"></div>
</div>
 
 <table width="100%" border="1" cellspacing="1" cellpadding="1">
   
    <th>Feature name</th>
    <th>Status</th>
   

                                 <?php

                                foreach ( $show_site_info as $row ) {?>
                                <tr>
  
                                  <!--p><?php echo $row['pages'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Status'];?></p-->
                                <td><?php echo $row['pages'];?></td>
                                  <td>;<?php echo $row['c_status'];?></td>
                                </tr>

                  <?php }?>

                               
                  </table> 


 


<script src="js/progressbar.js"></script>
</body>
</html>