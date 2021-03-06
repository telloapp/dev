<?php
error_reporting(E_ALL);
require '../designers/init.php';

$general->logged_out_protect();
$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.


$user_id="1";

$id = $_GET['id'];

$cancelled_project_details = $projects->cancelled_projects_details($id) ;
$project_progress = $projects->project_progress($id);

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
<a href="cancelled_project.php?id=<?php echo "$id";?>" class="btn btn-success btn-md pull-right">Go Back</a><br><br> 


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




                <h3 class="page-title">Cancelled Project Information</h3>                
                  <hr>
                             <div class="col-xs-12 noo-col">
                           
                              <?php foreach ($cancelled_project_details as $row) { ?>
                               <div class="property-wrap">
								      
								      Site Name    : 
								        <a title="<?php echo $row['site_name']; ?>"><?php echo $row['site_name']; ?></a>
								      
								      <div class="property-labels"></div>
								      
								      <div class="property-summary">
				                        <div class="property-detail">
				                            <div class="">
				                               Website Type:  <?php echo $row['website_type']; ?>
				                            </div>
				                            <div class="">
				                             No Of Pages :  <?php echo $row['no_of_pages']; ?>
				                            </div>
				                            <div class="">
				                            Designer  Due Date :  <?php echo $row['due_date']; ?>
				                            </div>
				                             <div class="">
				                             Features:  <?php echo $row['features']; ?>
				                            </div>
				                            <div class="">
				                             Extrass :  <?php echo $row['extras']; ?>
				                            </div>
				                            <div class="">
				                             Business Profile :  <?php echo $row['business_profile']; ?>
				                            </div>
				                            <div class="">
				                             Facebook:  <?php echo $row['facebook']; ?>
				                            </div>
				                            <div class="">
				                             Twitter :  <?php echo $row['twitter']; ?>
				                            </div>
				                            <div class="">
				                             Instagram :  <?php echo $row['instagram']; ?>
				                            </div>
				                            <div class="">

				                             Designer Finish Date :  <?php echo $row['finish_date']; ?>
				                            </div>
				                            <div class="">
				                             Designer Price :  <?php echo $row['quote_price']; ?>
				                            </div>                                            
                                           <div class="">
				                             Own Maintenance :  <?php echo $row['own_maintenance']; ?>
				                            </div>
				                            <div class="">
				                             Basic Maintenance Amount :  <?php echo $row['basic_m_amt']; ?>
				                            </div>
				                            <div class="">
				                             Advanced Maintenance Amount :  <?php echo $row['advanced_m_amt']; ?>
				                            </div>
				                            <div class="">

				                             Basic Maintenance Period :  <?php echo $row['basic_m_period']; ?>
				                            </div>
				                            <div class="">
				                             Advanced Maintenance Period :  <?php echo $row['advanced_m_period']; ?>
				                            </div>
				                          </div>
				                          
									     </div>
									    </div>
                      <!--a href="completed_projects_details.php?id=<?php echo $row['id']; ?>" class="btn btn-default btn-xs" ><i class="fa fa-trash">View Details</i></a-->
                              </td>
              
                              </tr>
                              <?php } ?>                              
                            </table>
                             <hr>
                            

                </div>
                  



</body>
  <script type="text/javascript" src="script.js"></script>

</html>