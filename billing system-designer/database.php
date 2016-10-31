<?php 
$config = array(
	'host'		=> 'localhost',
	'username' 	=> 'tebogo',
	'password' 	=> '01542',
	'dbname' 	=> 'tello_app'
);

$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);