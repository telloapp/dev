<?php
require '../core/init.php';

$user_id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$site_id = $_GET['site_id'];
$show_revisions =$client_project->view_project_tb($user_id);
if(isset($_POST['save'])){

$start_date = date('Y-m-d');
$end_date   =date('Y-m-d', strtotime(' + 3 days'));
 $status    ="Not Done";
 $revision_num= "complete";

    $revision_data            = htmlentities($_POST['revision_data']);
    

$client_project->insert_in_to_revision($user_id,$site_id, $status, $revision_data,$start_date,$end_date,$revision_num); //insert function cshow_revisions

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

<h1>Write changes you want in your Site</h1>
<p></p>

 <form method="post" class="noo-form property-form" role="form" enctype="multipart/form-data" >
  <label for="area">Description&nbsp;</label>
  <textarea id="textarea" name="revision_data" rows="15" required=""><?php if(isset($_POST['revision_data'])) echo htmlentities($_POST['revision_data']); ?></textarea>

   <input type="submit" name="save" class="btn btn-lg rounded metro btn-warning" value="Save">

</form>
  </body>