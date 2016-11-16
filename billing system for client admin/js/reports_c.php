<?php
error_reporting(E_ALL);
require '../core/init.php';


$c_id=$_GET['cid'];
$name=$_GET['cat_name'];

$cars->report_count_c($c_id);

 header('location:view_carlisting.php?name='.$name);


