<?php 
session_start();
require 'connect/database.php';
require 'classes/client.php';
require 'classes/general.php';
require 'classes/bcrypt.php';


// error_reporting(0);

$client 	= new client($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(12);


$errors = array();

if ($general->logged_in() === true)  {
	$user_id 	= $_SESSION['id'];
	$user 		= $client->userdata($user_id);
}

ob_start(); // Added to avoid a common error of 'header already sent'