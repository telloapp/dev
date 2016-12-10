<?php
require '../../core_admin/init.php';

$id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$id = $_GET['id'];


$view_aproved_site = $client_project->list_aproved_site($id);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
    <a href="logout.php">logout</a>
      <!--?php include 'includes/goback.php'; ?-->
      <!--a href="index.php">Go Back</a-->
    </header>
</head>
<body>

<h1>list of All Approved Site</h1>

 <table width="100%" border="1" cellspacing="1" cellpadding="1">
                                  <tr>
                                  <th>Site Name</th>
                                  <th>Approved Date</th>
                                  
                                 
                                </tr>

                                 <?php
                                foreach ( $view_aproved_site as $row ) {?>
  
                                  <tr>
                                  <th><?php echo $row['site_name'] ?></a></th>
                                  <th><?php echo $row['aprove_date'] ?></a></th>
                                 
                              
                                </tr>

                  <?php }?>

                               
                  </table> 


 


<br>
</body>
</html>