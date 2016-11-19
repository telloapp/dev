<?php 
session_start();
require 'connect/database.php';
require 'classes/users.php';
require 'classes/general.php';
require 'classes/bcrypt.php';
require 'classes/business.php';
require 'classes/admin_client.php';
require 'classes/client_project.php';


// error_reporting(0);

$users 		= new Users($db);
$admin_client 		= new admin_client($db);
$client_project 		= new client_project($db);

$business 	= new Business($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(12);

$errors = array();

if ($general->logged_in() === true)  {
	$user_id 	= $_SESSION['id'];
	$user 		= $users->userdata($user_id);
}

ob_start(); // Added to avoid a common error of 'header already sent'