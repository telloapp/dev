<?php
require '../core/init.php';


$id = $_GET['id'];
$statustwo = 'Approved';
$aprove_date= date('Y-m-d');
$client_project->update_statustwo($statustwo,$aprove_date,$id);
header('location:list_approvedsite.php');
?>

