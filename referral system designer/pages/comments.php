<?php
error_reporting(E_ALL);
require '../designers/init.php';
$general->logged_out_protect();

$m_id = $_GET['m_id'];
$message = $_GET['message'];
$designer_id   = htmlentities($user['id']); // getting the logged in designer id

$display_comments = $chartforum->list_comments($m_id); // function to display all comments related to the message
$chartforum->delete_notifications($m_id,$designer_id); // funtion to update status column to "read"



	if(isset($_POST['submit']))
	{
	$reply          = htmlentities($_POST['reply']);
	$likes          = htmlentities($_POST['likes']);
	//$message_id     = htmlentities($_POST['message_id']);

	$comments = $chartforum->insert_comments($m_id,$designer_id,$reply);
	header('Location: comments.php?m_id='.$m_id.'&message='.$message);

	}


?>

<!DOCTYPE html>
<html>
 <head>
	<title>view | Comments</title>
 </head>
	<body>
		<form method="post" action="">

		<?php echo $message; ?><br><br>

			<?php foreach ($display_comments as $row) { ?>
		<?php if ($row['designer_id'] != 0) { ?>
			<?php echo $row['username']?>&nbsp; :
			
		<?php } elseif  ($row['designer_id'] == 0) { ?>
		 <?php echo 'Admin'?>&nbsp; :
		<?php } ?>
		     <?php echo $row['reply']?> &nbsp;...
             <?php echo $row['likes']?> likes&nbsp;

             <a href="like_comment.php?id=<?php echo $row['id']?>&m_id=<?php echo $row['m_id']?>&message=<?php echo $message?>">like</a>

		     <br>

		<?php }?>

		<li><a href="list_messages.php?m_id=<?php echo $m_id?>">Back</a></li>


			<label>Your Comment</label>
			<textarea id="textarea" name="reply"></textarea>
			<br><br>
			<button type="submit" name="submit" class="btn bg-blue btn-block">comment</button>
		</form>		
   </body>
</html>