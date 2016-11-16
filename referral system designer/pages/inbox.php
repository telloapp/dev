<?php
require '../core/init.php';
$general->logged_out_protect();

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$site_id = $_GET['id'];
$designerQuote = $client->viewInbox($site_id);

if (isset($_POST['submit'])) { 

$dd = date('Y-m-d');

$client->addStatus($dd,$site_id);

header('location:client_panel.php');

}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php if (empty($designerQuote)) { ?>
<?php echo "No qoutation has been sent yet";?><br>
<?php echo "Keep on checking for any replies";?><br>
<a href="outbox.php">OK</a>
<?php } else { ?>

<h2>Quotation replies</h2><hr>
<a href="outbox.php">Back</a>
<br>
<br>
<form action="" method="post">
<?php foreach ($designerQuote as $key) {?>

Designer name :&nbsp;<?php echo $key['username'];?><br>
Quotation price :&nbsp;<?php echo $key['quote_price'];?><br>
Date to finish :&nbsp;<?php echo $key['finish_date'];?>
<h4>Maintenance</h4>
Basic Maintenance amount :&nbsp;<?php echo $key['basic_m_amt'];?>&nbsp;Period :&nbsp;<?php echo $key['basic_m_period'];?>&nbsp;days<br>
advanced Maintenance amount :&nbsp;<?php echo $key['advanced_m_amt'];?>&nbsp;Period :&nbsp;<?php echo $key['advanced_m_period'];?>&nbsp;days<br><br>

<input type="submit" name="submit" value="accept Quotation">

<?php } }?>
</form>
</body>
</html>