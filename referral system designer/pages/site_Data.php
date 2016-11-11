<?php
require '../core/init.php';
$general->logged_out_protect();

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

if (isset($_POST['btn-upload'])) {

$status = "sent";
$origin = "tello";

$site_type		= htmlentities($_POST['website_type']);
$site_name 		= htmlentities($_POST['site_name']);
$due_date 		= htmlentities($_POST['due_date']);
$no_of_pages 	= htmlentities($_POST['no_of_pages']);
$facebook 		= htmlentities($_POST['facebook']);
$twitter 		= htmlentities($_POST['twitter']);
$instagram 		= htmlentities($_POST['instagram']);

$client->insert_siteData($user_id,$site_type,$status,$origin,$site_name,$due_date,$no_of_pages,$facebook,$twitter,$instagram);
$client->upload_file();
$id = mysql_insert_id();

}

else if (isset($_POST['save'])) {

$status = "draft";
$origin = "tello";

$site_type		= htmlentities($_POST['website_type']);
$site_name 		= htmlentities($_POST['site_name']);
$due_date 		= htmlentities($_POST['due_date']);
$no_of_pages 	= htmlentities($_POST['no_of_pages']);
$facebook 		= htmlentities($_POST['facebook']);
$twitter 		= htmlentities($_POST['twitter']);
$instagram 		= htmlentities($_POST['instagram']);

$client-> insert_siteData($user_id,$site_type,$status,$origin,$site_name,$due_date,$no_of_pages,$facebook,$twitter,$instagram);
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
<form action="" method="POST" enctype="multipart/form-data">
<h3>Need a website? fill in your website information below</h3>
<br>
<label>Choose website type</label>&nbsp;

 <select id="website_type" name="website_type"required="required">
<?php include 'includes/website_types.php';?>
</select><br><br>

<label>Website name:</label>&nbsp;
<input type="text" name ="site_name" value="<?php if(isset($_POST['site_name'])) echo htmlentities($_POST['site_name']);?>"><br><br>
<label>Upload your business profile</label>
 <input type="file" name="file" /><br>&nbsp;<br>
<label>Due date:</label>&nbsp;
<input type="date" name="due_date" value="<?php if(isset($_POST['due_date'])) echo htmlentities($_POST['due_date']);?>"
placeholder="Webiste completion date"><br><br>
<label>Number of pages:</label>&nbsp;
<input type="text" name ="no_of_pages" value="<?php if(isset($_POST['no_of_pages'])) echo htmlentities($_POST['no_of_pages']);?>"
placeholder="How many pages for your site"><br><br>

<label>Facebook:</label>&nbsp;
<input type="text" name ="facebook" value="<?php if(isset($_POST['facebook'])) echo htmlentities($_POST['facebook']);?>"><br>
<label>Twitter:</label>&nbsp;
<input type="text" name ="twitter" value="<?php if(isset($_POST['twitter'])) echo htmlentities($_POST['twitter']);?>"><br>
<label>Instergram:</label>&nbsp;
<input type="text" name ="instagram" value="<?php if(isset($_POST['instagram'])) echo htmlentities($_POST['instagram']);?>"><br>
<br><br>

<input type="hidden" name="user_id" value="<?php echo "$user_id ";?>">
<input type="submit" name="btn-upload" value="Save and continue">
<input type="submit" name="save" value="Save and Exit">
</form>
<script type="text/javascript" src="js/upload_status.js"></script>
 <?php if(isset($_GET['success'])){ ?>
<label>File Uploaded Successfully...<a href="view.php">click here to view file.</a></label>
<?php }
else if(isset($_GET['fail'])){ ?>

<label>Problem While File Uploading !</label>
<?php } ?>

</body>
</html>