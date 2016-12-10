<?php
error_reporting(E_ALL);
require '../designers/init.php';

$general->logged_out_protect();
$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.


$id=$_GET['id'];


$project_progress = $projects->project_progress($id);


$get_checklist_done = $projects->get_checklist_done($id);

$get_features = $projects->get_features($id);

$get_site_data = $projects-> get_site_data($id); 

$complete_enabled = $projects-> complete_enabled($id);


if (isset($_POST['submit'])) {
$check_id                = htmlentities($_POST['check_id']);

  $checklist_done = $projects->checklist_done($id,$check_id); 
 header('Location:checklist.php?id='.$id);

  }

if (isset($_POST['checklist_completed'])) {
$date= date('Y-m-d');
  $checklist_completed = $projects->checklist_completed($id,$date); 
  $inprogress_project_done = $projects->inprogress_project_done($id);

 header('Location:inprogres_project_details.php?id='.$id);

  }

?>

<!doctype html>

<html>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

<body>


 <td> <a href="new_projects.php" class="user-link active" class="btn btn-danger btn-sm">New Projects</a>
<a href="inprogress_project.php" class="btn btn-danger btn-sm">Inprogress</a>

<a href="completed_project1.php" class="btn btn-danger btn-sm">Complete</a>
<a href="cancelled_project.php" class="btn btn-danger btn-sm">Cancelled</a>
<a href="approved_project.php" class="btn btn-danger btn-sm">Approved</a>
<a href="client_complaint.php" class="btn btn-danger btn-sm">Clients Complains</a>
<a href="revision1.php" class="btn btn-danger btn-sm">Revision</a>

<a href="completed_revision.php" class="btn btn-danger btn-sm">Completed Revision</a>


<br><br>
<a href="inprogress_project.php?id=<?php echo "$id";?>" class="btn btn-success btn-md pull-right">Go Back</a><br><br> 


</td>

<br><br>




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
<br><br>


                <h3 class="page-title">Project Checklist Information</h3>                


          <table style="width:100%">






           <?php foreach ($get_site_data as $row) { ?>

                               <div class="property-wrap">
								      
								      Site Name    : 
								        <a title="<?php echo $row['site_name']; ?>"><?php echo $row['site_name']; ?></a>
								      
								      <div class="property-labels"></div>
								      
								      <div class="property-summary">
				                        <div class="property-detail">
				                            <div class="">
				                              Website Type:  <?php echo $row['website_type']; ?>
                              
				                            </div>



				                    <?php $datetime1 = date_create($row['date']); ?>
								<?php $datetime2 = date_create($row['finish_date']); ?>
								<?php $diff = date_diff($datetime1, $datetime2); ?>
                               
                               
								<?php echo "Timer: "?> <?php echo $website_due_date =$diff->format("Month: %m, days: %d.");?>
                              <br>
				                          </div>
									     </div>
									    </div>
                              </td>
              
                              </tr>
                              <?php } ?>

                              <tr>
                                <th>Feature</th>
                                <th>Done</th> 
                                
                                <!--th>Content Control</th-->


                              </tr>
                  <?php foreach ($get_features as $row) { ?>

                              <tr>
                    <form method="post" action="" >

                 <td><input readonly type="text"  name="checklist" value="<?php echo $row['pages']; ?>" />
                <td><input hidden type="text"  name="check_id" value="<?php echo $row['id']; ?>" />
                   


                   <?php if ($row['c_status']=='Done') {?>


                          <?php echo $row['c_status']; ?>

                   <?php } else if ($row['c_status']=='Not Done') {?>
                <td><input id="submit" type="submit" class="btn btn-lg rounded metro btn-warning" name="submit" value="Done" />

                  <?php } ?>


                 </form>
                  <?php } ?>


                      

                                </td> 
                              </tr>

                              
                            </table>  


                     <?php  if (!empty($complete_enabled) ) {?>

                      <?php foreach ($complete_enabled as $row) { ?>
                      <p><b><?php $num_rows = count($complete_enabled); ?></b>  </p>

                             <?php }?>              

                        <form method="post" action="" >

                        <?php if ($num_rows == "5") { ?>

                        <button type="submit" name="checklist_completed"  OnClick=" location.href='inprogress_project_done.php' ">Site Complet</button>

                      <!--a href="inprogress_project_done.php?site_id=<?php echo $row['site_id']; ?>" class="btn btn-default btn-xs" i class="fa fa-trash">Complete</i></a-->


                                <?php } else if ($num_rows < "5") { ?>

                        <button type="submit" name="checklist_completed" disabled OnClick=" location.href='inprogress_project_done.php' ">Site Complete</button>

                             <!--button type="submit" name="checklist_completed" disabled  OnClick=" location.href='inprogress_project_done.php' ">Site Complete Disabled</button-->

                      <!--a href="inprogress_project_done.php?site_id=<?php echo $row['site_id']; ?>" disabled class="btn btn-default btn-xs" ><i class="fa fa-trash">disabled</i></a-->
                               <?php  }?>
                               </form>

                               <?php }?>




</body>
  <script type="text/javascript" src="script.js"></script>
 
</html>