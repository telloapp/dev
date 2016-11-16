<?php
error_reporting(E_ALL);

require '../core/init.php';
$general->logged_out_protect();

$user_id 	= htmlentities($user['id']);

$m_id =$_GET['m_id'];

$deletemsg = $admin->delete_messages($m_id); // delete message
$deletecomments = $admin->delete_comments($m_id);  // delete comments

header('Location:home.php');

?>
