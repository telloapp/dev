<?php
require '../core/init.php';

$site_id='4';
$avgObj = $client->getAvgScore($site_id);
$ratingsObj = $client->countRatings($site_id);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php foreach ($avgObj as $key) { ?>

<?php $num_rows = count($ratingsObj); ?>

<?php
if (empty($avgObj) || empty($num_rows)) { ?>
<?php echo "Designer has not been rated yet";?><br>
<a href="index.php">Home</a>
<?php }
else { ?>
<?php 
$totalRating = $key['total'];
$avg = $totalRating / ($num_rows*10) * 100;
echo "Designer Rating is $avg %";
?>
<br>
<a href="index.php">Home</a>

<?php } }?>


</body>
</html>

