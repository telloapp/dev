<?php 
session_start();
require 'connect/database.php';
require 'classes/users.php';
require 'classes/general.php';
require 'classes/bcrypt.php';
require 'classes/admin.php';
require 'classes/chartforum.php';


// error_reporting(0);

$users 		= new Users($db);
$admin  	= new Admin($db);
$chartforum = new chartforum($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(12);

$errors = array();

if ($general->logged_in() === true)  {
	$admin_id 	= $_SESSION['id'];
	$user 		= $admin->userdata($admin_id);
}

ob_start(); // Added to avoid a common error of 'header already sent'