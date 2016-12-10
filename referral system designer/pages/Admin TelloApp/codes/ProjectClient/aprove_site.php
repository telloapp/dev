<?php
require '../../core_admin/init.php';


$id = $_GET['id'];
$inprogress_status = 'Approved';
$aprove_date= date('Y-m-d');
$client_project->update_inprogress_status($inprogress_status,$aprove_date,$id);
header('location:list_approvedsite.php?id='.$id);
?>

