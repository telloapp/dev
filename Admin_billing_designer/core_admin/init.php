<?php 
session_start();
require 'connect/database.php';
require 'classes/general.php';
require 'classes/bcrypt.php';
require 'classes/Users.php';
require 'classes/billing.php';
require 'classes/admin_billing.php';



// error_reporting(0);

$users 		= new Users($db);
$billing 	= new Billing($db);
$admin_billing 	= new Admin_billing($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(12);


$errors = array();

if ($general->logged_in() === true)  {
	$user_id 	= $_SESSION['id'];
	$user 		= $users->userdata($user_id);
}

ob_start(); // Added to avoid a common error of 'header already sent'