<?php

	include 'header.php';

	if ( ! ( isset($_SESSION['username']) && isset($_SESSION['privilege']) && $_SESSION['privilege'] == 3 ) ) {
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

            <script src="./../<?php echo INCLUDES_URL; ?>tinymce/tinymce.min.js"></script>
            <script>

            tinymce.init({
                selector: 'textarea',
                toolbar1: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
                statusbar : false,
                menubar : false
            });

            </script>
            <script type="text/javascript" src="./../<?php echo INCLUDES_URL; ?>js/jquery.plugin.js"></script>
            <script type="text/javascript" src="./../<?php echo INCLUDES_URL; ?>js/jquery.datepick.js"></script>
            <link rel="stylesheet" type="text/css" href="./../<?php echo INCLUDES_URL; ?>css/jquery.datepick.css">
            <script type="text/javascript">
                $(function() {
                    $('#date').datepick();
                });
            </script>
            <div class="col-md-1"></div>


            <?php if( isset($_GET['view']) && $_GET['view'] == 1) { ?>
                <div class="col-md-8">
                <h3>Create/ Edit Grub</h3><br>
                <div class="panel panel-info" style="width:80%" >
                        <div class="panel-heading">
                            <div class="panel-title">Add/ Edit Grub<br></div>

                        </div>
                    <?php
                        $query = "SELECT * FROM grubs where grub_id = '" . $_GET['grub_id'] . "'";
                        $result = mysqli_fetch_array( mysqli_query( $conn, $query ) );


                    ?>
                    <div style="padding-top:20px" class="panel-body">

                            <form id="feedbackreport" class="form-horizontal" method="POST" action="./../handler.php?action=edit_grub_submit">
                                <input type="hidden" name="grub_id" id="grub_id" value="<?php echo $_GET['grub_id'];?>"/>

                                <div style="margin-bottom: 20px" class="input-group">
                                            <span class="input-group-addon">&emsp;Name</span>
                                            <input id="name" type="text" class="form-control" name="name" value="<?php echo $result[1];?>"required>
                                </div>
                                <div style="margin-bottom: 20px" class="input-group">
                                            <span class="input-group-addon">&emsp;Date</span>
                                            <input id="date" type="text" class="form-control" name="date">
                                </div>

                                <div style="margin-bottom: 20px" class="input-group">
                                    <span class="input-group-addon">Mess Name</span>
                                    <select class="form-control" name="mess" id="mess" required>
                                        <option <?php if ("SV" == $result[3]) echo "selected";?>>SV</option>
                                        <option <?php if ("KG" == $result[3]) echo "selected";?>>KG</option>
                                        <option <?php if ("MAL" == $result[3]) echo "selected";?>>MAL</option>
                                        <option <?php if ("MR" == $result[3]) echo "selected";?>>MR</option>
                                        <option <?php if ("SR" == $result[3]) echo "selected";?>>SR</option>
                                        <option <?php if ("VKB" == $result[3]) echo "selected";?>>VKB</option>
                                        <option <?php if ("RPA" == $result[3]) echo "selected";?>>RPA</option>
                                    </select>
                                </div>
                                <div style="margin-bottom: 20px" class="input-group">
                                            <span class="input-group-addon">Small<br>Write-up</span>
                                            <textarea name="write_up" id="write_up" cols="58" rows="10"><?php echo $result[5];?></textarea>
                                </div>
                                <div style="margin-top:10px" class="form-group">
                                        <!-- Button -->
                                        <center>
                                          <div class="col-sm-12 controls">
                                            <input type="submit" id="btn-login" class="btn btn-primary" style="width:160px"/>
                                          </div>
                                        </center>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                   <?php } ?>


                <?php if( isset($_GET['view']) && $_GET['view'] == 2) { ?>
                <div class="col-md-5">
                <h3>Upload Grub Lists</h3><br>
                    <h4>Please Upload the File in the Standard Format only</h4>
                    <form action="./../<?php echo CORE_URL; ?>handler.php?action=upload_grub_data" method="post" id="form" enctype="multipart/form-data">
                    <input type="hidden" name="grub_id" id="grub_id" value="<?php echo $_GET['grub_id'];?>"/>
                    <input type="file" name="fileToUpload" id="fileToUpload" id="fileToUpload" required><br><br>

                    <br><br>

                    <button class="btn btn-primary" onclick="recheck_mess()" type="submit" name="btnSubmit">Upload the File</button>
                </form>

                        </div>

                   <?php } ?>



        <div class="col-md-3">
            <h4>List Format is available <a href="./../uploads/grub_list.xlsx">here</a></h4>
            <h4>Please Make sure the Above format is followed</h4>
            <h5>Contact the Technical Team in case of any issues</h5>

        </div>
            </div>



        </div>

    </div>
			<!-- <div class="col-md-2"></div> -->


</body>
</html>
