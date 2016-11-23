<?php
require '../core/init.php';

$id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.



$view_revisions_site = $client_project->list_revisions_site($id);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
    <a href="logout.php">logout</a>
      <?php include 'includes/goback.php'; ?>
    </header>
</head>
<body>

<h1>list of all revisions Site</h1>

 <table width="100%" border="1" cellspacing="1" cellpadding="1">
                                  <tr>
                                  <th>Site Name</th>
                                  
                                 
                                </tr>
                                 
                                 <?php
                                foreach ( $view_revisions_site as $row ) {?>
  
                                  <tr>
                                  <th><?php echo $row['site_name'] ?></a></th>
                                 
                              
                                </tr>

                  <?php }?>

                               
                  </table> 


 


<br>
</body>
</html>