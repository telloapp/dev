<?php
require 'core/init.php';

$id   = htmlentities($user['id']); // storing the user's id after clearning for any html tags.
$site_id = $_GET['site_id'];
$count_all_revision = $client_project->count_revisions($id,$site_id);
$countrows = count($count_all_revision);



$completed_revisions = $client_project->list_of_completedrevisions($site_id);

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

     <?php include 'includes/goback.php'; ?>

</head>
<body>

<h1>list of completed Revisions</h1>

<br><br>
 <table width="100%" border="1" cellspacing="1" cellpadding="1">
                                  <tr>
                                  <th>Site Name</th>
                                  <th>Site linK</th>
                                  <th>Approve Site</th>
                                  <th>Revision</th>
                                </tr>

                                 <?php
                                foreach ( $completed_revisions as $row ) {?>
  
                                  <tr>
                                  <th><?php echo $row['site_name'] ?></a></th>
                                  <th><span style="color: #0000FF;"> <a title="handoutt" href="http://www.handoutt.co.za/" target="_blank" style="color: #0000FF;">Handout technologies</a>.</span></th>                               
                                   <th><a href="aprove_site.php?id=<?php echo $row['id'];?>">Aprrove Site</a></th>
                                
                                <th><?php if ($countrows >= 3) { ?>
                              <a href="clientcomplains.php?id=<?php echo $row['id'];?>" onclick='return confirm("You can only make complins after three revirions")'>Complains</a>    
                                <?php }  elseif ($countrows <= 3 ) { ?>
                              <a href="revision.php?id=<?php echo $row['id'];?>"  onclick='return confirm("Are you sure u want revisions")'>Unhappy</a>
                               <?php }?><th>
                              
                                </tr>

                  <?php }?>

                               
                  </table> 

</body>
</html>