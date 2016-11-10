<?php
error_reporting(E_ALL);
require '../core/init.php';


$pid=$_GET['p_id'];
$name=$_GET['name'];

$property->report_count_p($pid);

 header('location:view_pro.php?name='.$name);


