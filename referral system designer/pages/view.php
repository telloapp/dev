<?php
$thispage = 'view';
error_reporting(E_ALL);
require './core/init.php';
$u_id = $_GET['u_id'];
$general->logged_out_protect();
$user_id  = htmlentities($user['id']);
$show_all_uploads = $client->all_uploaded_files($user_id);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Your uploaded documents</title>
<!--link rel="stylesheet" href="style.css" type="text/css" /-->
</head>
<body>
<div id="header">
<label>UPLOADED DOCUMENTS</label>
</div>
<div id="body">
 <table width="80%" border="1">
    <tr>
    <th colspan="4">your uploads...<label><a href="index1.php">upload new files...</a></label></th>
    </tr>
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>



<?php 

foreach($show_all_uploads as $key) {?> 
                           <tr> 
              <td><a><?php echo $key['file'] ?></a></td>
              <td><a><?php echo $key['type'] ?></a></td>
              <td><a><?php echo $key['size'] ?></a></td>
              
             <td><a href="uploads/<?php echo $key['file'] ?>" target="_blank">view file</a></td>
                            
  <th>
  
  
   </th>
   </tr>
  
<?php }?>

   
    
</div>
</body>
</html>
