<?php
require '../designers/init.php';
$general->logged_out_protect();

$designer_id   = htmlentities($user['id']);

if(isset($_POST['submit'])){

//$general->logged_out_protect();
 // storing the user's username after clearning for any html tags.

$message   = htmlentities($_POST['message']);
$category  = htmlentities($_POST['category']);

$insert_message = $chartforum->insert_data($designer_id,$message,$category);
header('Location:list_messages.php');


}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post" action="">

<select name= "category" class="form-control">
    <option> - Select - </option>
    <option value="Design"> Design </option>
    <option value="Business"> Business </option>
    </select>
    <br><br>

<label>Your Query</label>
<textarea id="textarea" name="message" required=""></textarea>
<br><br>
<button type="submit" name="submit" class="btn bg-blue btn-block">send</button>					


</form>
                  
</body>
</html>