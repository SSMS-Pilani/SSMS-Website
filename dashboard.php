<?php


require "./header.php";

require CLASSES_URL . 'user.php';

if(! isset( $_SESSION['username'] ) ) {

	header('location:' . ROOT_URL . 'login.php');

}

else {

    $user = new User( $_SESSION['username'] , $_SESSION['privilege'] );

}

?>

<div class="navbar navbar-inverse navbar-static-top navbar-custom">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a href="index.php" class="navbar-brand" >SSMS</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo ROOT_URL; ?>index.php">Home</a></li>
                    <li><a href="<?php echo ROOT_URL; ?>about.php">About us</a></li>
                    <li><a href="<?php echo ROOT_URL; ?>contact.php">Contact</a></li>
                    <?php

                          if (! isset($_SESSION["username"])) { ?>

                            <li><a href='<?php echo ROOT_URL; ?>login.php'>Login</a></li>
                    <?php } else { ?>
                            <li><a href='<?php echo ROOT_URL; ?>dashboard.php'><u>Dashboard</u></a></li>
                            <li><a href='<?php echo CORE_URL; ?>handler.php?action=logout'>Logout</a></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>




<script type="text/javascript">

$(document).ready(function(){
	$("#profile_btn").click(function(){
		$("#profile").show();
		$("#mess").hide();
		$("#anc").hide();
		$("#changepwd").hide();
		$("#feedback").hide();
		$("#gen_feedback").hide();
		$("#gen_feedback_report").hide();
		$("#report").hide();
        $("#grubs").hide();

	});
	$("#mess_btn").click(function(){
		$("#profile").hide();
		$("#mess").show();
		$("#anc").hide();
		$("#changepwd").hide();
		$("#feedback").hide();
		$("#gen_feedback").hide();
		$("#gen_feedback_report").hide();
		$("#grubs").hide();
		$("#report").hide();

	});
	$("#anc_btn").click(function(){
		$("#profile").hide();
		$("#mess").hide();
		$("#anc").show();
		$("#changepwd").hide();
		$("#feedback").hide();
		$("#gen_feedback").hide();
		$("#gen_feedback_report").hide();
		$("#grubs").hide();
		$("#report").hide();

	});
	$("#changepwd_btn").click(function(){
		$("#profile").hide();
		$("#mess").hide();
		$("#anc").hide();
		$("#changepwd").show();
		$("#feedback").hide();
		$("#gen_feedback").hide();
		$("#gen_feedback_report").hide();
		$("#grubs").hide();
		$("#grubs").hide();
		$("#report").hide();


	});

	$("#feedback_btn").click(function(){
		$("#profile").hide();
		$("#mess").hide();
		$("#anc").hide();
		$("#changepwd").hide();
		$("#feedback").show();
		$("#gen_feedback").hide();
		$("#gen_feedback_report").hide();
		$("#grubs").hide();
		$("#report").hide();
	});

	$("#gen_feedback_btn").click(function(){
		$("#profile").hide();
		$("#mess").hide();
		$("#anc").hide();
		$("#changepwd").hide();
		$("#feedback").hide();
		$("#gen_feedback").show();
		$("#gen_feedback_report").hide();
		$("#grubs").hide();
		$("#report").hide();
	});

	$("#gen_feedback_report_btn").click(function(){
		$("#profile").hide();
		$("#mess").hide();
		$("#anc").hide();
		$("#changepwd").hide();
		$("#feedback").hide();
		$("#gen_feedback").hide();
		$("#gen_feedback_report").show();
		$("#grubs").hide();
		$("#report").hide();
	});

	$("#grubs_btn").click(function(){
		$("#profile").hide();
		$("#mess").hide();
		$("#anc").hide();
		$("#changepwd").hide();
		$("#feedback").hide();
		$("#gen_feedback").hide();
		$("#gen_feedback_report").hide();
		$("#grubs").show();
		$("#report").hide();
	});

	$("#report_btn").click(function(){
		$("#profile").hide();
		$("#mess").hide();
		$("#anc").hide();
		$("#changepwd").hide();
		$("#feedback").hide();
		$("#gen_feedback").hide();
		$("#gen_feedback_report").hide();
		$("#report").show();
	});

    $("#changepwd_btn").click(function(){
        $("#profile").show();
        $("#mess").hide();
        $("#anc").hide();
        $("#changepwd").show();
        $("#feedback").hide();
        $("#gen_feedback").hide();
        $("#gen_feedback_report").hide();
        $("#report").hide();
    });
});

	</script>


        <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9" style="">
            	<h1>Dashboard</h1>
            	<br>
            	<?php if(isset($_GET['error']) && isset($_SESSION['date_already']) && $_GET['error'] == 3) {
            		echo "<h4 style='color:red'>You have already recorded the Feedback for meal " . $_SESSION['meal_already'] . " of " . $_SESSION['date_already'] . "!</h4>";
            		unset($_SESSION['date_already']);
            		unset($_SESSION['meal_already']);
            		} ?>

                <?php if(isset($_GET['error']) && isset($_SESSION['gen_feedback_done']) && $_SESSION['gen_feedback_done'] == 1 && $_GET['error'] == 6) {
                    echo "<h4 style='color:green'>Congrats! You have successfully recorded the Feedback !</h4>";
                    unset($_SESSION['gen_feedback_done']);
                    } ?>

                <?php if(isset($_GET['error']) && isset($_SESSION['gen_feedback_done']) && $_SESSION['gen_feedback_done'] == 0 && $_GET['error'] == 6) {
                    echo "<h4 style='color:red'>Error! Your Feedback was not recorded ! Try again or Contact the Tech Team!</h4>";
                    unset($_SESSION['gen_feedback_done']);
                    } ?>

            	<?php if(isset($_GET['error']) && isset($_SESSION['date_done']) && $_GET['error'] == 'feedback_done') {
            		echo "<h4 style='color:green'>Congrats! You have successfully recorded the Feedback for meal " . $_SESSION['meal_done'] . " of " . $_SESSION['date_done'] . "!</h4>";
            		unset($_SESSION['date_done']);
            		unset($_SESSION['meal_done']);
            		} ?>
                <?php if ($user->privilege == 0 ) { ?>
            	<h3> Welcome, <?php echo $user->name; ?></h3> <br>

            	<div id="profile" style="display:block">

                <?php $user->get_user_profile(); ?>
				<?php if ( $user->privilege != 0 ) :  ?>
                <button id="changepwd_btn" class="btn btn-primary">Change your Password</button>
				<?php endif ?>
                <br><br>
                <div class="panel panel-info" id="changepwd" style="display:none;width:70%" >

                    <div class="panel-heading">
                        <div class="panel-title">Change Password</div>
                    </div>

                    <div style="padding-top:20px" class="panel-body" >

                        <div style="display:none" id="pwd-alert" class="alert alert-danger col-sm-12"></div>
                        <script type="text/javascript">
                          function A(){
                                var str = document.location.toString();
                                if(str.search("error=1") != -1){
                                  document.getElementById("pwd-alert").style.display = "block";
                                  document.getElementById("pwd-alert").innerHTML = "Error : Please Try again!";

                                }
                                if(str.search("error=done") != -1){
                                  document.getElementById("pwd-alert").style.display = "block";
                                  document.getElementById("pwd-alert").style.color = "green";
                                  document.getElementById("pwd-alert").innerHTML = "Password changed! Use the new Password from next Login";
                                  document.getElementById("changepwd").style.display = "block";
                                }
                          }
                          A();

                        </script>

                        <form id="loginform" class="form-horizontal" method="POST" action="<?php echo CORE_URL; ?>handler.php?action=changepwd">


                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon">&emsp;Old Password</span>
                                        <input id="oldpasswd" type="password" class="form-control" name="oldpasswd" value="" placeholder="Old Password">
                            </div>

                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon">&nbsp;New Password</span>
                                        <input id="newpasswd" type="password" class="form-control" name="newpasswd" value="" placeholder="New Password">
                            </div>

                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon">&nbsp;Re - Password</span>
                                        <input id="repasswd" type="password" class="form-control" name="repasswd" value="" placeholder="Repeat Password">
                            </div>

                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                      <div class="col-sm-12 controls">
                                        <input type="submit" id="btn-login" class="btn btn-primary" style="width:120px"/>
                                      </div>
                            </div>
                            </form>



                        </div>
                    </div>

				</div>
				<?php } else { ?>

				<h3>Welcome, <?php echo $_SESSION['username']; ?></h3><br>

            	<div id="profile" style="display:block">

				<br><br>
				<button id="changepwd_btn" class="btn btn-primary">Change your Password</button>
				<br><br>

				<div class="panel panel-info" id="changepwd" style="display:none;width:70%" >

                    <div class="panel-heading">
                        <div class="panel-title">Change Password</div>
                    </div>

                    <div style="padding-top:20px" class="panel-body" >

                        <div style="display:none" id="pwd-alert" class="alert alert-danger col-sm-12"></div>
                        <script type="text/javascript">
                          function A(){
                                var str = document.location.toString();
                                if(str.search("error=1") != -1){
                                  document.getElementById("pwd-alert").style.display = "block";
                                  document.getElementById("pwd-alert").innerHTML = "Error : Please Try again!";
                                }
                                if(str.search("error=done") != -1){
                                  document.getElementById("pwd-alert").style.display = "block";
                                  document.getElementById("pwd-alert").style.color = "green";
                                  document.getElementById("pwd-alert").innerHTML = "Password changed! Use the new Password from next Login";
                                }
                          }
                          A();

                        </script>

                        <form id="loginform" class="form-horizontal" method="POST" action="<?php echo CORE_URL; ?>handler.php?action=changepwd">


                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon">&emsp;Old Password</span>
                                        <input id="oldpasswd" type="password" class="form-control" name="oldpasswd" value="" placeholder="Old Password">
                            </div>

                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon">&nbsp;New Password</span>
                                        <input id="newpasswd" type="password" class="form-control" name="newpasswd" value="" placeholder="New Password">
                            </div>

                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon">&nbsp;Re - Password</span>
                                        <input id="repasswd" type="password" class="form-control" name="repasswd" value="" placeholder="Repeat Password">
                            </div>

                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                      <div class="col-sm-12 controls">
                                        <input type="submit" id="btn-login" class="btn btn-primary" style="width:120px"/>
                                      </div>
                            </div>
                            </form>



                        </div>
                    </div>

            	</div>
            	<?php } ?>
            	<div id="mess" style="display:none">

            	<?php  echo "<h4> Mess Name : " . $user->mess . " </h4>"; $user->get_mess_data();?>

				</div>

                <div id="grubs" style="display:none">

                <?php $user->get_grubs_signed();?>

                </div>
            	<div id="anc" style="display:none">
               	<h4> All Night Canteen Details</h4>
            	<?php $user->get_anc_data();?>

            	</div>
            	<div id="changepwd" style="display:none">


            	</div>

            	<div id="report" style="display:none">
            		<div class="panel panel-info" style="width:80%" >
                    	<div class="panel-heading">
                        	<div class="panel-title">Menu Feedback Report<br></div>

                    	</div>

                    <div style="padding-top:20px" class="panel-body">

                        <form id="feedbackreport" class="form-horizontal" method="POST" action="<?php echo ADMIN_URL; ?>report_generation.php">
                            <link rel="stylesheet" type="text/css" href="<?php echo INCLUDES_URL; ?>css/jquery.datepick.css">
							<script type="text/javascript" src="<?php echo INCLUDES_URL; ?>js/jquery.plugin.js"></script>
							<script type="text/javascript" src="<?php echo INCLUDES_URL; ?>js/jquery.datepick.js"></script>
							<script type="text/javascript">
								$(function() {
									$('#date_report').datepick({dateFormat: 'yyyy-mm-dd',maxDate: <?php echo "'" . date('Y-m-d') . "'"; ?> });
								});
							</script>


                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon">&emsp;Select Date for Feedback Report</span>
                                        <input id="date_report" type="text" class="form-control" name="date_report" required>
                            </div>

                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                      <div class="col-sm-12 controls">
                                        <input type="submit" id="btn-login" class="btn btn-primary" style="width:120px"/>
                                      </div>
                            </div>
                        </form>



                        </div>
                    </div>


            	</div>

                <div id="gen_feedback_report" style="display:none">
                    <div class="panel panel-info" style="width:80%" >
                        <div class="panel-heading">
                            <div class="panel-title">General Feedback Report<br></div>

                        </div>

                    <div style="padding-top:20px" class="panel-body">

                        <form id="feedbackreport" class="form-horizontal" method="POST" action="<?php echo CORE_URL; ?>handler.php?action=gen_feedback_report">
                            <link rel="stylesheet" type="text/css" href="<?php echo INCLUDES_URL; ?>css/jquery.datepick.css">
                            <script type="text/javascript" src="<?php echo INCLUDES_URL; ?>js/jquery.plugin.js"></script>
                            <script type="text/javascript" src="<?php echo INCLUDES_URL; ?>js/jquery.datepick.js"></script>
                            <script type="text/javascript">
                                $(function() {
                                    $('#month_gen_report').datepick({dateFormat: 'yyyy-mm',maxDate: <?php echo "'" . date('Y-m') . "'"; ?> });
                                });
                            </script>


                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon">&emsp;Select Month for Feedback Report</span>
                                        <input id="month_gen_report" type="text" class="form-control" name="month_gen_report" required>
                            </div>

                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                      <div class="col-sm-12 controls">
                                        <input type="submit" id="btn-login" class="btn btn-primary" style="width:120px"/>
                                      </div>
                            </div>
                        </form>



                        </div>
                    </div>


                </div>

                <div id="feedback" style="display:none">
                    <div class="panel panel-info" style="width:80%" id="feedback_panel">
                        <div class="panel-heading">
                            <div class="panel-title">Feedback<br></div>

                        </div>

                    <div style="padding-top:20px" class="panel-body">

                        <div style="display:none" id="pwd-alert" class="alert alert-danger col-sm-12"></div>
                        <script type="text/javascript">

                          function ASD(){
                          var str = document.location.toString();
                            if(str.search("error=1") != -1){
                              document.getElementById("pwd-alert").style.display = "block";
                              document.getElementById("pwd-alert").innerHTML = "Error : Please Try again!";
                            }
                            if(str.search("error=done") != -1){
                              document.getElementById("pwd-alert").style.display = "block";
                              document.getElementById("pwd-alert").style.color = "green";
                              // document.getElementById("pwd-alert").innerHTML = "Password changed! Use the new Password from next Login";
                            }
                          }

                          ASD();

                        </script>

                        <form id="feedbackform" class="form-horizontal" method="POST" action="#">
                            <link rel="stylesheet" type="text/css" href="<?php echo INCLUDES_URL; ?>css/jquery.datepick.css">
                            <script type="text/javascript" src="<?php echo INCLUDES_URL; ?>js/jquery.plugin.js"></script>
                            <script type="text/javascript" src="<?php echo INCLUDES_URL; ?>js/jquery.datepick.js"></script>
                            <script type="text/javascript">
                                $(function() {
                                    $('#date').datepick({dateFormat: 'yyyy-mm-dd',maxDate: <?php echo "'" . date('Y-m-d') . "'"; ?>, minDate: <?php echo "'" . date('Y-m-d', strtotime(date('Y-m-d') . ' - 2 days')) . "'"; ?>});
                                    <?php if (isset($_POST['btn-feedback'])) { ?>
                                        $('#feedback_btn').click();
                                        $('#feedback_panel').hide();

                                    <?php } ?>
                                          });
                            </script>


                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon">&emsp;Select Date for Feedback</span>
                                        <input id="date" type="text" class="form-control" name="date"  required>

                            </div>
                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon">&emsp;Select Meal</span>
                                        <select id="meal" class="form-control" name="meal">
                                            <option value="1">Breakfast</option>
                                            <option value="2">Lunch</option>
                                            <option value="3">Dinner</option>
                                        </select>
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                      <div class="col-sm-12 controls">
                                        <input type="submit" id="btn-feedback" name="btn-feedback" class="btn btn-primary" style="width:120px" value="Next"/>
                                      </div>
                            </div>
                            </form>
                        </div>
                    </div>

                    <?php require CORE_URL . 'menu_feedback.php'; ?>


                </div>


            	<div id="gen_feedback" style="display:none">
            		<div class="panel panel-info" style="width:80%" >
                    	<div class="panel-heading">
                        	<div class="panel-title">General Feedback<br></div>

                    	</div>

                    <div style="padding-top:20px" class="panel-body">

                        <div style="display:none" id="pwd-alert" class="alert alert-danger col-sm-12"></div>
                        <script type="text/javascript">

                          function ASD_gen_feedback(){
                          var str = document.location.toString();
                            if(str.search("error=1") != -1){
                              document.getElementById("pwd-alert").style.display = "block";
                              document.getElementById("pwd-alert").innerHTML = "Error : Please Try again!";
                            }
                            if(str.search("error=done") != -1){
                              document.getElementById("pwd-alert").style.display = "block";
                              document.getElementById("pwd-alert").style.color = "green";
                              document.getElementById("pwd-alert").innerHTML = "Congrats! Your Feedback has been recorded";
                              // document.getElementById("pwd-alert").innerHTML = "Password changed! Use the new Password from next Login";
                            }
                          }

                          ASD();

                        </script>

                        <form id="feedbackform_gen" class="form-horizontal" method="POST" action="<?php echo CORE_URL; ?>handler.php?action=gen_feedback">
                            <link rel="stylesheet" type="text/css" href="<?php echo INCLUDES_URL; ?>css/jquery.datepick.css">
							<script type="text/javascript" src="<?php echo INCLUDES_URL; ?>js/jquery.plugin.js"></script>
							<script type="text/javascript" src="<?php echo INCLUDES_URL; ?>js/jquery.datepick.js"></script>

                            <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon">&emsp;Comments (150 words)</span>
                                        <textarea id="comments" type="text" class="form-control" name="comments" rows="6" cols="58" required></textarea>
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                  <div class="col-sm-12 controls">
                                    <center><input type="submit" id="btn-login" class="btn btn-primary" style="width:150px"/></center>
                                  </div>
                            </div>
                            </form>



                        </div>
                    </div>


            	</div>

            	 <?php  ?>
            </div>
            <div class="col-md-2">
            	<center>
            	<h3>Quick Links</h3>
            	<h4><a href="#" id="profile_btn">Profile</a></h4><br>
            	<?php if (isset($_SESSION['privilege']) && $_SESSION['privilege'] == 0) { ?>
            	<h4><a href="#" id="mess_btn">Mess Extras</a></h4><br>
            	<h4><a href="#" id="anc_btn">ANC Extras</a></h4><br>
            	<h4><a href="#" id="feedback_btn">Menu Feedback</a></h4><br>
                <h4><a href="#" id="gen_feedback_btn">General Feedback</a></h4><br>
                <h4><a href="#" id="grubs_btn">Grub Portal</a></h4><br>
            	<?php } ?>
            	<?php if (isset($_SESSION['privilege']) && $_SESSION['privilege'] == 1) { ?>
            	<h4><a href="<?php echo ADMIN_URL; ?>upload_data_admin.php">Upload Mess Data</a></h4><br>
                <h4><a href="<?php echo ADMIN_URL; ?>menu_uploader.php">Upload MENU</a></h4><br>
            	<h4><a href="#" id="report_btn">Feedback Reports</a></h4><br>
                <h4><a href="#" id="gen_feedback_report_btn">General Feedback Report</a></h4><br>
            	<h4><a href="<?php echo WP_URL; ?>wp-admin/edit.php">Add/Edit Post</a></h4><br>
            	<?php } ?>
            	<?php if (isset($_SESSION['privilege']) && $_SESSION['privilege'] == 2) { ?>
            	<h4><a href="<?php echo ADMIN_URL; ?>upload_data_admin.php">Upload Mess Data</a></h4><br>
            	<h4><a href="<?php echo ADMIN_URL; ?>menu_uploader.php">Upload MENU</a></h4><br>
            	<h4><a href="#" id="report_btn">Menu Feedback Report</a></h4><br>
                <h4><a href="#" id="gen_feedback_report_btn">General Feedback Report</a></h4><br>
            	<h4><a href="<?php echo WP_URL; ?>wp-admin/edit.php">Add/Edit News Post</a></h4><br>
            	<?php } ?>
                <?php if (isset($_SESSION['privilege']) && $_SESSION['privilege'] == 3) { ?>
                <h4><a href="#" id="grubs_btn">Grub Portal</a></h4><br>
                <?php } ?>
            	</center>
            </div>
        </div>
