<?php

    require_once 'header.php';

?>
<html lang="">
<head>
<title>SSMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="Nikhil" content=""/>
<link rel="stylesheet" type="text/css" href="style.css" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>

    <!--Fixed navigation bar-->
    <div class="navbar navbar-inverse navbar-static-top navbar-custom">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a href="#" class="navbar-brand" >SSMS</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo ROOT_URL; ?>index.php">Home</a></li>
                    <li><a href="<?php echo ROOT_URL; ?>about.php">About us</a></li>
                    <li><a href="<?php echo ROOT_URL; ?>contact.php"><u>Contact</u></a></li>
                    <?php

                          if (! isset($_SESSION["username"])) { ?>

                            <li><a href='<?php echo ROOT_URL; ?>login.php'>Login</a></li>
                    <?php } else { ?>
                            <li><a href='<?php echo ROOT_URL; ?>dashboard.php'>Dashboard</a></li>
                            <li><a href='<?php echo CORE_URL; ?>handler.php?action=logout'>Logout</a></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>
    <center>
        <div class="row"><div><h1>The Team 2014-15</h1></div>
        <hr/>
        </div>
        <div class="row">                  <div>
            <div class="col-md-12"> </div>
            <div class="col-md-12"> </div>
            <div class="col-md-12"> </div>
            <div class="col-md-12"> </div>
            <div class="col-md-12"> </div>
            <div class="col-md-12"> </div>
            <div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div><div class="col-md-12"> </div>



            </div></div>
            <div class="row">
                <!-- <div class="col-md-1"></div> -->
                <div class="col-md-3">
                    <div class="box-6 top-5">
                            <img src="images/rushyant.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                            <p><b><a href="#" class="link">Rushyant Reddy </b></a><br> President | SSMS<br>Contact:+91-8441000741</p>
                    </div>
                    <hr>
                    <div class="box-6 top-6">
                        <img src="images/nithya.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                        <p><b><a href="#" class="link">Nithyashri Govindarjan </b></a><br>Expert Member | SSMS <br>Contact:+91-9535215787</p>
                    </div>
                    <hr>
                    <div class="box-6 top-6">
                        <img src="images/tanay.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                        <p><b><a href="#" class="link">Tanay Dixit</b></a><br>Member | AMC <br>Contact:+91-9820495284</p>
                    </div>
                    <hr/>
                    <div class="box-6 top-5">
                            <img src="images/abhilash.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                            <p><b><a href="#" class="link">C Abhilash Reddy</b></a><br> Mess Representative | MAL Mess<br>Contact:+91-7733015086</p>
                    </div>
                    <hr>
                    <div class="box-6 top-5">
                            <img src="images/vishalp.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                            <p><b><a href="#" class="link">Vishal Patil</b></a><br> Mess Representative | SR Mess<br>Contact:+91-7733975679</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-6 top-5">
                            <img src="images/arpit.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                            <p><b><a href="#" class="link">Arpit Sherma</b></a><br> Secretary | SSMS & Mess-rep, RPA Mess<br>Contact:+91-9785102668</p>
                    </div>
                    <hr>
                    <div class="box-6 top-6">
                        <img src="images/sanjeed.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                        <p><b><a href="#" class="link">Sanjeed Schamnad</b></a><br>Expert Member | SSMS <br>Contact:+91-9929901857</p>
                    </div>
                    <hr>
                    <div class="box-6 top-5">
                            <img src="images/nirali.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                            <p><b><a href="#" class="link">Nirali Kansara</b></a><br> Mess Representative | MB Mess<br>Contact:+91-9672018444</p>
                    </div>
                    <hr/>
                    <div class="box-6 top-5">
                            <img src="images/virinchi.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                            <p><b><a href="#" class="link">K. Virinchi Reddy</b></a><br> Mess Representative | VKB Mess<br>Contact:+91-8504001947</p>
                    </div>
                    <hr>
                </div>
                <div class="col-md-3">
                    <div class="box-6 top-5">
                            <img src="images/vishal.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                            <p><b><a href="#" class="link">Vishal </b></a><br> Treasurer | SSMS<br>Contact:+91-7568452250</p>
                    </div>
                    <hr>
                    <div class="box-6 top-6">
                        <img src="images/pankhuri.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                        <p><b><a href="#" class="link">Pankhuri Kumar</b></a><br>Member | AMC. <br>Contact:+91-7734786263</p>
                    </div>
                    <hr>
                    <div class="box-6 top-6">
                        <img src="images/ankur.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                        <p><b><a href="#" class="link">Ankur Bhardwaj</b></a><br>Mess Representative | SV Mess <br>Contact:+91-9772209944</p>
                    </div>
                    <hr/>
                    <div class="box-6 top-6">
                        <img src="images/aravind.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                        <p><b><a href="#" class="link">Allameni Aravind</b></a><br>Mess Representative | KG Mess<br>Contact:+91-9772211572</p>
                    </div>
                    <hr>
                </div>
                <div class="col-md-3" style="border-left:2px">
                    <h3>For Technical Problems</h3>
                    <div class="box-6 top-5">
                            <img src="images/deven.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                            <p><b><a href="#" class="link">Deven Bansod</b></a><br> Technical Lead | SSMS<br>Contact:+91-9772224232</p>
                    </div>
                    <hr>
                    <div class="box-6 top-6">
                        <img src="images/nikhil.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                        <p><b><a href="#" class="link">Nikhil Ramesh</b></a><br>Tech. Team Member | SSMS <br>Contact:+91-????</p>
                    </div>
                    <hr>
                    <div class="box-6 top-6">
                        <img src="images/karan.jpg" width="150px" height="170px" alt="" class="img-indent img-border">
                        <p><b><a href="#" class="link">Karan Rajpal</b></a><br>Tech. Team Member | SSMS <br>Contact:+91-????</p>
                    </div>
                    <hr>
                </div>
            </div>



            </div>

        </hr>
        </hr></hr>
    </center>
<?php

require_once 'footer.php';

?>

<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>