<?php
require '../../core_admin/init.php';

$id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$site_id = $_GET['id'];
$all=$client_project->view_project_tb($id);
if(isset($_POST['save'])){


    $complaint            = htmlentities($_POST['complaint']);
   


$client_project->insert_in_to_complaint($user_id,$site_id, $complaint); //insert function call

header('Location:client_complains.php');

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Client Project</title>
</head>
<body>

<h1>Write why you are not setisfied after three revisions</h1>
<p></p>

 <form method="post" class="noo-form property-form" role="form" enctype="multipart/form-data" >
  <label for="area">Description&nbsp;</label>
  <textarea id="textarea" name="complaint" rows="15" required=""><?php if(isset($_POST['complaint'])) echo htmlentities($_POST['complaint']); ?></textarea>

   <input type="submit" name="save" class="btn btn-lg rounded metro btn-warning" value="Save">

</form>
  </body>