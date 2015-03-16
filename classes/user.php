<?php


require_once ROOT_URL . 'header.php';

include CORE_URL . 'mysql_connect.php';


class User{

	public $privilege = 0;
	public $is_logged_in;
	public $user_id;
	public $mess, $bhawan, $room, $name, $idno;

	function __Construct( $user_id, $privilege ){
		$this->user_id = $user_id;
		$this->privilege = $privilege;
		include CORE_URL . 'mysql_connect.php';

		if ( $privilege == 0) {

			$query = strtolower("Select * from student where S_ID = '" . $user_id . "'");
			$result = mysqli_query($conn, $query);

			if ( $result ) {
				$array_returned = mysqli_fetch_array( $result );
				$this->mess = $array_returned[6];
				$this->room = $array_returned[3];
				$this->idno = $array_returned[1];
				$this->bhawan = $array_returned[4];
				$this->name = $array_returned[2];
			}
			else {
				$this->mess = "";
				$this->idno = "";
				$this->room = "";
				$this->bhawan = "";
				$this->name = "";
			}
		}

	}

	function get_user_profile() {

    ?>

    	<h4>IDNO : &emsp;<?php echo $this->idno; ?></h4><br>
		<h4>Bhawan & Room : &emsp;<?php echo $this->bhawan . "   " . $this->room; ?></h4><br>
		<h4>Mess : &emsp;<?php echo $this->mess; ?></h4><br>

    	<?php
	}

	function get_grubs_signed() {
		include  CORE_URL . 'mysql_connect.php';
		if ( $this->privilege == 3 ){
			?>

			<h4>Grubs You have Organised : </h4>

			<?php

		  		$query = strtolower("Select grub_id , name, date, mess from grubs where S_ID = '" . $this->user_id . "' order by date desc");

				$result_1 = mysqli_query($conn, $query );

   		?>

   		<table class="table table-bordered">
		   <caption><h4>Grubs Organised<h4></caption>

		   <a class="btn btn-primary" href="handler.php?action=add_new_grub">Add New</a>
		   <thead>
		      <tr>
		         <th>GRUB ID</th>
		         <th>NAME</th>
		         <th>DATE</th>
		         <th>MESS</th>
		         <th>EDIT Link</th>
		         <th>Upload Lists</th>
		      </tr>
		   </thead>
		   <tbody>

    	<?php

    		$i = 0;
    		while( $result = mysqli_fetch_array( $result_1 ) )  {

    			echo "<tr>";
				echo "<td>" . $result[0] . "</td>";
				echo "<td>" . $result[1] . "</td>";
				echo "<td>" . $result[2] . "</td>";
				echo "<td>" . $result[3] . "</td>";
				?>
				<td><a href='<?php echo CORE_URL;?>handler.php?action=get_edit_grub&grub_id=<?php echo $result[0]; ?>'>Edit Grub</a></td>
				<td><a href='<?php echo CORE_URL;?>handler.php?action=upload_grub_list&grub_id=<?php echo $result[0]; ?>'>Upload Lists</a></td>
				<?php
				echo "</tr>";

				$i++;

    		}

    	?>

		   </tbody>
		</table>

		<?php


		}

		elseif ( $this->privilege == 0 ){
			?>

			<h4>Grubs Signed</h4>

			<?php
				$query = strtolower("Select grubs.grub_id, grubs.name, grubs.date, grubs.mess from grub_signings inner join grubs where grubs.GRUB_ID  = grub_signings.grub_id and grub_signings.S_ID = '" . $this->user_id . "'");
				include CORE_URL . 'mysql_connect.php';

				$result_1 = mysqli_query($conn, $query );

   		?>

   		<table class="table table-bordered">
		   <caption><h4>Grubs Signed<h4></caption>

		   <thead>
		      <tr>
		         <th>GRUB ID</th>
		         <th>NAME</th>
		         <th>DATE</th>
		         <th>MESS</th>
		         <th>Cancel Signing</th>
		      </tr>
		   </thead>
		   <tbody>

    	<?php

    		$i = 0;
    		while( $result = mysqli_fetch_array( $result_1 ) )  {

    			echo "<tr>";
				echo "<td>" . $result[0] . "</td>";
				echo "<td>" . $result[1] . "</td>";
				echo "<td>" . $result[2] . "</td>";
				echo "<td>" . $result[3] . "</td>";?>
				<td><a href="<?php echo CORE_URL;?>handler.php?action=cancel_signing&grub_id=<?php echo $result[0]?>" >Cancel Signing</a></td>
				<?php
				echo "</tr>";

				$i++;

    		}

    	?>

		   </tbody>
		</table>
		<?php

		}

	}

