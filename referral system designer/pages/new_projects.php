<?php
error_reporting(E_ALL);
require '../designers/init.php';

$general->logged_out_protect();
$user_id  = htmlentities($user['id']); // storing the user's username after clearning for any html tags.



 $new_projects = $projects->new_projects($user_id);
?>

<!doctype html>

<html>
<body>

<a href="designer_index.php">go back</a>
<h1> List Of New Projects </h1>
 <td> <a href="new_projects.php" class="user-link active" class="btn btn-danger btn-sm">New Projects</a> 
<a href="inprogress_project.php" class="btn btn-danger btn-sm">Inprogress</a>

<a href="completed_project1.php" class="btn btn-danger btn-sm">Complete</a>
<a href="cancelled_project.php" class="btn btn-danger btn-sm">Cancelled</a>
<a href="approved_project.php" class="btn btn-danger btn-sm">Approved</a>
<a href="client_complaint.php" class="btn btn-danger btn-sm">Clients Complains</a>
<a href="revision.php" class="btn btn-danger btn-sm">Revision</a>
<a href="completed_revision.php" class="btn btn-danger btn-sm">Completed Revision</a>





</td>

<br><br>





                <h3 class="page-title">Project Information</h3>                
                  <hr>
                             <div class="col-xs-12 noo-col">
                            
                              <?php foreach ($new_projects as $row) { ?>
                              

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
				                             Designer Finish Date :  <?php echo $row['finish_date']; ?>
				                            </div>
				                            <div class="">
				                             Designer Price :  <?php echo $row['quote_price']; ?>
				                            </div>


				                          </div>
				                          
									     </div>
									    </div>
                      <a href="new_project_done.php?id=<?php echo $row['id']; ?>" class="btn btn-default btn-xs" onclick='return confirm("Are You Sure You Want To View Project? Once You View This Project It Wil Be Moved To Inprogress Projects")'><i class="fa fa-trash">Seen</i></a>
                              </td>
              <hr>
                              </tr>
                              <?php } ?>                              
                            </table>
                              <p><b>Total Number Of Project(s) : <?php echo " "; echo $num_rows = count($new_projects); ?></b>  </p>
                            

                </div>
                  



</body>
  <script type="text/javascript" src="script.js"></script>

</html>




