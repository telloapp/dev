<?php
error_reporting(E_ALL);
require '../../core_admin/init.php';

$general->logged_out_protect();
$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.



 $revision_projects = $projects->revision_projects();
?>

<!doctype html>

<html>
<body>


<h1> List Of Revision Projects </h1>
 <td> <a href="admin_new_projects.php" class="user-link active" class="btn btn-danger btn-sm">New Projects</a> 
<a href="admin_inprogress_project.php" class="btn btn-danger btn-sm">Inprogress</a>

<a href="admin_completed_project.php" class="btn btn-danger btn-sm">Complete</a>
<a href="admin_cancelled_project.php" class="btn btn-danger btn-sm">Cancelled</a>
<a href="admin_approved_project.php" class="btn btn-danger btn-sm">Approved</a>
<a href="admin_client_complaint.php" class="btn btn-danger btn-sm">Clients Complains</a>
<a href="admin_revision.php" class="btn btn-danger btn-sm">Revision</a>
<a href="admin_completed_revision.php" class="btn btn-danger btn-sm">Completed Revision</a>





</td>

<br><br>





                <h3 class="page-title">Revision Project Information</h3>                
                  <hr>
                             <div class="col-xs-12 noo-col">
                            
                              <?php foreach ($revision_projects as $row) { ?>
                              

                                     <div class="property-wrap">
								      
								      Site Name    : 
								        <a title="<?php echo $row['site_name']; ?>"><?php echo $row['site_name']; ?></a>
								      
								      <div class="property-labels"></div>
								      
								      <div class="property-summary">
				                        <div class="property-detail">
				                            <div class="">
				                              Website Type:  <?php echo $row['website_type']; ?>
				                            </div>
				                            


				                          </div>
				                          
									     </div>
									    </div>
                      <a href="admin_view_revision.php?rid=<?php echo $row['rid']; ?>" class="btn btn-default btn-xs" ><i class="fa fa-trash">View Revision</i></a>
                              </td>
              
                              </tr>
                              <?php } ?>                              
                            </table>
                             <hr>
                              <p><b>Total Number Of Revision Project(s) : <?php echo " "; echo $num_rows = count($revision_projects); ?></b>  </p>
                            

                </div>
                  



</body>
  <script type="text/javascript" src="script.js"></script>

</html>




