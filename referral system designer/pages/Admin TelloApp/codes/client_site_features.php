<?php
error_reporting(E_ALL);
require '../core_admin/init.php';

$siteID = $_GET['id'];
$getPages = $adminLogin->viewPages($siteID);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="view_clients.php">Back</a><br><br>
<h4>Client website features</h4>

<?php foreach ($getPages as $keys) {?>
<?php echo $keys['pages'];?><br>

<?php }?>

</body>
</html>