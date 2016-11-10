<?php
error_reporting(E_ALL);
require 'core/init.php';

//$general->logged_out_protect();
//$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.


$user_id="1";

 $approved_project = $projects->approved_project($user_id);
?>

<!doctype html>

<html>
<body>


<h1> List Of Approved Projects </h1>
 <td> <a href="new_projects.php" class="user-link active" class="btn btn-danger btn-sm">New Projects</a>
<a href="inprogress_project.php" class="btn btn-danger btn-sm">Inprogress</a>

<a href="completed_project.php" class="btn btn-danger btn-sm">Complete</a>
<a href="cancelled_project.php" class="btn btn-danger btn-sm">Cancelled</a>
<a href="approved_project.php" class="btn btn-danger btn-sm">Approved</a>
<a href="client_complaint.php" class="btn btn-danger btn-sm">Clients Complains</a>



</td>

<br><br>





                <h3 class="page-title">Project Information</h3>                
                  <hr>
                             <div class="col-xs-12 noo-col">
                            
                              <?php foreach ($approved_project as $row) { ?>
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

				                          </div>
				                          
									     </div>
									    </div>

                      <a href="approved_project_details.php?id=<?php echo $row['id']; ?>" class="btn btn-default btn-xs" ><i class="fa fa-trash">View Details</i></a>
                              </td>
              
                              </tr>
                              <?php } ?>                              
                            </table>
                             <hr>
                              <p><b>Total Number Of Project(s) : <?php echo " "; echo $num_rows = count($approved_project); ?></b>  </p>
                            

                </div>
                  



</body>
  <script type="text/javascript" src="script.js"></script>

</html>