<?php
require 'core/init.php';

$id   = htmlentities($user['id']);
$site_id = $_GET['id'];
$status3 = "cancelled";
$client_project->update_statushtree($status3,$site_id);
header('location:completed_project.php');
?>