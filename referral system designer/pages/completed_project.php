<?php
require '../core/init.php';

$id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.


$show_completed_site = $client_project->view_completedsite($id);

if(isset($_POST['submit']))
{

    $site_name              = htmlentities($_POST['site_name']);
    $website_type           = htmlentities($_POST['website_type']);
    $status                 = htmlentities($_POST['status']);
    $social_link            = htmlentities($_POST['social_link']);
   

header("Location: " . $_SERVER['REQUEST_URI']);

}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
    <a href="logout.php">logout</a>
     <!--?php include 'includes/goback.php'; ?-->
     <a href="client_panel.php">Go Back</a>

</head>
<body>

<h1>list of All Completed Project</h1>

 <table width="100%" border="1" cellspacing="1" cellpadding="1">
                                  <tr>
                                  <th>Site Name</th>
                                  <th>Site linK</th>
                                  <th>Approve Site</th>
                                  <th>Revision</th>
                                  <th>Cancell Site</th>

                                </tr>

                                 <?php
                                foreach ( $show_completed_site as $row ) {?>
  
                                  <tr>
                                  <th><?php echo $row['site_name'] ?></a></th>
                                  <th><a title="handoutt" href="http://www.handoutt.co.za/" target="_blank" style="color: #0000FF;">Handout technologies</a></th>
                                <th><a href="aprove_site.php?id=<?php echo $row['id']?>&designe_id=<?php echo $row['designe_id']?>">Aprrove Site</a></th>

                                <th><a href="approve_revisions.php?id=<?php echo $row['id']?>&designe_id=<?php echo $row['designe_id']?>">Unhappy</a></th>

                                <th><a href="cancel_site.php?id=<?php echo $row['id']?>&designe_id=<?php echo $row['designe_id']?>"onclick='return confirm("Are you sure you want to Cancell Site?")'>Cancell Site</a></th>

                               
                              
                                </tr>

                  <?php }?>

                               
                  </table> 

<br>
</body>
</html>