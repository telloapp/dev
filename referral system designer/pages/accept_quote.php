<?php
require '../core/init.php';
$general->logged_out_protect();

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']);


$d_q_id = $_GET['q_id'];
$site_id = $_GET['site_id'];
$designer_id = $_GET['designe_id'];

$dd = date('Y-m-d');
$code_Status = "Yes";

$client->addStatus($dd,$site_id,$d_q_id);
$client->updateDDAccepted($site_id,$dd,$code_Status,$d_q_id);
$client->updatedesignerId($site_id,$designer_id);

header('location:Payment_type_page.php?site_id='.$site_id.'&d_q_id='.$d_q_id);

?>