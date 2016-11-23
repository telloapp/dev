<?php
require '../core/init.php';

$id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.



$list_inprogress = $client_project->view_inprogress();

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
    </header>
</head>
<body>

<h1>list of In Progress Site</h1>

 <table width="100%" border="1" cellspacing="1" cellpadding="1">
                                  <tr>
                                  <th>Site Name</th>
                                  
                                  <th>View Details of a Site</th>
                                  <th>Cancel Site</th>
                                </tr>

                                 <?php
                                foreach ( $list_inprogress as $row ) {?>
  
                                  <tr>
                                  <th><?php echo $row['site_name'] ?></a></th>
                                 
                                <th><a href="viewsiteinfo.php?id=<?php echo $row['id'];?>">Veiw Progress</a><th>
                                <a href="cancel_site.php?id=<?php echo $row['id'];?>" onclick='return confirm("Are you sure you want to Cancell Site?")'>Cancell Site</a>
                                </tr>

                  <?php }?>

                               
                  </table> 


 


<br>
</body>
</html>