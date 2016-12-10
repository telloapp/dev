<?php
require '../../core_admin/init.php';

//$user_id  = htmlentities($user['id']);

$list = $admin->list_all_designer();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>All Designers</h3>
<a href = "admin_index.php">Back</a>
<hr>
<table>
   <tr>
     <th>Name</th>
     <th>Details</th>
   </tr>
 <?php foreach ($list as $row ) { ?>
 
   <div>
   <tr>
     <th><?php echo $row['username']; ?></th>
     <th><a href="designer_project.php?id=<?php echo $row['id']; ?>">View Details</a></th>
     </tr>
     </div>
 
  <?php }?>
</table>
</body>
</html>