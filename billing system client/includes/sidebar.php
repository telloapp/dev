              <div class="noo-sidebar-inner">
                <div class="user-sidebar-menu dashboard-sidebar">
                  <!--div class="user-avatar content-thumb">
                    <img src="images/agent/agent1.jpg" alt="">
                  </div-->
                  <div class="user-menu-links">
                    <!--a href="home.php" class="user-link active"><i class="fa fa-home"></i>Home</a-->  
                    <?php
                    switch ($thispage) 
                    {
                    case 'home':
                        echo '<a href="home.php" class="user-link active"><i class="fa fa-user"></i>Home</a>';
                        echo '<a href="myprofile.php" class="user-link "><i class="fa fa-user"></i>My Profile</a>';
                        echo '<a href="view_clicks.php" class="user-link "><i class="fa fa-user"></i>My Reports</a>';
                      
                        break;
                    

                    }
                    ?>  
                    
                                                      
                    <!--a href="#" class="user-link "><i class="fa fa-home"></i>My Properties</a-->
                  </div>
                  <div class="user-menu-links user-menu-logout">
                    <a href="logout.php" class="user-link " title="Logout"><i class="fa fa-sign-out"></i>Log Out</a>
                  </div>
                </div>            
              </div>