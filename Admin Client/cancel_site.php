<?php
require 'core/init.php';

//$id   = htmlentities($user['id']);
$id = $_GET['id'];
$status3 = "cancelled";
$cancell_date= date('Y-m-d');
$client_project->update_statushtree($status3,$cancell_date,$id);
header('location:list_cancelledsite.php');
?>