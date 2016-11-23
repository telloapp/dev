<?php
error_reporting(E_ALL);
require '../designers/init.php';

$general->logged_out_protect();
$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.



 $client_complains = $projects->client_complains($user_id) ;
?>

<!doctype html>

<html>
<body>


<h1> List Of Complaint Projects </h1>
 <td> <a href="new_projects.php" class="btn btn-danger btn-sm">New Projects</a>
<a href="inprogress_project.php" class="btn btn-danger btn-sm">Inprogress</a>

<a href="completed_project1.php" class="btn btn-danger btn-sm">Complete</a>
<a href="cancelled_project.php" class="btn btn-danger btn-sm">Cancelled</a>
<a href="approved_project.php" class="btn btn-danger btn-sm">Approved</a>
<a href="client_complaint.php" class="btn btn-danger btn-sm">Clients Complains</a>
<a href="revision1.php" class="btn btn-danger btn-sm">Revision</a>
<a href="completed_revision.php" class="btn btn-danger btn-sm">Completed Revision</a>
</td>


<br><br>





                <h3 class="page-title">Project Complaint Information</h3>                
                  <hr>
                             <div class="col-xs-12 noo-col">
                            
                              <?php foreach ($client_complains as $row) { ?>
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
				                             Complaint :  <?php echo $row['complaint']; ?>
				                            </div>
				                            
				                          </div>
				                          
									     </div>
									    </div>

									    <br><br>

                      <!--a href="complete_project_done.php?id=<?php echo $row['id']; ?>" class="btn btn-default btn-xs" onclick='return confirm("Are you sure That This Project is Completed?")'><i class="fa fa-trash">Done</i></a-->
                              </td>
              
                              </tr>
                                                           <hr>

                              <?php } ?>                              
                            </table>
                              <p><b>Total Number Of Complaints Project(s) : <?php echo " "; echo $num_rows = count($client_complains); ?></b>  </p>
                            

                </div>
                  



</body>
  <script type="text/javascript" src="script.js"></script>

</html>