<?php
require '../core/init.php';

//$id   = htmlentities($user['id']);
$id = $_GET['id'];
$cancel_status= "Cancelled";
$cancell_date= date('Y-m-d');
$client_project->update_cancel_status($cancel_status,$cancell_date,$id);
header('location:list_cancelledsite.php');
?>