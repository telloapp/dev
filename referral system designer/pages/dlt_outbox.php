<?php
require '../core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.
$outboxId = $_GET['id'];
$client->dlt_outbox($outboxId);
$client->dlt_features($outboxId);
$client->dlt_profile($outboxId);
header('location:outbox.php');
?>