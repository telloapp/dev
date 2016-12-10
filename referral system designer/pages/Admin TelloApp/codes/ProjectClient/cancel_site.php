<?php
require '../../core_admin/init.php';

//$id   = htmlentities($user['id']);
$id = $_GET['id'];
$cancell_status = "Cancelled";
$cancell_date= date('Y-m-d');
$client_project->update_cancell_status($cancell_status,$cancell_date,$id);
header('location:list_cancelledsite.php?id='.$id);
?>