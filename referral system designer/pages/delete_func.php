<?php 
error_reporting(E_ALL);

require '../core/init.php';
$general->logged_out_protect();

$username   = htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id  	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$id = $_GET['id'];

$delinfo = "";
$delinfo = $users->deleteinfo($id);

header('Location:view_info.php');

?>