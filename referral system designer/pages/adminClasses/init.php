<?php 
session_start();
require 'connect/database.php';
require 'classes/adminLogin.php';
require 'classes/general.php';
require 'classes/bcrypt.php';


// error_reporting(0);

$adminLogin = new adminLogin($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(12);


$errors = array();

if ($general->logged_in() === true)  {
	$user_id 	= $_SESSION['id'];
	$user 		= $adminLogin->userdata($user_id);
}

ob_start(); // Added to avoid a common error of 'header already sent'