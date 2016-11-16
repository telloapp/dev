<?php
require '../core/init.php';

$general->logged_out_protect();

$designer_id   = htmlentities($user['id']); // logged in designer id

//$m_id  = $_GET['m_id'];

$view_messages = $chartforum->list_messages();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

    <form method="post" action="">

      <?php foreach ($view_messages as $key) { ?>

     <p> <?php echo $key['message']?><br>
     	<li><a href="comments.php?m_id=<?php echo $key['id']?>">comments</a></li><br>
        <li><a href="delete_messages.php?m_id=<?php echo $key['id']; ?>" class="btn btn-default btn-xs" onclick='return confirm("Are you sure you want to delete this Message with its related comments?")'>Delete</a><li>


     </p>

      <?php }?>
    </form>
    <br>
        <li><a href="home.php">back</a></li>

        <li><a href="logout.php">logout</a></li>




</body>
</html>