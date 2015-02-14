<?php

	include './../header.php';

	if(! ((isset($_SESSION['username']) && isset($_SESSION['privilege']) && $_SESSION['privilege'] == 1) || $_SESSION['privilege'] == 2)) {
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
<script type="text/javascript" href="./../<?php echo INCLUDES_URL; ?>js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" href="./../<?php echo INCLUDES_URL; ?>js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="./../<?php echo INCLUDES_URL; ?>css/style.css" />
<link type="text/css" rel="stylesheet" href="./../<?php echo INCLUDES_URL; ?>css/bootstrap.css" />
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
                <a href="./../index.php" class="navbar-brand" >SSMS</a>
                 </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="./../index.php">Home</a></li>
                <li><a href="./../about.php">About us</a></li>
                <li><a href="./../contact.php">Contact</a></li>

                <li><a href="./../dashboard.php"><u>Dashboard</u></a></li>
                <li><a href="./../<?php echo CORE_URL; ?>handler.php?action=logout">Logout</a></li>
            </ul>

        </div>
        </div>
        </div>

    <div class="container">
    	<div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9" style="">
            <h2>Step 1</h2>

		    <script type="text/javascript">

			function recheck_mess(){
				$mess = document.getElementById("mess").value;
				var $answer = confirm("You have selected Mess as " + $mess + ". Please Confirm!\nPress OK to Move Forward or Cancel to Reset the Form");

				if ( $answer == true ) {

					document.getElementById("form").submit();
				}

				else {
					document.getElementById("form").reset();
				}

				return;
			}
			</script>
       		<h3>Before Uploading into the Database, you have to upload the file here and download the changed file and then Move to the next Step</h3><br><br>
       			<h4>Select the Dump File named Student_takes.sql from your Computer</h4><br><br>
       			<form action="upload_data_admin.php" method="post" id="form" enctype="multipart/form-data">
				    <input type="file" name="fileToUpload" id="fileToUpload" id="fileToUpload" required><br><br>
				    <label>Mess Name : </label>
				    <select name="mess" id="mess" required>
				    	<option value="SV">SV</option>
				    	<option value="KG">KG</option>
				    	<option value="MAL">MAL</option>
				    	<option value="MR">MR</option>
				    	<option value="SR">SR</option>
				    	<option value="VKB">VKB</option>
				    	<option value="RPA">RPA</option>
				    	<option value="ANC">ANC</option>
				    </select>
				    <br><br>

				    <button class="btn btn-primary" onclick="recheck_mess()" type="submit" name="btnSubmit">Upload the File</button>
				</form>
				<div id="status">
				<?php

					if ( isset($_POST['btnSubmit']) ) {
							echo "Deven";
							$target_dir = "./../uploads/";
							$target_file = $target_dir . "_" . $_SESSION['username'] . basename($_FILES["fileToUpload"]["name"]);
							$uploadOk = 1;
							$FileType = pathinfo($target_file,PATHINFO_EXTENSION);

							$mess = $_POST[ 'mess' ];

							if($FileType != "sql"){
								echo "Error";
							}
							else {
								move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

								shell_exec("chmod 777 " . $target_file);

								$str=file_get_contents($target_file);

								$str=str_replace("INSERT", "INSERT IGNORE", $str);

  								$str = str_replace( "`student_takes`" , "`student_takes_" . $mess . "` ", $str );
  								$str = str_replace( "`item`" , "`item_" . $mess . "` ", $str );
  								$str = str_replace( "STUDENT_TAKES " , "STUDENT_TAKES_" . $mess . " ", $str );
  								$str = str_replace( "ITEM " , "ITEM_" . $mess . " ", $str );

								file_put_contents($target_file, $str);

								include( './../' . CORE_URL . 'mysql_connect.php' );

								$empty_query = "TRUNCATE TABLE student_takes_". $mess;
								$result = mysqli_query($conn,  $empty_query );
								// print_r( $result );

								$empty_query_2 = "TRUNCATE TABLE item_". $mess;
								$result_2 = mysqli_query($conn, $empty_query_2 );
								// print_r( $result_2 );
								?>

								<h4><a href=<?php echo '"' . $target_file. '"'?>>Click to Download the New File</a> </h4><br>



								<h4><a href="/phpmyadmin/index.php?db=ssms&target=db_import.php">Move to the Next Step</a></h4>

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
