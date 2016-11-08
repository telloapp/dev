<?php 
require '../core/init.php';
$general->logged_out_protect();

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$feature_id = $_GET['feature_id'];
$id = $_GET['id'];

$event_info = $client->delete_feature($feature_id);
header('Location:edit_features.php?id='.$id);
?>