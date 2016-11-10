<?php 
require '../core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

$id = $_GET['id'];

$draftObj=$client->viewSelectedDraft($id);
$features = $client->list_features();

if (isset($_POST['submit'])) {

$status = "sent";
$origin = "tello";
$website_type = htmlentities($_POST['website_type']);
$site_name = htmlentities($_POST['site_name']);
$due_date  = htmlentities($_POST['due_date']);
$no_of_pages  = htmlentities($_POST['no_of_pages']);
$facebook  = htmlentities($_POST['facebook']);
$twitter  = htmlentities($_POST['twitter']);
$instagram  = htmlentities($_POST['instagram']);

$client->update_send_draft($id,$user_id,$website_type,$status,$origin,$site_name,$due_date,$no_of_pages,$facebook,$twitter,$instagram);
$id = mysql_insert_id();

}
elseif(isset($_POST['save'])) {
	
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

$client->update_n_save_outbox($id,$user_id,$site_type,$status,$origin,$site_name,$due_date,$no_of_pages,$features,$facebook,$twitter,$instagram);
header('location:drafts.php');
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
<h3>Edit your saved request</h3>
<br>
<form action="" method="POST">
<?php foreach ($draftObj as $key) {?>


<label>Choose website type</label>&nbsp;
 <select id="website_type" name="website_type"required="required">
 <option value="<?php echo $key['website_type'];?>" selected="selected"><?php echo $key['website_type'];?></option>
<?php include 'includes/website_types.php';?>
</select><br><br>

<label>Website name:</label>&nbsp;
<input type="text" name ="site_name" value="<?php echo $key['site_name'];?>"><br><br>

<label>Due date:</label>&nbsp;
<input type="date" name="due_date" value="<?php echo $key['due_date'];?>"><br><br>
<label>Number of pages:</label>&nbsp;
<input type="text" name ="no_of_pages" value="<?php echo $key['no_of_pages'];?>" placeholder="How many pages for your site"><br><br>

<label>Facebook:</label>&nbsp;
<input type="text" name ="facebook" value="<?php echo $key['facebook'];?>"><br>
<label>Twitter:</label>&nbsp;
<input type="text" name ="twitter" value="<?php echo $key['twitter'];?>"><br>
<label>Instergram:</label>&nbsp;
<input type="text" name ="instagram" value="<?php echo $key['instagram'];?>"><br>
<br><br>

<label>Upload your business profile:</label>&nbsp;

<input type="hidden" name="user_id" value="<?php echo "$user_id ";?>">
<input type="submit" name="submit" value="Save and continue">
<input type="submit" name="save" value="Save request">

<?php }?>
</form>




</body>
</html>