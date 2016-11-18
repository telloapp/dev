<?php 
error_reporting(E_ALL);

require 'core/init.php';

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.
$id = $_GET['id'];
$inprogress_project_done = $projects->inprogress_project_done($id);

header('location:inprogress_project.php');



?>