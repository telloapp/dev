<?php 
session_start();
require 'connect/database.php';
require 'classes/general.php';
require 'classes/bcrypt.php';
require 'classes/designer_billing.php';
require 'classes/billing.php';



// error_reporting(0);

$designer_billing 		= new Designer_billing($db);
$billing 	= new Billing($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(12);


$errors = array();

if ($general->logged_in() === true)  {
	$user_id 	= $_SESSION['id'];
	$designer 		= $designer_billing->userdata($user_id);
}

ob_start(); // Added to avoid a common error of 'header already sent'