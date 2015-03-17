<?php 
include 'mysql_connect.php';

if ( isset($_POST['btn-feedback']) ) {


?>
<h4>Date : <?php echo $_POST['date']; ?> &emsp; | &emsp; Meal : <?php echo $_POST['meal']; ?></h4>
<h4>The Menu for the Meal was : </h4>
    
    <h5 style="width:75%">
            <?php


                $query = "Select * from menu_item where date like '" . $_POST['date'] . " %' and bld = '" . $_POST['meal'] . "'";

                $result = mysqli_query($conn, $query);
                
                while($row = mysqli_fetch_array($result)) {
                    echo "<b>" . strtoupper( $row[3] ) . "</b>, ";
                }


            ?>

    </h5>
    <div class="panel panel-info" style="width:80%" >
        <div class="panel-heading">
            <div class="panel-title">Feedback<br></div>

        </div>

        <div style="padding-top:20px" class="panel-body">

            <form id="feedbackreport" class="form-horizontal" method="POST" action="<?php echo CORE_URL; ?>handler.php?action=feedback">
                <input type="hidden" name="date1" id="date1" value="<?php echo $_POST['date']?>"/>
                <input type="hidden" name="bld1" id="bld1" value="<?php echo $_POST['meal']?>"/>

                <div style="margin-bottom: 20px" class="input-group">
                            <span class="input-group-addon">&emsp;Rate (Out of 10)</span>
                            <input id="score" type="number" class="form-control" name="score" required max="10" min="0">
                </div>
                <div style="margin-bottom: 20px" class="input-group">
                            <span class="input-group-addon">&emsp;Any Comments&nbsp;</span>
                            <textarea name="comments" cols="69" rows="10"> </textarea>
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
<?php 

}

else {



}


?>         