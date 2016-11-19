<?php
require '../core/init.php';

$criteriaObj = $client->viewCriteria();

if (isset($_POST['submit'])) {
$user_id = '2';
$designer_id ='3';
$site_id='4';

$ratings = htmlentities($_POST['ratings']);
$comments = htmlentities($_POST['comments']);
$client->addRatings($user_id,$designer_id,$site_id,$ratings,$comments);
header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Rate your designer below!</h3><hr>
<form action="" method="POST">
<?php foreach ($criteriaObj as $rows) { ?>

<select name="ratings[]">

<option value="<?php if(isset($_POST['ratings'])) echo htmlentities($_POST['ratings']); ?>"></option>

<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
<?php echo $rows['criteria'];?><br>
<?php } ?>

<label>Help us improve our designers. comment on your ratings</label>
<textarea name="comments" placeholder="Tell us why you have rated this designer that much" rows="8"></textarea><br /><br />

<input type="submit" name="submit" value="rate designer">
</form>


</input>
</body>
</html>