	function get_mess_data() {
		include CORE_URL . 'mysql_connect.php';

  		$query = strtolower("Select bill_id, t_id, item_" . $this->mess . ".name, dor, student_takes_" . strtolower( $this->mess ) . ".rate, qty from student_takes_" . $this->mess . " inner join item_" . $this->mess . " where item_" . $this->mess . ".item_id = student_takes_" . $this->mess . ".item_id and S_ID = '" . $this->user_id . "'");

   		$result_1 = mysqli_query($conn, $query );

   		?>

   		<table class="table table-bordered">
		   <caption><h4>Mess Extras<h4></caption>
		   <br>
		   <thead>
		      <tr>
		         <th>Bill ID</th>
		         <th>T ID</th>
		         <th>Item</th>
		         <th>Rate</th>
		         <th>Qty</th>
		         <th>DOR</th>
		      </tr>
		   </thead>
		   <tbody>

    	<?php

    		$i = 0;
    		while( $result = mysqli_fetch_array( $result_1 ) )  {

    			echo "<tr>";
				$bill_id[$i] = $result[0];
				$t_id[$i] = $result[1];
				$dor[$i] = $result[3];
				$itemName[$i] = $result[2];
				$rate[$i] = $result[4];
				$qty[$i] = $result[5];

				echo "<td>" . $bill_id[$i] . "</td>";
				echo "<td>" . $t_id[$i] . "</td>";
				echo "<td>" . $itemName[$i] . "</td>";
				echo "<td>" . $rate[$i] . "</td>";
				echo "<td>" . $qty[$i] . "</td>";
				echo "<td>" . $dor[$i] . "</td>";
				echo "</tr>";

				$i++;

    		}

    		$query = strtolower("Select SUM(QTY*RATE) from student_takes_" . strtolower( $this->mess ) . " where S_ID = '" . $this->user_id . "'");

			$result = mysqli_query($conn, $query);

    		if ( $result ) {
    			$result = mysqli_fetch_array($result);
    		}

    	?>

		   </tbody>
		</table>

		<h4>Total Mess Extras (for this Semester) : <b><?php echo $result[0]; ?></b></h4>
		<?php


	}


	function get_anc_data() {
		include CORE_URL . 'mysql_connect.php';

		$query = strtolower("Select bill_id, t_id, item_ANC.name, dor, student_takes_ANC.rate, qty from student_takes_ANC inner join item_anc where item_anc.item_id = student_takes_ANC.item_id and S_ID = '" . $this->user_id . "'");

        $result_1 = mysqli_query($conn, $query );
        ?>
        <table class="table table-bordered">
		   <caption><h4>ANC Extras<h4></caption>
		   <br>
		   <thead>
		      <tr>
		         <th>Bill ID</th>
		         <th>T ID</th>
		         <th>Item</th>
		         <th>Rate</th>
		         <th>Qty</th>
		         <th>DOR</th>
		      </tr>
		   </thead>
		   <tbody>

        <?php
		    if ( $result_1 ) {

				$i = 0;
				while( $result = mysqli_fetch_array( $result_1 ) )  {

					echo "<tr>";
					$bill_id[$i] = $result[0];
					$t_id[$i] = $result[1];
					$dor[$i] = $result[3];
					$itemName[$i] = $result[2];
					$rate[$i] = $result[4];
					$qty[$i] = $result[5];

					echo "<td>" . $bill_id[$i] . "</td>";
					echo "<td>" . $t_id[$i] . "</td>";
					echo "<td>" . $itemName[$i] . "</td>";
					echo "<td>" . $rate[$i] . "</td>";
					echo "<td>" . $qty[$i] . "</td>";
					echo "<td>" . $dor[$i] . "</td>";
					echo "</tr>";

					$i++;

				}
		    }

			$query = strtolower("Select SUM(QTY*RATE) from student_takes_ANC where S_ID = '" . $this->user_id . "'");

			$result = mysqli_query($conn, $query);

    		if ( $result ) {
    			$result = mysqli_fetch_array($result);
    		}
			else {
				$result = 0;
			}

	  	?>

	    </tbody>
	</table>
			<h4>Total ANC Extras (for this Semester) : <b><?php echo $result[0]; ?></b></h4>

	<?php

	}


}

?>
