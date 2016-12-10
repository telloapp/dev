<?php
require '../../core_admin/init.php';


$site_id = $_GET['id'];
$inprogress_status = 'Inprogress';
$client_project->update_revisions($inprogress_status,$id);
header('location:revision.php');
?>

