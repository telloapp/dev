<?php 
session_start();
require 'connect/database.php';
require 'classes/general.php';
require 'classes/bcrypt.php';
require 'classes/Users.php';
require 'classes/billing.php';
require 'classes/admin_billing.php';
require 'classes/client_payment.php';
require 'classes/client_payment_admin.php';
require 'classes/admin.php';
require 'classes/chartforum.php';
require 'classes/client_project.php';
require 'classes/admin_client.php';
require 'classes/quotation.php';
require 'classes/adminLogin.php';
require 'classes/admin_project.php';
require 'classes/designer.php';




// error_reporting(0);

$users 		= new Users($db);
$billing 	= new Billing($db);
$designer 	= new designer($db);
$quotation 	= new quotation($db);
$adminLogin 	= new adminLogin($db);
$projects 	= new admin_project($db);
$client_project 	= new client_project($db);
$admin_client 	= new admin_client($db);
$admin 	= new Admin($db);
$chartforum 	= new chartforum($db);
$client_payment 	= new client_payment($db);
$client_payment_admin 	= new client_payment_admin($db);
$admin_billing 	= new Admin_billing($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(12);


$errors = array();

if ($general->logged_in() === true)  {
	$user_id 	= $_SESSION['id'];
	$user 		= $users->userdata($user_id);
}

ob_start(); // Added to avoid a common error of 'header already sent'