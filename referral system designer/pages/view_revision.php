<?php
error_reporting(E_ALL);
require '../designers/init.php';

$general->logged_out_protect();
$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.



$id = $_GET['id'];

$revision_projects_details = $projects->revision_projects_details($id);

$project_progress = $projects->project_progress($id);



if (isset($_POST['submit'])) {
$site_link                = htmlentities($_POST['site_link']);

$revision_done = $projects->revision_done($id,$site_link); 
 header('Location:revision1.php');


}




?>

<!doctype html>

<html>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

<body>


 <td> <a href="new_projects.php" class="user-link active" class="btn btn-danger btn-sm">New Projects</a>
<a href="inprogress_project.php" class="btn btn-danger btn-sm">Inprogress</a>

<a href="completed_project.php" class="btn btn-danger btn-sm">Complete</a>
<a href="cancelled_project.php" class="btn btn-danger btn-sm">Cancelled</a>
<a href="approved_project.php" class="btn btn-danger btn-sm">Approved</a>
<a href="client_complaint.php" class="btn btn-danger btn-sm">Clients Complains</a>
<a href="revision.php" class="btn btn-danger btn-sm">Revision</a>
<a href="completed_revision.php" class="btn btn-danger btn-sm">Completed Revision</a>





</td>

<?php foreach ($project_progress as $row) { ?>

<?php $tot_amount=$row['tot_amount'];?>
<?php if (empty($tot_amount)) {?>
<div class="w3-progress-container">
    <div class="w3-progressbar w3-green" style="width:100%">
      <div class="w3-center w3-text-white"> <?php echo "0% Complete";?></div>
    </div>
  </div><br>
<?php } ?>

<?php if (!empty($tot_amount)) {?>
	
<div class="w3-progress-container">
    <div class="w3-progressbar w3-green" style="width:100%">
      <div class="w3-center w3-text-white"> <?php echo $tot_amount; ?><?php echo "% Complete";?></div>
    </div>
  </div><br>
  <?php } ?>

<?php }?>


                <h3 class="page-title">Revision Project Information</h3>                
                  <hr>
                             <div class="col-xs-12 noo-col">
                           
                              <?php foreach ($revision_projects_details as $row) { ?>
                               <div class="property-wrap">
								      		
								      Site Name    : 
								        <a title="<?php echo $row['site_name']; ?>"><?php echo $row['site_name']; ?></a>
								      
								      <div class="property-labels"></div>
								      
								      <div class="property-summary">
				                        <div class="property-detail">
				                            <div class="">
				                              Website Type:  <?php echo $row['website_type']; ?>				                            
				                            <div class="">
				                             Revision Data :  <?php echo $row['revision_data']; ?>
				                            </div>
				                            <div class="">
				                              Start Date:  <?php echo $row['start_date']; ?>				                            
				                            <div class="">
				                             End Date :  <?php echo $row['end_date']; ?>
				                            </div>


				                          </div>
				                          
									     </div>
									    </div>
                      
                <form method="post" action="" >

                 <td> Site link<input  type="text"  name="site_link" /><br>
                <td><input id="submit" type="submit" class="btn btn-lg rounded metro btn-warning" name="submit" value="Done" />
 


                 </form>


                              </td>
              
                              </tr>
                              <?php } ?>                              
                            </table>
                             <hr>
                            

                </div>
                  



</body>
  <script type="text/javascript" src="script.js"></script>

</html>