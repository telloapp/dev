<?php
require 'core/init.php';

$id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$id = $_GET['id'];

$view_revisions_site = $client_project->list_all_revisions($id);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
    <a href="logout.php">logout</a>
      <!--?php include 'includes/goback.php'; ?-->
      <a href="index.php">Go Back</a>

    </header>
</head>
<body>

<h1>list of all revisions Site</h1>

 <table width="100%" border="1" cellspacing="1" cellpadding="1">
                                  <tr>
                                  <th>Site Name</th>
                                  <th>View details</th>
                                  
                                 
                                </tr>
                                 
                                 <?php
                                foreach ( $view_revisions_site as $row ) {?>
  
                                  <tr>
                                  <th><?php echo $row['site_name'] ?></a></th>
                                  <th><a href="listing_revisions.php?id=<?php echo $row['id'];?>">View details</a><th>
                                 
                              
                                </tr>

                  <?php }?>

                               
                  </table> 


 


<br>
</body>
</html>