<?php
require '../core/init.php';


$site_id = $_GET['id'];

$progress_status = 'Inprogress';
$client_project->update_revisions($progress_status,$id);
header('location:revision.php');
?>

