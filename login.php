
<?php

require './header.php';


  if(isset($_SESSION['username'])){
    header('location:' . ROOT_URL . 'dashboard.php');
  }

  $_SESSION['login_page'] = 1;

?>

<script src="https://apis.google.com/js/client:platform.js" async defer></script>
<script src = "https://plus.google.com/js/client:plusone.js"></script>

  <script type="text/javascript">
  /**
   * Handler for the signin callback triggered after the user selects an account.
   */
  function onSignInCallback(resp) {
    gapi.client.load('plus', 'v1', apiClientLoaded);
  }

  /**
   * Sets up an API call after the Google API client loads.
   */
  function apiClientLoaded() {
    gapi.client.plus.people.get({userId: 'me'}).execute(handleEmailResponse);
  }

  /**
   * Response callback for when the API client receives a response.
   *
   * @param resp The API response object with the user email and profile information.
   */
  function handleEmailResponse(resp) {
    var primaryEmail;
    for (var i=0; i < resp.emails.length; i++) {
      if (resp.emails[i].type === 'account') primaryEmail = resp.emails[i].value;
    }
    // document.getElementById('responseContainer').value = 'Primary email: ' +
        // primaryEmail + '\n\nFull Response:\n' + JSON.stringify(resp);


        if ( primaryEmail.indexOf("@pilani.bits-pilani.ac.in") !== -1 ) {

          $.ajax({url: "./core/handler.php?email=" + primaryEmail, success: function(result){
              if (result != "Please Login using only BITS Mail"){
                window.location.href = "dashboard.php";

              }
              else {
                alert("Please Login using only BITS Mail!");
              }

          }});
        }

        else {
          alert("Please Login using only BITS Mail!");
        }

  }

  </script>
<?php



?>




</script>
<body>


    <!--Fixed navigation bar =======================================================================================-->
   <div class="navbar navbar-inverse navbar-static-top navbar-custom">
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
                    <li><a href="<?php echo ROOT_URL; ?>contact.php">Contact</a></li>
                    <?php

                          if (! isset($_SESSION["username"])) { ?>

                            <li><a href='<?php echo ROOT_URL; ?>login.php'><u>Login</u></a></li>
                    <?php } else { ?>
                            <li><a href='<?php echo ROOT_URL; ?>dashboard.php'>Dashboard</a></li>
                            <li><a href='<?php echo CORE_URL; ?>handler.php?action=logout'>Logout</a></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>


<!-- =============================================BITS MAIL Login Form ======================================== -->
  <div class="row">

        <div style="display:none" id="login-alert-gmail" class="alert alert-danger"></div>
                        <script type="text/javascript">
                          function S1(){
                          var str = document.location.toString();
                            if(str.search("error=5") != -1){
                              document.getElementById("login-alert-gmail").style.display = "block";
                              document.getElementById("login-alert-gmail").style.width = "40%";
                              document.getElementById("login-alert-gmail").innerHTML = "Authentication Error : UserName not found! Use only BITS Mail to Login!";
                            }
                          }
                          S1();

                        </script></center>
        </div>

<script type="text/javascript">function S(){
  document.getElementById('loginbox').style.display = "block";
}</script>
<div class="row" style="height:100%;margin-top:100px;">
<div class="col-mg-12">
<div class="col-md-6">
            <center>
			<span class="glyphicon glyphicon-user" style="font-size:150px;margin-bottom:20px;margin-top:50px;"></span>
              <div id="gConnect" class="button">
                <button class="g-signin"
                    data-scope="email"
                    data-clientid="1066667584879-6s59ivh59s0ll1s9thl8p12u0c81hhtt.apps.googleusercontent.com"
                    data-callback="onSignInCallback"
                    data-theme="dark"
                    data-cookiepolicy="single_host_origin">
                </button>
              </div><br>
			  <p style="color:grey">*Please make sure you login with BITS Mail only</p>
            </center>
</div><div class="col-md-6" style="border-left:1px solid #D8D8D8">
<!-- =============================================SSMS login Form ======================================== -->
        <center><h3><!--<a href="#" onClick="S();" class="btn btn-primary">Login (for SSMS Team Only)</a>--></h3></center>
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Admin Login</div>
                        <!-- <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div> -->
                    </div>

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <script type="text/javascript">
                          function A(){
                          var str = document.location.toString();
                            if(str.search("error=1") != -1){
                              document.getElementById("login-alert").style.display = "block";
                              document.getElementById("login-alert").innerHTML = "Error : UserName or Password not found!";
                            }
                          }
                          A();

                        </script>

                        <form id="loginform" class="form-horizontal" method="POST" action="<?php echo CORE_URL;?>handler.php?action=login">


                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="S_ID For ex. F2012999P">
                                    </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                            </div>

                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                      <div class="col-sm-12 controls">
                                        <input type="submit" id="btn-login" class="btn btn-primary" style="width:120px"/>
                                      </div>
                            </div>


                                <!-- <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account!
                                        <a id="signuplink" href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>     -->
                            </form>



                        </div>
                    </div>

         </div>
</div></div></div>

              </div>

    </center>



</div>



    <script src="./includes/js/jquery-2.1.1.min.js"></script>
<script src="./includes/js/bootstrap.js"></script>

</body>
</html>


