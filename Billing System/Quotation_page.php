<?php 
error_reporting(E_ALL);

require '../core/init.php';

$p_category = $property->p_category();
if (isset($_POST['search'])) {
            
          $country        = htmlentities($_POST['country']);
          $province       = htmlentities($_POST['province']);
          $city           = htmlentities($_POST['city']);
          $categories     = htmlentities($_POST['categories']);
          $status         = htmlentities($_POST['status']);
          $seller_type    = htmlentities($_POST['seller_type']);
          $bedrooms       = htmlentities($_POST['bedrooms']);
          $bathrooms      = htmlentities($_POST['bathrooms']);
          
          $all_pro = $property->basic_search_teb11($country,$province, $city,$categories,$status,$seller_type, $bedrooms,$bathrooms);
                                   
      }  
        
?>
<!doctype html>
<html lang="en">

<head>
<?php include 'includes/head.php'; ?>


</head>

<body class="page-right-sidebar">
  <!-- START SITE -->
  <div class="site">
    <!-- START HEADER -->
    <header class="noo-header">
      <?php include 'includes/public_nav.php'; ?>
    </header>
    <!-- END HEADER -->

    <!-- START NOO WRAPPER -->
    <div class="noo-wrapper">
      <!-- START NOO MAINBODY -->
      <div class="container noo-mainbody">
        <div class="noo-mainbody-inner">
          <div class="row clearfix">
            <!-- START MAIN CONTENT -->
            <div class="noo-content col-xs-12 col-md-8">
              <div class="recent-properties">
                <div class="properties list">
                  <!-- START PROPERTIES HEADER -->
                  <br><br>
                  <div class="properties-header">
                    
                    <div class="properties-toolbar">
                    <?php if (!empty($all_pro)){ ?>
                      <a href='property_categories.php' class='btn btn-warning btn-xs' style="color: #fff;">Back</a>
                    <?php } ?>
                      <!--a href="grid-with-sidebar.html" data-toggle="tooltip" data-placement="bottom" title="Grid"><i class="fa fa-th-large"></i></a>
                      <a class="selected" href="list-with-sidebar.html" data-toggle="tooltip" data-placement="bottom" title="List"><i class="fa fa-list"></i></a>
                      <form class="properties-ordering" method="get">
                        <div class="properties-ordering-label">Sorted by</div>
                        <div class="form-group properties-ordering-select">
                          <div class="label-select">
                            <select class="form-control">
                              <option>Date</option>
                              <option>Bath</option>
                              <option>Bed</option>
                              <option>Area</option>
                              <option>Name</option>
                            </select>
                          </div>
                        </div>
                      </form-->
                    </div>
                  </div>
                  <!-- END PROPERTIES HEADER -->

                  <!-- START PROPERTIES CONTENT -->
                  <div class="properties-content">
                  <?php if (empty($all_pro)) {
                   
                    echo "<p>No businesses here yet, but we're working on it!</p>";
                    echo "<a href='categories.php' class='btn btn-warning btn-md'>Back</a>";

                  }else{

                  foreach ($all_pro as $biz) { ?>
                    <article class="hentry">
                      <div class="property-featured">
                        <!--span class="featured"><i class="fa fa-star"></i></span-->
                      <a class="content-thumb" href="view_property.php">
                        <?php if($biz['image'] == "") { ?> 
                        <img src="images/property/property1.jpg" alt="">
                        <?php }else{ ?>
                        <img src="../images/<?php echo $biz['image']; ?>" alt="">
                        <?php } ?>
                      </a>
                        <!--span class="property-label">Hot</span-->
                      <span class="property-category"><a href="#"><?php echo $biz['categories']; ?></a>
                      </div>
                      <div class="property-wrap">
                        <h2 class="property-title">
                        <a href="list_property.php" title="<?php echo $biz['name']; ?>"><?php echo $biz['name']; ?></a>
                        </h2>
                        <div class="property-excerpt">
                          <p><?php echo $biz['full_d']; ?></p>
                          <!--p class="property-fullwidth-excerpt">This 4 bedroom home sits on an oversized lot at the end of a cul-de-sac in an established neighborhood. It is in need of work...</p-->
                        </div>
                        <div class="property-summary">
                          <div class="property-detail">
                            <div class="size">
                              <span><?php echo $biz['suburb']; ?></span>
                            </div>
                            <div class="bathrooms">
                              <span><?php echo $biz['bathrooms']; ?></span>
                            </div>
                            <div class="bedrooms">
                              <span><?php echo $biz['bedrooms']; ?></span>
                            </div>
                          </div>
                          <div class="property-info">
                            <div class="property-price">
                              <span>
                                <span class="amount">R <?php echo $biz['price']; ?></span>
                              </span>
                            </div>
                            <div class="property-action">
                              <a href="view_pro1.php?p_id=<?php echo $biz['p_id']; ?>&p_category=<?php echo $cat_name; ?>">More Details</a>
                            </div>
                          </div>
                          <div class="property-info property-fullwidth-info">
                            <div class="property-price">
                              <span><span class="amount">R <?php echo $biz['price']; ?></span> </span>
                            </div>
                            <div class="size"><span><?php echo $biz['categories']; ?></span></div>
                            <div class="bathrooms"><span><?php echo $biz['bathrooms']; ?></span></div>
                            <div class="bedrooms"><span><?php echo $biz['bedrooms']; ?></span></div>
                          </div>
                        </div>
                      </div>
                      <div class="property-action property-fullwidth-action">
                        <a href="view_pro1.php?p_id=<?php echo $biz['p_id']; ?>&p_category=<?php echo $cat_name; ?>">More Details</a>
                      </div>
                    </article>

                  <?php } } ?>

                    <div class="clearfix"></div>

                    <!-- START PAGINATION NAVIGATION -->
                    <!--nav class="pagination-nav">
                      <ul class="pagination list-center">
                        <li><a class="prev page-numbers" href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li><span class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="#">2</a></li>
                        <li><span class="page-dots"><i class="fa fa-ellipsis-h"></i></span></li>
                        <li><a class="page-numbers" href="#">7</a></li>
                        <li><a class="page-numbers" href="#">8</a></li>
                        <li><a class="next page-numbers" href="#"><i class="fa fa-angle-right"></i></a></li>
                      </ul>
                    </nav-->
                    <!-- END PAGINATION NAVIGATION -->
                  </div>
                  <!-- END PROPERTIES CONTENT -->
                </div>
              </div>                              
            </div>        
            <!-- END MAIN CONTENT -->

            <!-- START SIDEBAR -->
            <div class="noo-sidebar noo-sidebar-right col-xs-12 col-md-4">
              <div class="noo-sidebar-inner">
                <!-- START FIND PROPERTY -->
                <div class="block-sidebar find-property">

                  
                  <!--div class="gsearch">
                    <div class="gsearch-wrap">
                      <form class="gsearchform" method="get" role="search">
                        <div class="gsearch-content">
                          <div class="gsearch-field">
                            <div class="form-group glocation">
                              <div class="label-select">
                                <select class="form-control">
                                  <option>All Locations</option>
                                  <option>New Jersey</option>
                                  <option>New York</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group gsub-location">
                              <div class="label-select">
                                <select class="form-control">
                                  <option>All Sub-locations</option>
                                  <option>Central New York</option>
                                  <option>GreenVille</option>
                                  <option>Long Island</option>
                                  <option>New York City</option>
                                  <option>West Side</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group gstatus">
                              <div class="label-select">
                                <select class="form-control">
                                <option>All Status</option>
                                <option>Open house</option>
                                <option>Rent</option>
                                <option>Sale</option>
                                <option>Sold</option>
                              </select>
                              </div>
                            </div>

                            <div class="form-group gtype">
                              <div class="label-select">
                                <select class="form-control">
                                  <option>All Type </option>
                                  <option>Apartment</option>
                                  <option>Co-op</option>
                                  <option>Condo</option>
                                  <option>Single Family Home</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group gbed">
                              <div class="label-select">
                                <select class="form-control">
                                  <option>No. of Bedrooms</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group gbath">
                              <div class="label-select">
                                <select class="form-control">
                                  <option>No. of Bathrooms</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group gprice">
                              <span class="gprice-label">Price</span>
                              <div class="gslider-range gprice-slider-range"></div>
                              <span class="gslider-range-value gprice-slider-range-value-min"></span>
                              <span class="gslider-range-value gprice-slider-range-value-max"></span>
                            </div>

                            <div class="form-group garea">
                              <span class="garea-label">Area</span>
                              <div class="gslider-range garea-slider-range"></div>
                              <span class="gslider-range-value garea-slider-range-value-min"></span>
                              <span class="gslider-range-value garea-slider-range-value-max"></span>
                            </div>
                          </div>

                          <div class="gsearch-action">
                            <div class="gsubmit">
                              <a class="btn btn-deault" href="#">Search Property</a>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div-->
                </div>
                <!-- END FIND PROPERTY -->

                <!-- START RECENT PROPERTY -->
                <!--div class="block-sidebar recent-property">
                  <h3 class="title-block-sidebar">Recent Property</h3>
                  <div class="featured-property">
                    <ul>
                      <li>
                        <div class="featured-image">
                          <a href="property-details.html"><img src="images/property/property1.jpg" alt=""></a>
                        </div>
                        <div class="featured-decs">
                          <span class="featured-status"><a href="#">For Sale</a></span>
                          <h4 class="featured-title"><a href="property-details.html" title="Visalia, NJ 93277">Visalia, NJ 93277</a></h4>
                        </div>
                      </li>
                      <li>
                        <div class="featured-image">
                          <a href="property-details.html"><img src="images/property/property1.jpg" alt=""></a>
                        </div>
                        <div class="featured-decs">
                          <span class="featured-status"><a href="#">For Sale</a></span>
                          <h4 class="featured-title"><a href="property-details.html" title="Single Family Residential, NJ">Single Family Residential, NJ</a></h4>
                        </div>
                      </li>

                      <li>
                        <div class="featured-image">
                          <a href="property-details.html"><img src="images/property/property1.jpg" alt=""></a>
                        </div>
                        <div class="featured-decs">
                          <span class="featured-status"><a href="#">For Rent</a></span>
                          <h4 class="featured-title"><a href="property-details.html" title="Peter Cooper Village">Peter Cooper Village</a></h4>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div-->
                <!-- END RECENT PROPERTY -->
              </div>
            </div>
            <!-- END SIDEBAR -->

          </div>
        </div>
      </div>
      <!-- END NOO MAINBODY -->
      <div class="push"></div>      
    </div>
    <!-- END NOO WRAPPER -->

<!-- dont show a footer if there is nothing in the category -->
  <?php if (empty($all_pro)) {
    echo "";
    }else{ ?>
    <!-- START FOOTER --> 
    <footer class="footer">
      <?php include 'includes/footer.php'; ?>
    </footer>
    <!-- END FOOTER -->
  <?php } ?>
    
  </div>
  <!-- END SITE -->

  <!-- JQUERY PLUGIN -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
  <script type="text/javascript" src="js/SmoothScroll.js"></script>
  <script type="text/javascript" src="js/jquery.nouislider.all.min.js"></script>
  <script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true&amp;libraries=places'></script>
  <script type="text/javascript" src="js/infobox.js"></script>
  <script type="text/javascript" src="js/markerclusterer.js"></script>

  <!-- THEME SCRIPT -->
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/noo-property-google-map.js"></script>
  <script type="text/javascript" src="js/property.js"></script>
  <script type="text/javascript" src="js/data-nooGmapL10n.js"></script>
  
</body>

</html>
