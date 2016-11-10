<?php
require 'core/init.php';
$general->logged_out_protect();


$id   = htmlentities($user['id']); // storing the user's id after clearning for any html tags.
$site_id = $_GET['site_id'];
$count_all_revision = $client_project->count_revisions($id,$site_id);
$countrows = count($count_all_revision);

//$num_rows="";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
    <a href="logout.php">logout</a>
</head>
<body>

<h1>list of Revision </h1>
<p></p>
<ol>

     <li> Number Of Revisions : <?php echo $countrows; ?>  </li> 

      <a href="completedrevisions.php?site_id=<?php echo $site_id;?>">Completed Site</a>
    <!--li><a href="addbiz.php">Register My Business</a></li-->
    <a href="revision_inprogress.php?site_id=<?php echo $site_id;?>">In Progress Site</a>
  
</ol>


<br>
</body>
</html>