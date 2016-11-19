<?php
require 'core/init.php';

$id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$site_id = $_GET['site_id'];

$inprogress_revisions = $client_project->list_of_revision($site_id);



?>
<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
    <a href="logout.php">logout</a>

     <?php include 'includes/goback.php'; ?>

</head>
<body>

<h1>list of  Site that are  In Progress</h1>

 <table width="100%" border="1" cellspacing="1" cellpadding="1">
                                  <tr>
                                  <th>Site Name</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>viewdetails</th>
                                
                                </tr>

                                 <?php
                                foreach ( $inprogress_revisions as $row ) {?>
  
                                  <tr>
                                  <th><?php echo $row['site_name'] ?></a></th>
                                  <th><?php echo $row['start_date'] ?></a></th>
                                  <th><?php echo $row['end_date'] ?></a></th>
                                <th><li><a href="revision_details.php?id=<?php echo $row['id'];?>">View details</a></li><th>
                              
                                </tr>

                  <?php }?>
                 
                  </table> 

<br>
</body>
</html>