<?php
require '../../core_admin/init.php';
$general->logged_out_protect();


//$id   = htmlentities($user['id']); // storing the user's id after clearning for any html tags.
 $id = $_GET['id'];
$details_of_revisions = $client_project->view_revision_details($id);

//$num_rows="";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
    <a href="logout.php">logout</a>

     <a href="listing_revisions.php">Go Back</a>

</head>
<body>

<h1>Details of revisions </h1>
<p></p>
<table width="100%" border="1" cellspacing="1" cellpadding="1">
   
    <th>Feature name</th>
    <th>Status</th>
   

                                 <?php

                                foreach ( $details_of_revisions as $row ) {?>
                                <tr>
  

                                <td><?php echo $row['revision_data'];?></td>
                                  <td>;<?php echo $row['status'];?></td>
                                </tr>

                  <?php }?>

                               
                  </table> 
</body>
</html>