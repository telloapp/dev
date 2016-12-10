<?php
$thispage = 'index1';
error_reporting(E_ALL);
require '../core/init.php';

$general->logged_out_protect();
$c_id=$_GET['c_id'];
?>
<!DOCTYPE html>
<html >
<head>
<title>UPLOAD DOCUMENTS...!!</title>

</head>
<body>

<div id="body">
 <form action="upload.php?c_id=<?php echo "$c_id"; ?>" method="post" enctype="multipart/form-data">
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