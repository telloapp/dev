<?php
error_reporting(E_ALL);
require '../../core_admin/init.php';

$general->logged_out_protect();
$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.



 $completed_revision_projects = $projects->completed_revision_projects();
?>

<!doctype html>

<html>
<body>


<h1> List Of Completed Revision Projects </h1>
<td> <a href="admin_new_projects.php" class="user-link active" class="btn btn-danger btn-sm">New Projects</a> 
<a href="admin_inprogress_project.php" class="btn btn-danger btn-sm">Inprogress</a>

<a href="admin_completed_project.php" class="btn btn-danger btn-sm">Complete</a>
<a href="admin_cancelled_project.php" class="btn btn-danger btn-sm">Cancelled</a>
<a href="admin_approved_project.php" class="btn btn-danger btn-sm">Approved</a>
<a href="admin_client_complaint.php" class="btn btn-danger btn-sm">Clients Complains</a>
<a href="admin_revision.php" class="btn btn-danger btn-sm">Revision</a>
<a href="admin_completed_revision.php" class="btn btn-danger btn-sm">Completed Revision</a>


<br><br>





                <h3 class="page-title">Completed Revision Project Information</h3>                
                  <hr>
                             <div class="col-xs-12 noo-col">
                            
                              <?php foreach ($completed_revision_projects as $row) { ?>
                              

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
				                              Revision Number:  <?php echo $row['revision_num']; ?>
				                            </div>
				                           
				                          </div>
				                          
								     </div>
									    </div>

                              </td>
              
                              </tr>
                             <br>                              

                              <?php } ?>
                            </table>
                             <hr>
                              <p><b>Total Number Of Completed Revision Project(s) : <?php echo " "; echo $num_rows = count($completed_revision_projects); ?></b>  </p>
                            

                </div>
                  



</body>
  <script type="text/javascript" src="script.js"></script>

</html>




