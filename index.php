<?php

include 'header.php';
require( WP_URL . 'wp-blog-header.php');

?>

    <!--Fixed navigation bar =======================================================================================-->

   <div class="navbar navbar-inverse navbar-static-top navbar-custom" >
        <div class="container" style="padding-right:0px">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a href="#" class="navbar-brand" >SSMS</a>
            </div>
            <div class="navbar-collapse collapse" id="grad1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo ROOT_URL; ?>index.php"><u>Home</u></a></li>
                    <li><a href="<?php echo ROOT_URL; ?>about.php">About us</a></li>
                    <li><a href="<?php echo ROOT_URL; ?>contact.php">Contact</a></li>
                    <?php

                          if (! isset($_SESSION["username"])) { ?>

                            <li><a href='<?php echo ROOT_URL; ?>login.php'>Login</a></li>
                    <?php } else { ?>
                            <li><a href='<?php echo ROOT_URL; ?>dashboard.php'>Dashboard</a></li>
                            <li><a href='<?php echo CORE_URL; ?>handler.php?action=logout'>Logout</a></li>
                    <?php } ?>

                </ul>
				<ul class="nav navbar-nav navbar-right">
        <li><img src="images/facebook.png" style="width:22px;margin-top:12px;margin-right:10px;"></li>
        <li><img src="images/twitter.png" style="width:22px;margin-top:12px;margin-right:20px;"></li>
				</ul>
            </div>
        </div>
    </div>
    

    <!-- Content ====================================================== =================================================-->
    <div class="container" style="min-height:100%;">
        <div class="row" style="margin-bottom:-10px">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="blog-header" style="">
                <h2 class="blog-title" style="">Society for Student Mess Services</h2>
                <!-- <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p> -->
                </div>
                   
            </div>
            <div class="col-md-1"></div>
        </div>
        <hr /> 
        <div class="row">
            
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <h2>Recent News</h2>
                  <hr style="height:1.5px;border:none;color:#333;background-color:#333;" />
                  <div id="news">
                  <!-- <marquee  behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();"> -->
                    <?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>

                    <?php the_date('','<h3 style="margin-top:-10px;margin-bottom:-10px;font-size:20px;">','</h3>'); ?>

                    <div class="post" id="post-<?php the_ID(); ?>">
                         <h3 class="storytitle"><?php the_title(); ?></h3>
                        <div class="meta"><h4>By &#8212;<?php //_e("Filed under:"); ?> <?php //the_category(',') ?>  <?php the_author() ?> @ <?php the_time() ?> <?php //edit_post_link(__('Edit This')); ?></h4></div>

                        <div class="storycontent">
                           <p>
                            <?php the_content(); ?>
                            </p>
                        </div>

                        <hr style="height:1px;border:none;color:#333;background-color:#333;">
                    </div>

                    <?php endwhile; else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                  <!-- </marquee> -->
                  </div>
            </div>
        <div class="col-md-2">
        </div>
            <div class="col-md-3">

                <center>
                <h3 style="margin-bottom:-10px;">Today's Menu</h3>
                <hr style="width:50%;height:1px;border:none;color:#333;background-color:#333;" >
                <div class="row">

                </div>
              <div class="box-6 top-6" style="margin-top:-20px;">
                    <h4 style="font-size:150%;">Breakfast</h4>
                    <?php
	
						
					
                        $query = "Select * from menu_item where DATE like '"  . date("Y-m-d") . " %' and bld = '1'";
                        // echo $query;
                        $result_breakfast = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result_breakfast)) {
                            # code...

                            echo "<h6 style='font-size:120%;margin-top:-5px;'>" . $row[3] . "</h6>";
                        }

                    ?>

                    <hr style="width:50%;height:1px;border:none;color:#333;background-color:#333;">
                </div>
                <div class="box-6 top-6" style="margin-top:-10px;">
                    <h4 style="font-size:150%;">Lunch</h4>
                    <?php

                        $query = "Select * from menu_item where DATE like '"  . date("Y-m-d") . " %' and bld = '2'";
                        // echo $query;
                        $result_breakfast = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result_breakfast)) {
                            # code...

                            echo "<h6 style='font-size:120%;margin-top:-5px;'>" . $row[3] . "</h6>";
                        }

                    ?>
                    <hr style="width:50%;height:1px;border:none;color:#333;background-color:#333;" >
                </div>
                <div class="box-6 top-6" style="margin-top:-10px;">
                    <h4 style="font-size:150%;">Dinner</h4>
                    <?php

                        $query = "Select * from menu_item where DATE like '"  . date("Y-m-d") . " %' and bld = '3'";
                        // echo $query;
                        $result_breakfast = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result_breakfast)) {
                            # code...

                            echo "<h6 style='margin-top:-5px;font-size:120%;'>" . $row[3] . "</h6>";
                        }

                    ?>
                    <hr style="width:50%;height:2px;border:none;color:#333;background-color:#333;" >
                </div>
                    </center>
            </div>

        </div>
    </div>
    <!-- ==================================== Footer ============================================== -->
<?php 

require_once 'footer.php';

?>
<script src="includes/js/jquery-2.1.1.min.js"></script>
<script src="includes/js/bootstrap.js"></script>
</body>
</html>
