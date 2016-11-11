<?php
require 'core/init.php';

$general->logged_out_protect();
$id   = htmlentities($user['id']); // storing the user's username after clearning for any html tags.


$view_church = $church->churchdata($id);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Church App</title>
</head>
<body>

<h1>Welcome to the Church app</h1>
<p>What do you want to do ?</p>
<ol>
    <li><a href="addchurch.php">Register My Church</a></li>
    <!--li><a href="addbiz.php">Register My Business</a></li-->
    <li><a href="logout.php">Logout</a></li>
</ol>

<h1>Dashboard</h1>

<?php foreach ($view_church as $row) { ?>
<label>Church Name</label>
<p><?php echo $row['name']; ?></p>
<br>
<label>Church Website</label>
<p><?php echo $row['website']; ?></p>
<br>
<label>Description</label>
<p><?php echo $row['text']; ?></p>
<br>
<label>Address</label>
<p><?php echo $row['addr1']; ?></p>
<p><?php echo $row['addr2']; ?></p>
<p><?php echo $row['addr3']; ?></p>
<p><?php echo $row['addr4']; ?></p>
<br>
<label>Contact Numbers</label>
<p><?php echo $row['cell1']; ?></p>
<p><?php echo $row['cell2']; ?></p>
<br>
<label>Email</label>
<p><?php echo $row['email']; ?></p>
<br>
<label>Pastor Name</label>
<p><?php echo $row['pastor']; ?></p>
<br>
<label>Pastor's Website</label>
<p><?php echo $row['pastor_site']; ?></p>
<br>
<label>How we worship</label>
<p><?php echo $row['music_vid']; ?></p>
<br>
<label>How we preach</label>
<p><?php echo $row['preach_vid']; ?></p>

 <td> <a href="previewedit_church.php?id=<?php echo $row['id']; ?>" onclick='return confirm("Are you sure you want to edit?")'class="btn btn-danger btn-sm">edit</a>
<a href="delete_church.php?id=<?php echo $row['id']; ?>" onclick='return confirm("Are you sure you want to delete?")'class="btn btn-danger btn-sm">Delete</a></td>

<?php } ?>
<br>
</body>
</html>