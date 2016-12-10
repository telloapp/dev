<?php
require '../core_admin/init.php';


$site_id = $_GET['id'];
$statustwo = 'Not Complete';
$client_project->update_revisions($statustwo,$site_id);
header('location:revision.php?site_id='.$site_id);
?>