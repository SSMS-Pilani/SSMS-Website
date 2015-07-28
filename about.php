<?php

require_once 'header.php';

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
                    <li><a href="<?php echo ROOT_URL; ?>index.php">Home</a></li>
                    <li><a href="<?php echo ROOT_URL; ?>about.php"><u>About us</u></a></li>
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
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <h1>About SSMS</h1>
                  <hr/>
                  <p class="line-space" >
                      The Society for Student Mess Services (SSMS) is an official body, registered under the Rajasthan Societies Act (1958), which is empowered to manage the day-to-day affairs of the BITS Student Messes. It employs nearly 200 mess-workers and caters to the needs of over 3500 students in BITS-Pilani, Pilani Campus.</p>
<p class="line-space" >The Society directly handles all financial transactions and operational management of all the seven messes on campus and one All-Night Canteen. The Society has presently tied up with Sodexo, the international Food Service company, who have been hired as consultants to monitor, review and suggest changes in the system.</p>
<p class="line-space" >This is an attempt to streamline the entire Food Service Chain on campus, and ensure the students can look forward to good food being supplied to them regularly at affordable rates, by a professionally run body.</p>
<p class="line-space"  >Though all students registered in BITS Pilani are de facto members of this Society, the day-to-day operational aspects and all other major decisions are overseen by the Governing Council (SSMS). The Governing Council comprises elected representatives from each of the messes, four nominated members in the form of the AMC (Advisory and Monitoring Committee), two nominees from BITS Pilani, and four others. The main post-holders in the Council include the President, Secretary and the Treasurer of the Society. Every student on campus is encouraged to voice his/her opinions and suggestions towards the improvement of the mess-system. To indulge in cliches, the Society is after all an initiative of the students, by the students, for the students of BITS Pilani.
                  </p><div class="vertical-line"></div><div></div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">

                <center style="margin:5px"><h2>The Team</h2></center>
                    <hr/>

                    <center style="margin:5px"><h3>Executive Heads</h3>
                    <h4>President - Rushyant Reddy</h4>
                    <h4>Secretary - Arpit Sherma</h4>
                    <h4>Treasurer - Vishal</h4>
                    </center>
                    <hr/>
                    <center style="margin:5px"><h3>AMC Members</h3>
                    <h4>Rushyant Reddy | Tanay Dixit</h4>
                    <h4>Pankhuri Kumar | Vishal</h4>
                    </center>
                    <hr/>
                    <center style="margin:5px"><h3>Mess Representatives</h3>
                    <h4>Ankur Bharadwaj | Nirali Kansara</h4>
                    <h4>Allameni Aravind |  Abhilash Reddy</h4>
                    <h4>Arpit Sharma | Virinchi Reddy</h4>
                    <h4>Vishal Patil </h4>
                    </center>
                    <hr/>
                    <center style="margin:5px"><h3>Technical Team</h3>
                    <h4>Deven Bansod</h4>
                    <h4>Karan Rajpal</h4>
                    <h4>Nikhil Ramesh</h4>
                    </center>

            </div>
        </div>

<?php

require_once 'footer.php';

?>
