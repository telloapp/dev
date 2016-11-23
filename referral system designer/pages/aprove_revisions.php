<?php
require '../core/init.php';


$site_id = $_GET['id'];
$statustwo = 'Not Complete';
$client_project->update_revisions($statustwo,$id);
header('location:revision.php');
?>

