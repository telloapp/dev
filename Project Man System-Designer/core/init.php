<?php 
session_start();
require 'connect/database.php';
require 'classes/users.php';
require 'classes/general.php';
require 'classes/bcrypt.php';
require 'classes/projects.php';


// error_reporting(0);

$users 		= new Users($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(12);
$projects   = new projects($db);

$errors = array();

if ($general->logged_in() === true)  {
	$user_id 	= $_SESSION['id'];
	$user 		= $users->userdata($user_id);
}

ob_start(); // Added to avoid a common error of 'header already sent'