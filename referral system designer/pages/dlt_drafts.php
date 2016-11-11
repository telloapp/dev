<?php
require '../core/init.php';
$general->logged_out_protect();


$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$draftId = $_GET['id'];
$client->dlt_drafts($draftId);

header('location:drafts.php');
?>