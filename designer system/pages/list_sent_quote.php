<?php
require '../core/init.php';

$designer_id  = htmlentities($user['id']);

//$id = $_GET['id'];

$list = $quotation-> list_all_sentquote($designer_id);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>All Send Quotes</h3>
  <a href = "index.php">Back</a>
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

   <a href="preview_sent_quote.php?id=<?php echo $key['id']; ?>">View Details</a>
<a href="delete_save_quote.php?id=<?php echo $key['id']; ?>"onclick='return confirm("Are you sure you want to delete this?")'>DELETE</a>

  <hr>  
  <?php }?>
  <br><br>



</body>
</html>