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
                      case 'view_bizlisting':
                        echo '<a href="view_bizlisting.php" class="user-link active"><i class="fa fa-user"></i>My Business</a>';
                        echo '<a href="view_payments.php" class="user-link "><i class="fa fa-user"></i>My Payments</a>';
                        echo '<a href="view_clicks.php" class="user-link "><i class="fa fa-user"></i>My Reports</a>';
                        echo '<a href="myprofile.php" class="user-link "><i class="fa fa-user"></i>My Profile</a>';
                        break;

                      case 'view_payments':
                       echo '<a href="view_bizlisting.php" class="user-link"><i class="fa fa-user"></i>My Business</a>';
                        echo '<a href="view_payments.php" class="user-link active"><i class="fa fa-user"></i>My Payments</a>';
                        echo '<a href="view_clicks.php" class="user-link "><i class="fa fa-user"></i>My Reports</a>';
                        echo '<a href="myprofile.php" class="user-link "><i class="fa fa-user"></i>My Profile</a>';
                        break;

                        case 'view_clicks':
                          echo '<a href="view_bizlisting.php" class="user-link"><i class="fa fa-user"></i>My Business</a>';
                        echo '<a href="view_payments.php" class="user-link "><i class="fa fa-user"></i>My Payments</a>';
                        echo '<a href="view_clicks.php" class="user-link active"><i class="fa fa-user"></i>My Reports</a>';
                        echo '<a href="myprofile.php" class="user-link "><i class="fa fa-user"></i>My Profile</a>';



                          break;
                          case 'myprofile':
                             echo '<a href="view_bizlisting.php" class="user-link"><i class="fa fa-user"></i>My Business</a>';
                        echo '<a href="view_payments.php" class="user-link "><i class="fa fa-user"></i>My Payments</a>';
                        echo '<a href="view_clicks.php" class="user-link "><i class="fa fa-user"></i>My Reports</a>';
                        echo '<a href="myprofile.php" class="user-link active"><i class="fa fa-user"></i>My Profile</a>';
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