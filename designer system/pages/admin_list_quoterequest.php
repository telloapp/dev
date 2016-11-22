<?php
require '../../core/init.php';

//$user_id  = htmlentities($user['id']);

$list = $admin->list_quote_request();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>All Quote Request Information</h3>

<hr>
  <?php foreach ($list as $key ) { ?>

	 <div>
     <?php echo $key['website_type']; ?>
     </div>
     
      <div>
     <?php echo $key['due_date']; ?>
     </div>
      <div>
     <?php echo $key['site_name']; ?>
     </div>
      <div>
     <?php echo $key['website_type']; ?>
     </div>
   
 <br>

   

  <?php }?>
</body>
</html>