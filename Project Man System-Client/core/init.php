<?php 
session_start();
require 'connect/database.php';
//require 'classes/users.php';
require 'classes/general.php';
require 'classes/bcrypt.php';
require 'classes/client_project.php';
require 'classes/project.php';
require 'classes/users.php';


// error_reporting(0);

//$users 		    = new Users($db);
$client_project = new client_project($db);
$project          = new project($db);
$users          = new users($db);
$general 	   = new General();
$bcrypt 	    = new Bcrypt(12);

$errors = array();

if ($general->logged_in() === true)  {
	$user_id 	= $_SESSION['id'];
	$user 		= $project->userdata($user_id);
}

ob_start(); // Added to avoid a common error of 'header already sent'