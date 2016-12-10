<?php 
error_reporting(E_ALL);

require '../../core_admin/init.php';
$general->logged_out_protect();

//$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
//$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.
$c_id = $_GET['c_id'];
$user_id=$_GET['user_id'];

$approve_list = $client_payment->p_status($c_id,$user_id);

header('location:view_pending.php?user_id='. $user_id);



?>