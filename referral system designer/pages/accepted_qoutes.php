<?php
require '../core/init.php';
$general->logged_out_protect();

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']);

$QuoteObj = $client->ViewAcceptedQoutes($user_id);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h2>My Accepted quotes</h2><hr>
<a href="client_panel.php">Home</a>
<br>

<?php foreach($QuoteObj as $rows) {?>

Designer name :&nbsp;<?php echo $rows['username'];?><br>
Quotation price :&nbsp;<?php echo $rows['quote_price'];?><br>
Date to finish :&nbsp;<?php echo $rows['finish_date'];?>
<h4>Maintenance</h4>
Basic Maintenance amount :&nbsp;<?php echo $rows['basic_m_amt'];?>&nbsp;Period :&nbsp;<?php echo $rows['basic_m_period'];?>&nbsp;days<br>
advanced Maintenance amount :&nbsp;<?php echo $rows['advanced_m_amt'];?>&nbsp;Period :&nbsp;<?php echo $rows['advanced_m_period'];?>&nbsp;days<br><br>
<!--<a href="removeQuote.php?site_id=<?php echo $rows['site_id'];?>">remove quote</a>-->

<?php }?>

</body>
</html>