<?php
error_reporting(E_ALL);

require '../core/init.php';
$general->logged_out_protect();

$user_id 	= htmlentities($user['id']);


$m_id =$_GET['m_id'];

$id = $_GET['id'];
$message = $_GET['message'];

$deletecomments = $admin->delete_comment($id);  // delete a comment

header('Location:comments.php?m_id='.$m_id.'&message='.$message);

?>