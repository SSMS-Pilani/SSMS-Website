<?php

include './../header.php';

/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . './../classes/PHPExcel.php';

?>



<?php


	if(! (isset($_SESSION['username']) && isset($_SESSION['privilege']) && ( $_SESSION['privilege'] == 2 || $_SESSION['privilege'] == 1) ) ) {
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
<script type="text/javascript" src="./../<?php echo INCLUDES_URL; ?>js/jquery-2.1.1.min.js"></script>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="./../<?php echo INCLUDES_URL; ?>css/style.css" />
<link type="text/css" rel="stylesheet" href="./../<?php echo INCLUDES_URL; ?>css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="./../<?php echo INCLUDES_URL; ?>css/jquery.datepick.css">
<script type="text/javascript" src="./../<?php echo INCLUDES_URL; ?>js/jquery.plugin.js"></script>
<script type="text/javascript" src="./../<?php echo INCLUDES_URL; ?>js/jquery.datepick.js"></script>
<link rel="shortcut icon" type="image/png" href="./../<?php echo INCLUDES_URL;?>favicon.png"/>
<script type="text/javascript">
$(function() {
	$('#startDate').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#endDate').datepick({dateFormat: 'yyyy-mm-dd'});
});
</script>
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
	                <li><a href="./../handler.php?action=logout"><u>Logout</u></a></li>
	            </ul>

	        </div>
	    </div>
    </div>

    <div class="container">
    	<div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9" style="">
            <h2>Upload the Menu</h2>
       			<h4>Select the Menu XLSX File named in a way Menu-DD-MM-YY-to-DD-MM-YY.sql from your Computer</h4><br><br>
       			<form action="menu_uploader.php" method="post" enctype="multipart/form-data">
				    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
				    Start Date : <input type="text" name="startDate" id="startDate">&emsp;&emsp;
				    End Date : <input type="text" name="endDate" id="endDate"><br><br>
				    <input class="btn btn-primary" type="submit" value="Upload the File" name="submit">

				</form>
				<div id="status">
				<?php

					if (isset($_POST['submit'])) {

							$target_dir = "./../uploads/";
							$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
							$uploadOk = 1;
							$FileType = pathinfo($target_file,PATHINFO_EXTENSION);

							$startDate = $_POST['startDate'];
							$endDate = $_POST['endDate'];
							$currDate = $startDate;

							// echo $startDate . "  " . $endDate;
							// echo "<br>" . date('d-m-Y', strtotime($startDate. ' + 1 days'));
 							if($FileType != "xlsx"){
								echo "Error";
							}
							else {


								move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

								shell_exec("chmod 777 " . $target_file);

								echo $target_file;

								$query = strtolower("INSERT INTO menu_item(DATE,BLD,NAME) VALUES(");

								$objPHPExcel = PHPExcel_IOFactory::load($target_file);


								// $bld = 1;
								$i = 'A';

								while(date('Y-m-d', strtotime($endDate. ' + 1 days')) !== $currDate)	{

									$activeSheet = $objPHPExcel->getActiveSheet();

									$bld = 1;

									$j = 1;

									for($j = 1; $j < 40; $j++){

										$value = $activeSheet->getCell($i.($j + 2))->getValue();

										if( trim($value) == "" || $value == "=#REF!" || $value == " " || $value == "  ") {
											// $j++;
											unset($value);
											continue;
										}

										elseif( strpos($value, "LUNCH") !== FALSE) {

											// $j++;
											$bld = 2;
											unset($value);
											continue;
										}

										elseif( strpos($value, "DINNER") !== FALSE) {

											// $j++;
											$bld = 3;
											unset($value);
											continue;
										}


									// 	echo $value . " ";
										// echo $currDate . " " . $bld;
										$check_query = "Select * from `menu_item` where date like '" . $currDate . " %' and bld = '" . $bld . "' and name = '" . trim($value) . "'";
										$check_result = mysqli_fetch_array(mysqli_query($conn, $check_query));

										if (! $check_result) {

											$final_query = $query . "'" . $currDate . " 10:00:00','" . $bld . "','" . trim($value) . "')";
											mysqli_query($conn, $final_query);

										}
										else {
											echo "Menu Item " . $value . " Already Uploaded!<br>";
										}
										// $j++;
										unset($value);
										unset($final_query);
										// if($j > 30) break;

									// 	// break;
									// // echo $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getValue() . "<br>";

									}

									$i++;

									// echo "<h1>". chr(62 + $i) . "</h1>";

									$currDate = date('Y-m-d', strtotime($currDate. ' + 1 days'));

									unset($activeSheet);
								}


								?>

								<h4>Upload Done!<br>

								<?php

								unset($_FILES);
								unset($_POST['submit']);

							}
					}

					?>



				</div>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
