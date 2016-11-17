  <tr>
                                  <th><?php echo $row['site_name'] ?></a></th>
                                  <th><span style="color: #0000FF;"> <a title="handoutt" href="http://www.handoutt.co.za/" target="_blank" style="color: #0000FF;">Handout technologies</a>.</span></th>                               
                                   <th><a href="aprove_site.php?id=<?php echo $row['id'];?>">Aprrove Site</a></th>
                                
                                <th>

                                <?php if ($countrows >= 3) { ?>
                              <a href="clientcomplains.php?id=<?php echo $row['id'];?>" onclick='return confirm("You can only make complins after three revirions")'>Complains</a>    
                                <?php }  elseif ($countrows <= 3 ) { ?>
                              <a href="revision.php?id=<?php echo $row['id'];?>"  onclick='return confirm("Are you sure you want revisions")'>Unhappy</a>
                                <?php }?></a></th>

                               <th><a href="revision_details.php?id=<?php echo $row['id'];?>">View details</a></th>
                              
                                </tr>



                                  <th><span style="color: #0000FF;"> <a title="handoutt" href="http://www.handoutt.co.za/" target="_blank" style="color: #0000FF;">Handout technologies</a>.</span></th>                               
                                   <th><a href="aprove_site.php?id=<?php echo $row['id'];?>">Aprrove Site</a></th>
                                





                         <?php if ($revision_num == "Uncomplete") { ?>

                         <th><?php echo $row['site_name'] ?></a></th>
                        <th><button type="submit" name="" disabled OnClick=" location.href='http://www.handoutt.co.za/' ">dout technologies</button></th>

                        <th><button type="submit" name="" disabled OnClick=" location.href='aprove_site.php?id=<?php echo $row['id'];?>' ">Approve Site</button></th>

                         <th><button type="submit" name="" disabled OnClick=" location.href='revision.php'?id=<?php echo $row['id'];?>' ">Unhappy</button></th>

                         <th><button type="submit" name=""  OnClick=" location.href='revision_details.php?id=<?php echo $row['id'];?>' ">Unhappy</button></th>

                                <?php } else { ?>

                                <?php if ( $row['status'] == "Done") { ?>

                       
                              <?php if ($countrows >= 3) { ?>
                              <a href="clientcomplains.php?id=<?php echo $row['id'];?>" onclick='return confirm("You can only make complins after three revirions")'>Complains</a>    
                                <?php }  elseif ($countrows <= 3 ) { ?>
                              <a href="update_revisions.php?id=<?php echo $row['id'];?>"  onclick='return confirm("Are you sure you want revisions")'>Unhappy</a>
                                <?php }?></a>
                     

                                <?php } else if ($row['status'] == "Not Done") { ?>

                        <button type="submit" name="checklist_completed" disabled OnClick=" location.href='revision.php' ">Unhappy</button></th>
                           <?php  }?>
                              <th><a href="revision_details.php?id=<?php echo $row['id'];?>">View details</a></th>
                              
                                </tr>

                  <?php }?>

                   
                            
                              