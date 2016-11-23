<?php 
error_reporting(E_ALL);

require '../designers/init.php';

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.
$id = $_GET['id'];
$new_project_done = $projects->new_project_done($id);

header('location:new_projects.php');



?>