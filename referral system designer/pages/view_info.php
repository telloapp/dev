<?php 
require '../core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.
$infoObj = $users->viewinfo($user_id);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="user_panel.php">Back</a><br>
<?php foreach ($infoObj as $key) {?>

<?php echo $key['name'];?>
<?php echo "<br />";?>
<?php echo $key['email'];?>
<?php echo "<br />";?>
<?php echo $key['website'];?>
<?php echo "<br />";?>
<?php echo $key['contact'];?>
<?php echo "<br />";?>
<?php echo $key['province'];?>
<?php echo "<br />";?>
<?php echo $key['city'];?>
<?php echo "<br />";?>
<?php echo $key['surbub'];?>
<?php echo "<br />";?>
<?php echo $key['genre'];?>
<?php echo "<br />";?>
<?php echo $key['listing_type'];?>
<?php echo "<br />";?>
<?php echo $key['video_link'];?>
<?php echo "<br />";?>
<?php echo $key['price'];?>
<?php echo "<br />";?>

<a href="edit.php?id=<?php echo $key['id'];?>">edit</a>
<a href="delete_func.php?id=<?php echo $key['id'];?>" onclick='return confirm("Remove your info?")'>delete</a><br><br><hr>

<?php }?>






</body>
</html>