<?php 
session_start();
require 'connect/database.php';
require 'classes/users.php';
require 'classes/general.php';
require 'classes/bcrypt.php';
require 'classes/chartforum.php';
require 'classes/designer.php';
require 'classes/quotation.php';
require 'classes/projects.php';
require 'classes/admin.php';

// error_reporting(0);

$users 		  	= new Users($db);
$chartforum 	= new Chartforum($db);
$designer    	= new designer($db);
$projects    	= new projects($db);
$quotation    	= new quotation($db);
$admin   	    = new admin($db);
$general 		= new General();
$bcrypt 		= new Bcrypt(12);

$errors = array();
if ($general->logged_in() === true)  {
	$designer_id 	= $_SESSION['id'];
	$user 		    = $designer->userdata($designer_id);
}

ob_start(); // Added to avoid a common error of 'header already sent'