<?php
require '../../core_admin/init.php';
$general->logged_out_protect();


//$id   = htmlentities($user['id']); // storing the user's id after clearning for any html tags.
 $id = $_GET['id'];
$show_complaints = $client_project->view_coplaints_details($id);

//$num_rows="";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
    <a href="logout.php">logout</a>

     <a href="client_complains.php">Go Back</a>

</head>
<body>

<h1>Details of revisions </h1>
<p></p>
<table width="100%" border="1" cellspacing="1" cellpadding="1">
   
    <th>Complains details</th>
   
   

                                 <?php

                                foreach ( $show_complaints as $row ) {?>
                                <tr>
  

                                <td><?php echo $row['complaint'];?></td>
                                
                                </tr>

                  <?php }?>

                               
                  </table> 
</body>
</html>