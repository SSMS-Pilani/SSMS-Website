<?php

	include './../header.php';

	if(! ( isset($_SESSION['username']) && isset($_SESSION['privilege']) && isset($_POST['date_report']) ) ) {
		header('location:./../login.php');
	}


?>


<html lang="">
<head>
<title>Society for Student Mess Services</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="Nikhil" content=""/>
<script type="text/javascript" href="./../<?php echo INCLUDES_URL ?>js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" href="./../<?php echo INCLUDES_URL ?>js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="./../<?php echo INCLUDES_URL ?>css/style.css" />
<link type="text/css" rel="stylesheet" href="./../<?php echo INCLUDES_URL ?>css/bootstrap.css" />
<link rel="shortcut icon" type="image/png" href="./../<?php echo INCLUDES_URL;?>favicon.png"/>

</head>
<body>
    <!--Fixed navigation bar =======================================================================================-->
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
                <li><a href="./../index.php">Home</a></li>
                <li><a href="./../about.php">About us</a></li>
                <li><a href="./../contact.php">Contact</a></li>
                <li><a href="./../dashboard.php">Dashboard</a></li>
                <li><a href="./../core/handler.php?action=logout"><u>Logout</u></a></li>
            </ul>

        </div>
        </div>
        </div>

    <div class="container">
    	<div class="row">
            <div class="col-md-1"></div>
            <h3>Feedback Report</h3>
            <h4>Ratings are out of 10</h4>
            <h4>Value of Meal : 1 = Breakfast, 2 = Lunch, 3 = Dinner</h4><br>
            	    <?php

				    	$one_item = mysqli_fetch_array(mysqli_query($conn, "Select count(Feedback_ID) from menu_item_feedback where date like '" . $_POST['date_report'] . " %' and bld = 1"));

				    	// echo $one_item[0] . "   " . $query_count[0];

				    	$total_no_of_feedbacks_1 = $one_item[0];

				    	// echo $total_no_of_feedbacks_1;

				    ?>

					<?php

				    	$one_item = mysqli_fetch_array(mysqli_query($conn, "Select count(Feedback_ID) from menu_item_feedback where date like '" . $_POST['date_report'] . " %' and bld = 2"));

				    	// echo $one_item[0] . "   " . $query_count[0];

				    	$total_no_of_feedbacks_2 = $one_item[0];

				    	// echo $total_no_of_feedbacks_2;

				    ?>
				    <!-- &emsp;| &nbsp;No. of Feedbacks (Dinner): &emsp; -->
				    <?php

				    	$one_item = mysqli_fetch_array(mysqli_query($conn,"Select count(Feedback_ID) from menu_item_feedback where date like '" . $_POST['date_report'] . " %' and bld = 3"));

				    	// echo $one_item[0] . "   " . $query_count[0];

				    	$total_no_of_feedbacks_3 = $one_item[0];

				    	// echo $total_no_of_feedbacks_3;

				    ?>


				    </h3>
			<div class="col-md-4" style="">

			<center>
			<h3>No. of Feedbacks (Breakfast): <?php echo $total_no_of_feedbacks_1?> </h3>

				    Date : &emsp;<input type="text" name="date1" id="date1" readOnly="true" value="<?php echo $_POST['date_report']; ?>"><br><br>
				    Meal : &emsp;<input type="text" name="bld1" id="bld1" readOnly="true" value="1"><br><br>
				    <br>
				    <!-- <table style="margin:10px"> -->
				    <?php
				    	if($total_no_of_feedbacks_1 > 0) {
					    	$query = "Select sum(score) from menu_item_feedback where date like '" . $_POST['date_report'] . " %' and bld = 1";
					    	$result = mysqli_fetch_array(mysqli_query($conn, $query ));

					    	echo "<h4><b>Net Score : " . $result[0] . "</b></h4>";
					    }
					    else{
					    	echo "<h4><b>No Feedback recieved yet</b></h4>";
					    }
				    ?>
				    <!-- </table> -->
			</center>
			</div>

			<div class="col-md-4" style="">
			<center>
			<h3>No. of Feedbacks (Lunch): &emsp; <?php echo $total_no_of_feedbacks_2?> </h3>
				    Date: &emsp;<input type="text" name="date2" id="date2" readOnly="true" value="<?php echo $_POST['date_report']; ?>"><br><br>
				    Meal : &emsp;<input type="text" name="bld2" id="bld2" readOnly="true" value="2"><br><br>
				    <br>
				    <?php
				    	if($total_no_of_feedbacks_2 > 0) {
					    	$query = "Select sum(score) from menu_item_feedback where date like '" . $_POST['date_report'] . " %' and bld = 2";
					    	$result = mysqli_fetch_array(mysqli_query($conn, $query));

					    	echo "<h4><b>Net Score : " . $result[0] . "</b></h4>";
					    }
					    else{
					    	echo "<h4><b>No Feedback recieved yet</b></h4>";
					    }
				    ?>
			</center>
			</div>

			<div class="col-md-4" style="">
			<center>
			<h3>No. of Feedbacks (Dinner): &emsp; <?php echo $total_no_of_feedbacks_3?> </h3>
				    Date: &emsp;<input type="text" name="date3" id="date3" readOnly="true" value="<?php echo $_POST['date_report']; ?>"><br><br>
				    Meal : &emsp;<input type="text" name="bld3" id="bld3" readOnly="true" value="3"><br><br>
				    <br>
				    <?php
				    	if( $total_no_of_feedbacks_3 > 0) {
					    	$query = "Select sum(score) from menu_item_feedback where date like '" . $_POST['date_report'] . " %' and bld = 3";
					    	$result = mysqli_fetch_array(mysqli_query($conn, $query));

					    	echo "<h4><b>Net Score : " . $result[0] . "</b></h4>";
					    }
					    else{
					    	echo "<h4><b>No Feedback recieved yet</b></h4>";
					    }
				    ?>


			</center>
			</div>
			</div>
			<div class="row"></div>
			<div class="row">
			<?php
				$query = "SELECT * FROM menu_item_feedback where DATE LIKE '%" . $_POST['date_report'] . "%'";
				$result = mysqli_query($conn,$query);

				$str = "Feedback_ID, Timestamp of the Feedback, Meal, S_ID, Comments,\n";

				while ($arr = mysqli_fetch_array($result))  {
					# code...
					$str = $str . $arr[0] . "," . $arr[1] . "," . $arr[2] . "," . $arr[3] . "," . $arr[4] . ",\n";
				}

				file_put_contents($_POST['date_report'] . ".csv", $str);

				// readfile("temp.s");
			?>

			<center><br><br>
			<!-- <form action="./../<?php echo CORE_URL ?>handler.php?action=export_feedback" method="POST">
				<input type="hidden" name="date_report" id="date_report" value="<?php echo $_POST['date_report']?>"/>
			<input class="btn btn-primary" style="width:150px" type="submit" value="Export to CSV"/>
            </form> -->
            <a href=<?php echo $_POST['date_report'] . ".csv"?> class="btn btn-primary" download>Download CSV</a>

            <br><br>
            <div style="width:40%"><i><b>Note : The Columns in the Exported File will be as follows : Feedback_ID, Timestamp of the Feedback, Meal, S_ID, Comments</b></i></div>
            </center>
            </div>


            <?php //ob_clean(); ?>
            <!-- <div class="col-md-2"></div> -->


</body>

</html>
