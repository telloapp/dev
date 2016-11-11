<?php
require '../core/init.php';

//$user_id  = htmlentities($user['id']);

$list = $quotation-> list_allquote_request();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>All Quote Request Information</h3>
<a href = "index.php">Back</a>
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
   <a href="view_quote_request.php?id=<?php echo $key['id']; ?>">View Details</a>
   <a href="create_quote.php?id=<?php echo $key['id']; ?>">Create Quote</a>
   

  <?php }?>
</body>
</html>