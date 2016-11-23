<?php
require '../core/init.php';
$general->logged_out_protect();

?>
<!DOCTYPE html>
<html >
<head>
<title>UPLOAD DOCUMENTS...!!</title>

</head>
<body>

<div id="body">
 <form action="upload1.php" method="post" >
 <input type="file" name="file" />
 <button type="submit" name="btn-upload">upload</button>
 </form>
    <br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 
 ?>
</div>

</body>
</html>