<?php
error_reporting(E_ALL);
require '../core_admin/init.php';

$usersObj = $adminLogin->listClients();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="admin_homepage.php">Home</a>
<hr>
<h3>Registered clients</h3>

<?php foreach($usersObj as $rows) { ?>
<form>
<label>Client username :</label>
<?php echo $rows['username'];?><br>
<label>Cellphone No. :</label>
<?php echo $rows['contacts'];?><br>
<label>email :</label>
<?php echo $rows['email'];?><br>
<a href="view_client_quote_req.php?id=<?php echo $rows['id'];?>">quote request</a>
<br>
<br>

</form>
<?php }?>


</body>
</html>