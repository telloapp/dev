                <?php 

                $previous = "javascript:history.go(-1)";
                if(isset($_SERVER['HTTP_REFERER'])) {
                  $previous = $_SERVER['HTTP_REFERER'];
                }

                ?>
                <a href="<?php echo $previous; ?>" class="btn btn-md btn-success pull-right">Go Back</a>