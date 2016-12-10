<?php
require '../core/init.php';


$site_id = $_GET['id'];
$designe_id = $_GET['designe_id'];
$progress_status = 'Inprogress';
$client_project->update_revisions($progress_status,$site_id);
header('location:revision.php?site_id='.$site_id.'&designe_id='.$designe_id);
?>