<?php
require '../core/init.php';

$id = $_GET['id'];

$list = $admin->display_rejected_quote_details($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>All Rejected Quotes</h3>
  <a href = "designer_project.php?id=<?php echo "$id";?>">Back</a>
<hr>
  <?php foreach ($list as $row ) { ?>

	 <div>
     Quote_Num : <?php echo $row['quote_num']; ?>
     </div>
     
      <div>
     Quote_Price : <?php echo $row['quote_price']; ?>
     </div>
      <div>
     Finish_Date : <?php echo $row['finish_date']; ?>
     </div>
      <div>
     Own_Maintenance : <?php echo $row['own_maintenance']; ?>
     </div>
   
     <br>

   <a href="list_all_rejected_quote.php?id=<?php echo $row['id']; ?>">View Details</a>


  <hr>  
  <?php }?>
  <br><br>



</body>
</html>