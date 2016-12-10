<?php
require '../core/init.php';


$id = $_GET['id'];
$progress_status = 'Approved';
$aprove_date= date('Y-m-d');
$client_project->update_progress_status($progress_status,$aprove_date,$id);
header('location:list_approvedsite.php');
?>

