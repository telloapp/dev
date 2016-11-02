<?php
require '../core/init.php';
$general->logged_out_protect();


$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.


$features = $client->list_features();

if (isset($_POST['submit'])) {

$status = "send";
$origin = "tello";

$site_type		= htmlentities($_POST['website_type']);
$site_name 		= htmlentities($_POST['site_name']);
$due_date 		= htmlentities($_POST['due_date']);
$no_of_pages 	= htmlentities($_POST['no_of_pages']);
$features 		= htmlentities($_POST['features']);
$facebook 		= htmlentities($_POST['facebook']);
$twitter 		= htmlentities($_POST['twitter']);
$instagram 		= htmlentities($_POST['instagram']);

$client-> insert_siteData($user_id,$site_type,$status,$origin,$site_name,$due_date,$no_of_pages,$features,$facebook,$twitter,$instagram);
header('location:client_panel.php');
}

else if (isset($_POST['save'])) {

$status = "draft";
$origin = "tello";

$site_type		= htmlentities($_POST['website_type']);
$site_name 		= htmlentities($_POST['site_name']);
$due_date 		= htmlentities($_POST['due_date']);
$no_of_pages 	= htmlentities($_POST['no_of_pages']);
$features 		= htmlentities($_POST['features']);
$facebook 		= htmlentities($_POST['facebook']);
$twitter 		= htmlentities($_POST['twitter']);
$instagram 		= htmlentities($_POST['instagram']);

$client-> insert_siteData($user_id,$site_type,$status,$origin,$site_name,$due_date,$no_of_pages,$features,$facebook,$twitter,$instagram);
header('location:client_panel.php');
	
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<ul>

	<li><a href="client_panel.php">my dashboard</a></li>
</ul>
<form action="" method="POST">
<h3>Need a website? fill in your website information below</h3>
<br>
<label>Choose website type</label>&nbsp;

 <select id="website_type" name="website_type"required="required">
<?php include 'includes/website_types.php';?>
</select><br><br>

<label>Website name:</label>&nbsp;
<input type="text" name ="site_name" value="<?php if(isset($_POST['site_name'])) echo htmlentities($_POST['site_name']);?>"><br><br>

<label>Due date:</label>&nbsp;
<input type="date" name="due_date" value="<?php if(isset($_POST['due_date'])) echo htmlentities($_POST['due_date']);?>"
placeholder="Webiste completion date"><br><br>
<label>Number of pages:</label>&nbsp;
<input type="text" name ="no_of_pages" value="<?php if(isset($_POST['no_of_pages'])) echo htmlentities($_POST['no_of_pages']);?>"
placeholder="How many pages for your site"><br><br>

<label>Choose features here:</label>&nbsp;
<?php foreach ($features as $rows) {?>
<input id="<?php echo $rows['id']; ?>" name="features[]" type="checkbox" class="checkbox" value="<?php echo $rows['id']; ?>" />

<label class="" for="<?php echo $rows['id']; ?>"><?php echo $rows['pages']; ?></label><br><br>
																<?php }?>

<label>Facebook:</label>&nbsp;
<input type="text" name ="facebook" value="<?php if(isset($_POST['facebook'])) echo htmlentities($_POST['facebook']);?>"><br>
<label>Twitter:</label>&nbsp;
<input type="text" name ="twitter" value="<?php if(isset($_POST['twitter'])) echo htmlentities($_POST['twitter']);?>"><br>
<label>Instergram:</label>&nbsp;
<input type="text" name ="instagram" value="<?php if(isset($_POST['instagram'])) echo htmlentities($_POST['instagram']);?>"><br>
<br><br>

<label>Upload your business profile:</label>&nbsp;

<input type="hidden" name="user_id" value="<?php echo "$user_id ";?>">
<input type="submit" name="submit" value="Sent request">
<input type="submit" name="save" value="Save request">
</form>

</body>
</html>