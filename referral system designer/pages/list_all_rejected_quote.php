<?php
require '../designers/init.php';

$designer_id  = htmlentities($user['id']);

$list = $quotation->list_all_rejected_quote($designer_id);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>All Rejected Quotes</h3>
<a href = "designer_index.php">Back</a>
<hr>
  <?php foreach ($list as $key ) { ?>

	 <div>
     Quote_Num : <?php echo $key['quote_num']; ?>
     </div>
     
      <div>
     Quote_Price : <?php echo $key['quote_price']; ?>
     </div>
      <div>
     Finish_Date : <?php echo $key['finish_date']; ?>
     </div>
      <div>
     Own_Maintenance : <?php echo $key['own_maintenance']; ?>
     </div>
   
 <br>
   <a href="list_rejected_quote.php?id=<?php echo $key['id'];?>">View Details</a>
   <a href="delete_rejected_quote.php?id=<?php echo $key['id']; ?>"onclick='return confirm("Are you sure you want to delete this?")'>DELETE</a>
   
<hr>
  <?php }?>

</body>
</html>