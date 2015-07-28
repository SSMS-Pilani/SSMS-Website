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
				<ul class="nav navbar-nav navbar-right">
        <li><img src="images/facebook.png" style="width:22px;margin-top:12px;margin-right:10px;"></li>
        <li><img src="images/twitter.png" style="width:22px;margin-top:12px;margin-right:20px;"></li>
				</ul>
            </div>
        </div>
    </div>
    

    <center>
        <div class="row"><div><h1>The Team 2014-15</h1></div>
        <hr width="80%">
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="table-responsive ">
                   <table class="table table-bordered">
                      <center><caption></caption></center>
                      <thead>
                         <tr>
                            <th>Name</th>
                            <th>Post(s)</th>
                            <th>Contact</th>
                         </tr>
                      </thead>
                      <tbody>
                         <tr>
                            <td><a>Rushyant Reddy</a></td>
                            <td>President, SSMS</td>
                            <td>+91-8441000741</td>
                         </tr>
                         <tr>
                            <td><a>Arpit Sherma</a></td>
                            <td>Secretary, SSMS & <br>Mess Rep., RPA Mess</td>
                            <td>+91-9785102668</td>
                         </tr>
                         <tr>
                            <td><a>Vishal</a></td>
                            <td>Treasurer, SSMS</td>
                            <td>+91-7568452250</td>
                         </tr>
                         <tr>
                            <td><a>Nithyashri Govindarjan</a></td>
                            <td>Expert Member, SSMS</td>
                            <td>+91-9535215787</td>
                         </tr>
                         <tr>
                            <td><a>Sanjeed Schamnad</a></td>
                            <td>Expert Member, SSMS</td>
                            <td>+91-9929901857</td>
                         </tr>
                         <tr>
                            <td><a>Pankhuri Kumar</a></td>
                            <td>Member, AMC</td>
                            <td>+91-7734786263</td>
                         </tr>
                         <tr>
                            <td><a>Tanay Dixit</a></td>
                            <td>Member, AMC</td>
                            <td>+91-9820495284</td>
                         </tr>
                         <tr>
                            <td><a>Nirali Kansara</a></td>
                            <td>Mess Representative, MB Mess</td>
                            <td>+91-9672018444</td>
                         </tr>
                         <tr>
                            <td><a>Ankur Bhardwaj</a></td>
                            <td>Mess Representative, SV Mess</td>
                            <td>+91-9772209944</td>
                         </tr>
                         <tr>
                            <td><a>C Abhilash Reddy</a></td>
                            <td>Mess Representative, MAL Mess</td>
                            <td>+91-7733015086</td>
                         </tr>
                         <tr>
                            <td><a>K. Virinchi Reddy</a></td>
                            <td>Mess Representative, VKB Mess</td>
                            <td>+91-8504001947</td>
                         </tr>
                         <tr>
                            <td><a>Allameni Aravind</a></td>
                            <td>Mess Representative, KG Mess</td>
                            <td>+91-9772211572</td>
                         </tr>
                         <tr>
                            <td><a>Vishal Patil</a></td>
                            <td>Mess Representative, SR Mess</td>
                            <td>+91-7733975679</td>
                         </tr>
                         <tr>
                            <td><a>Deven Bansod</a></td>
                            <td>Technical Lead, SSMS</td>
                            <td>+91-9772224232</td>
                         </tr>
                         <tr>
                            <td><a>Karan Rajpal</a></td>
                            <td>Member, SSMS Technical Team</td>
                            <td>+91-9772211572</td>
                         </tr>
                         <tr>
                            <td><a>Nikhil Ramesh</a></td>
                            <td>Member, SSMS Technical Team</td>
                            <td>+91-7728835767</td>
                         </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </center>
<?php

require_once 'footer.php';

?>

<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>