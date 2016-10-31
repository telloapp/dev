<?php 
require '../core/init.php';
$general->logged_out_protect();

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.
$user_id 	= htmlentities($user['id']); // storing the user's username after clearning for any html tags.

if (isset($_POST['submit'])) {

$name 			= htmlentities($_POST['name']);
$email 			= htmlentities($_POST['email']);
$website 		= htmlentities($_POST['website']);
$video_link 	= htmlentities($_POST['video_link']);
$contact 		= htmlentities($_POST['contact']);
$province 		= htmlentities($_POST['province']);
$city 			= htmlentities($_POST['city']);
$surbub 		= htmlentities($_POST['surbub']);
$genre 			= htmlentities($_POST['genre']);
$reference 		= htmlentities($_POST['reference']);
$price 			= htmlentities($_POST['price']);
$listing_type 	= htmlentities($_POST['listing_type']);

$users->insertuserInfo($user_id,$name, $email, $website, $video_link, $contact, $province, $city, $surbub, $genre, $reference, $price, $listing_type);


$file_name=isset($_POST['files']);
$users->addimage($user_id, $file_name);

header('Location:user_panel.php');

}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>


<body>


<br><br><a href="user_panel.php">Back home</a></li>

<form id="paymentFormValid" action="" method="post" enctype="multipart/form-data">

<p> Name <span>*</span>: <input type="text" name="name" required></p>
<p> Email : <span>*</span><input type="email" name="email" required></p>
<p><span>*</span> website : <input type="text" name="website"></p>

<p> contact : <span>*</span><input type="text" name="contact" required></p>
<fieldset>
<legend>Address</legend>
<p> province : <span>*</span><input type="text" name="province" required></p>
<p> city : <span>*</span><input type="text" name="city" required></p>
<p> surbub : <span>*</span><input type="text" name="surbub" required></p>
</fieldset>

<p> genre : <span>*</span><input type="text" name="genre" required></p>
<p> reference : <span>*</span><input type="text" name="reference" required></p>
<p> price : <input type="text" name="price"></p>

<!--<label for="file"><span>Your video :</span></label>
<input type="file" name="file" id="file" /> 
<br />-->

<input type ="hidden" name="MAX_FILE_SIZE" value="5000000">

<p> images : <span>*</span> <input type="file" name="files[]" id="file" multiple required/><br><br>
<p> video link : <span>*</span><input type="text" name="video_link" required></p>

	
<label>Listing type<span>*</span></label>

<select id="listing_type" name="listing_type" required>
<option value="--select type--" selected></option>
<option value="Artist">Artist</option>
<option value="Equipment hire">Equipment hire</option>
<option value="Comedian">Comedian</option>
<option value="MC">MC</option>
</select>

<br>

<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
<input type="submit" name="submit" value="submit" />


																						
</form>
</body>
</html>