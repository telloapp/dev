<?php
require 'core/init.php';

$id   = htmlentities($user['id']); // storing the user's id after clearning for any html tags.
$site_id = $_GET['id'];
$count_all_revision = $client_project->count_revisions($id,$site_id);
$countrows = count($count_all_revision);
$completed_revisions = $client_project->list_new_revisions($site_id);

if(isset($_POST['submit']))
{
    $site_name              = htmlentities($_POST['site_name']);
    $website_type           = htmlentities($_POST['website_type']);
    $status                 = htmlentities($_POST['status']);
    $social_link            = htmlentities($_POST['social_link']);
    $revision_num            = htmlentities($_POST['revision_num']);
header("Location: " . $_SERVER['REQUEST_URI']);

}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
    <a href="logout.php">logout</a>

     <!--?php include 'includes/goback.php'; ?-->
     <a href="all_user_revisions.php">Go Back</a>

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
                                  <th>View detais</th>
                                </tr>

                                 <?php
                                foreach ( $completed_revisions as $row ) {?>
  
                                  <tr>
                                  <th><?php echo $row['site_name'] ?></a></th>
                                   <?php if ($row['revision_num'] == "Uncomplete") { ?>

                         
                        <th><button type="submit" name="" disabled OnClick=" location.href='http://www.handoutt.co.za/' ">Handout technologies</button></th>

                        <th><button type="submit" name="" disabled OnClick=" location.href='aprove_site.php?id=<?php echo $row['id'];?>' ">Approve Site</button></th>

                         <th><button type="submit" name="" disabled OnClick=" location.href='revision.php'?id=<?php echo $row['id'];?>' ">Unhappy</button></th>

                         <th><a href="revision_details.php?id=<?php echo $row['id'];?>">View details</a></th>




                                <?php } else { ?>

                                  <th><button type="submit" name=""  OnClick=" location.href='http://www.handoutt.co.za/' ">Handout technologies</button></th>

                        <th><button type="submit" name=""  OnClick=" location.href='aprove_site.php?id=<?php echo $row['id'];?>' ">Approve Site</button></th>

                                                        
                                                          <?php if ( $row['status'] == "Done") { ?>

                       
                              <?php if ($countrows >= 3) { ?>
                              <th><a href="clientcomplains.php?id=<?php echo $row['id'];?>" onclick='return confirm("You can only make complins after three revirions")'>Complains</a></th>   
                                <?php }  elseif ($countrows <= 3 ) { ?>
                             <th><button type="submit" name="checklist_completed"  OnClick=" location.href='update_revisions.php?id=<?php echo $row['id'] ?>&site_id=<?php echo "$site_id";?>' ">Unhappy</button></th>
                                <?php }?>
                     

                                <?php } else if ($row['status'] == "Not Done") { ?>

                        <th><button type="submit" name="checklist_completed" disabled OnClick=" location.href='update_revisions.php?id=<?php echo $row['id'];?>' ">Unhappy</button></th>
                           <?php  }?>




                          

                              <th><a href="revision_details.php?id=<?php echo $row['id'];?>">View details</a></th>
                              
                                </tr>

                  <?php }?>
                              

                  <?php }?>

                               
                  </table> 

</body>
</html>