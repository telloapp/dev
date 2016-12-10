<?php
require '../../core_admin/init.php';


$site_id = $_GET['site_id'];
$id = $_GET['id'];
$revision_num = 'Uncomplete';
$client_project->update_revision2($revision_num,$id);
header('location:revision.php?site_id='.$site_id);
?>