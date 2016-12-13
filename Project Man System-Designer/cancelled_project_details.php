<?php
error_reporting(E_ALL);
require 'core/init.php';

//$general->logged_out_protect();
//$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.


$user_id="1";

$id = $_GET['id'];

$cancelled_project_details = $projects->cancelled_projects_details($id) ;
?>

<!doctype html>

<html>
<body>


<td> <a href="new_projects.php" class="user-link active" class="btn btn-danger btn-sm">New Projects</a>
<a href="inprogress_project.php" class="btn btn-danger btn-sm">Inprogress</a>

<a href="completed_project.php" class="btn btn-danger btn-sm">Complete</a>
<a href="cancelled_project.php" class="btn btn-danger btn-sm">Cancelled</a>
<a href="approved_project.php" class="btn btn-danger btn-sm">Approved</a>
<a href="client_complaint.php" class="btn btn-danger btn-sm">Clients Complains</a>



</td>

<br><br>





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
				                             Due Date :  <?php echo $row['due_date']; ?>
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