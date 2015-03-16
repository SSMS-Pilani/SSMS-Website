<?php

include './../header.php';
require_once 'openid.php';

if(isset($_GET['email']) && isset($_SESSION['login_page']) && $_SESSION['login_page'] == 1 ) {

		unset($_SESSION['login_page']);

		if(strpos($_GET['email'], "@pilani.bits-pilani.ac.in") !== FALSE) {

			$email = substr($_GET['email'], 0, 8) . "P";
			// echo $email;

			$query = "Select * From student where s_id = '" . $email . "'";

			$result = mysqli_query($conn, $query);



			if(mysqli_num_rows($result) > 0){

				$row = mysqli_fetch_array($result);

				$_SESSION['username'] = $email;
				$_SESSION['privilege'] = 0;
				// echo $_SESSION['username'];
				// header('location:./../dashboard.php');
				// return true;
			}

			else {
				echo "You are not logging in with BITS Mail!";
				// return false;

			}
		}

		else {

				echo "Please Login using only BITS Mail";
				return false;

		}

	}


if(isset($_GET['action']) && $_GET['action'] == "login") {


	if($_POST['username'] && $_POST['password']){

		echo $_POST['username'];
		echo $_POST['password'];

		// $username = filer_var($_POST['username'],FILTER_SANITIZE_STRING);
		// $password = filer_var($_POST['password'],FILTER_SANITIZE_STRING);
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "Select * From user where S_ID = '" . $username . "' and password = '" . $password . "'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) > 0){

			$row = mysqli_fetch_array($result);

			$_SESSION['username'] = $username;
			$_SESSION['privilege'] = $row[2];

			header('location:./../dashboard.php');

		}

		else {

				header('location:./../login.php?error=1');

		}

	}


}


elseif( isset($_GET['action']) && $_GET['action'] == "signup") {


	if($_POST['email'] && $_POST['passwd'] && $_POST['repasswd'] && $_POST['passwd'] == $_POST['repasswd']){


		$email = substr($_POST['email'],0,9);
		$password = $_POST['passwd'];

		$query = "Select * From user where S_ID = '" . $email . "'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 0){


			$query = "INSERT INTO user(S_ID,password,privilege) VALUES('" . $email . "', '" . $password . "', 0)";

			$result = mysqli_query($conn, $query);

			if($result){

				header('location:./../login.php');

			}

			else {

				header('location:./../login.php?error=2');

			}
		}
		else {

			header('location:./../login.php?error=2');

		}
	}

	else {
		header('location:./../login.php?error=2');
	}

}


elseif( isset($_GET['action']) && $_GET['action'] == "logout"){

	if(isset($_SESSION['username'])){

		unset($_SESSION['username']);
		unset($_SESSION['privilege']);
		header('location:./../index.php');
	}

	else {
		header('location:./../index.php');
	}

}


elseif( isset($_GET['action']) && $_GET['action'] == "changepwd"){

	if(isset($_SESSION['username']) && $_POST['oldpasswd'] && $_POST['newpasswd'] && $_POST['repasswd'] && $_POST['newpasswd'] == $_POST['repasswd']){



		$query = "UPDATE user Set password = '" . $_POST['newpasswd'] . "' where S_ID = '" . $_SESSION['username'] . "' and password = '" . $_POST['oldpasswd'] . "'";

		$result = mysqli_query($conn, $query);

		if($result){

			header('location:./../dashboard.php?error=done');
		}

		else {
			header('location:./../dashboard.php?error=1');
		}
	}

	else {
		header('location:./../dashboard.php?error=1');
	}

}


elseif( isset($_GET['action']) && $_GET['action'] == "feedback"){


	if(isset($_SESSION['username']) && isset($_POST['date1']) && isset($_POST['bld1']) ) {

		$result = FALSE;

		if(isset($_POST['comments'])){
			$comments = $_POST['comments'];
		}

		else{
			$comments = NULL;
		}

		echo $comments;

		$query = 'INSERT INTO menu_item_feedback(DATE, BLD, COMMENTS, SCORE, S_ID) VALUES("' . $_POST["date1"] . ' 10:00:00","' . $_POST['bld1'] . '","' . $comments . '","' . $_POST['score'] . '","' . $_SESSION['username'] . '")';
		echo $query;

		$result = mysqli_query($conn, $query);


		if($result){

			$_SESSION['date_done'] = $_POST['date1'];
			$_SESSION['meal_done'] = $_POST['bld1'];
			unset($_POST);
			header('location:./../dashboard.php?error=feedback_done');

		}

		else {
			$_SESSION['date_already'] = $_POST['date1'];
			$_SESSION['meal_already'] = $_POST['bld1'];
			header('location:./../dashboard.php?error=3');
		}

	}

	else {
		echo $_POST['date1'] . " " . $_POST['bld1'];
		header('location:./../dashboard.php?error=1');
	}


}


elseif( isset($_GET['action']) && $_GET['action'] == "export_feedback"){


	if(isset($_SESSION['username']) && isset($_POST['date_report']) ) {

		$date = $_POST['date_report'];

		// $query = "SELECT * FROM menu_item_feedback INTO OUTFILE '/feedback_" . $date . ".csv' FIELDS TERMINATED BY ',' ENCLOSED BY '' LINES TERMINATED BY '\n'";
		$query = "SELECT * FROM menu_item_feedback";
		$result = mysqli_query($conn,$query);

		// ob_end_clean();

		if($result){
			ob_end_clean();

			// header("Content-type: application/octet-stream");
			header("Content-type: text/csv");
			header("Content-disposition: attachment; filename=feedback_" . $date . ".csv");
			header("Pragma: no-cache");
			header("Expires: 0");



			// echo "Feedback_ID, Timestamp of the Feedback, Meal, S_ID, Comments,\n";

			// while ($arr = mysqli_fetch_array($result))  {
			// 	# code...
			// 	echo $arr[0] . "," . $arr[1] . "," . $arr[2] . "," . $arr[3] . "," . $arr[4] . ",\n";
			// }


			//header('location:./../dashboard.php?error=completed');
		}

		else{

			header('location:./../dashboard.php?error=4');
		}

	}

	else {
		// echo $_POST['date1'] . " " . $_POST['bld1'];
		header('location:./../dashboard.php?error=1');
	}


}


elseif( isset($_GET['action']) && $_GET['action'] == 'login_gmail'){

	$openid = new LightOpenID("localhost/ssmsn-master/");

	if ($openid->mode) {
	    if ($openid->mode == 'cancel') {
	        echo "User has canceled authentication!";
	    } elseif($openid->validate()) {
	        $data = $openid->getAttributes();
	        $email = $data['contact/email'];
	        $first = $data['namePerson/first'];
	        echo "Identity: $openid->identity <br>";
	        echo "Email: $email <br>";
	        echo "First name: $first";

	        if(strpos($email, "@pilani.bits-pilani.ac.in") !== FALSE){

	        	$username = substr($email,0,8) . "P";

	       		$query = "Select * From user where S_ID = '" . $username . "'";

				$result = mysqli_query($conn, $query);

				if(mysqli_num_rows($result) > 0){


					$_SESSION['username'] = $username;
					$_SESSION['privilege'] = 0;

					header('location:./../dashboard.php');

				}

				else{

					$query = "INSERT INTO user(S_ID,password,privilege) VALUES('" . $username . "','" . $openid->identity . "','0')";
					$result = mysqli_query($conn, $query);

					if($result){

						$_SESSION['username'] = $username;
						$_SESSION['privilege'] = 0;

						header('location:./../dashboard.php');
					}
					else{
						header('location:./../login.php?error=5');
					}

				}
			}

			else {

				header('location:./../login.php?error=5');

			}

	        // }



	    } else {
	        echo "The user has not logged in";
	        header('location:./../login.php?error=5');
	    }

	} else {
	    echo "Go to index page to log in.";
	    header('location:./../login.php?error=5');
	}

}


elseif( isset($_GET['action']) && $_GET['action'] == 'gen_feedback'){

	if ( isset($_SESSION['username']) && isset( $_POST['comments'] ) ) {

		$query = strtolower("INSERT INTO GENERAL_FEEDBACK(S_ID,COMMENTS) VALUES('" . $_SESSION['username'] . "', '" . $_POST['comments'] . "')");

		$result = mysqli_query($conn, $query );

		if ( $result ) {
			$_SESSION[ 'gen_feedback_done' ] = 1;
			echo 1;
 			header( 'location:./../dashboard.php?error=6' );
		}
		else{
			$_SESSION[ 'gen_feedback_done' ] = 0;
			echo 0;
			header( 'location:./../dashboard.php?error=6' );
		}

	}

	else {
		header( 'location:./../dashboard.php' );
	}

}


elseif( isset($_GET['action']) && $_GET['action'] == 'gen_feedback_report'){

	if(isset($_SESSION['username']) && isset($_POST['month_gen_report']) ) {

		$date = $_POST['month_gen_report'];

		// $query = "SELECT * FROM menu_item_feedback INTO OUTFILE '/feedback_" . $date . ".csv' FIELDS TERMINATED BY ',' ENCLOSED BY '' LINES TERMINATED BY '\n'";
		$query = "SELECT * FROM general_feedback where DATE like '" . $_POST['month_gen_report'] . "%'";
		$result = mysqli_query($conn,$query);

		if($result){
			ob_end_clean();
			header('Content-type: application/octet-stream');
			header('Content-type: text/csv');
			header('Content-disposition: attachment; filename=gen_feedback_' . $date . '.csv');
			echo "Feedback_ID, Timestamp of the Feedback, S_ID, Comments,\n";
			while ($arr = mysqli_fetch_array($result))  {
				# code...
				echo $arr[0] . "," . $arr[1] . "," . $arr[2] . "," . $arr[3]  . ",\n";
			}
			// header('location:./../dashboard.php?error=completed');
		}

		else{
			echo $result;
			header('location:./../dashboard.php?error=4');
		}

	}

	else {
		echo $_POST['date1'] . " " . $_POST['bld1'];
		header('location:./../dashboard.php?error=1');
	}

}


elseif( isset($_GET['action']) && $_GET['action'] == 'get_edit_grub'){

	if( isset($_SESSION['username']) && isset($_GET['grub_id']) && $_SESSION['privilege'] == 3 ) {


		header('location:./../admin/edit_grub.php?view=1&grub_id=' . $_GET['grub_id'] );

	}

	else {
		echo $_POST['date1'] . " " . $_POST['bld1'];
		header('location:./../dashboard.php?error=1');
	}

}

elseif( isset($_GET['action']) && $_GET['action'] == 'upload_grub_list'){

	if( isset($_SESSION['username']) && isset($_GET['grub_id']) && $_SESSION['privilege'] == 3 ) {

		header('location:./../admin/edit_grub.php?view=2&grub_id=' . $_GET['grub_id'] );

	}

	else {
		echo $_POST['date1'] . " " . $_POST['bld1'];
		header('location:./../dashboard.php?error=1');
	}

}

elseif( isset($_GET['action']) && $_GET['action'] == 'edit_grub_submit'){

	if( isset($_SESSION['username'])  && $_SESSION['privilege'] == 3 ) {

		if ( isset( $_POST['grub_id'] ) ) {

			$grub_id = $_POST['grub_id'];

			$query_test = "Select * FROM grubs where S_ID = '" . $_SESSION['username'] . "' and GRUB_ID = '" . $grub_id . "'";

			$result_test = mysqli_query($conn, $query_test);

			if( $result_test ) {

				$query = "UPDATE grubs SET `NAME` = '" . $_POST['name'] . "', `WRITE_UP` = '" . $_POST['write_up'] . "', `MESS` = '" . $_POST['mess'] . "' where grub_id = '" . $grub_id . "'";

				$result = mysqli_query($conn, $query ) ;

				if( $result )
					header('location:./../dashboard.php');
				else
					header('location:./../dashboard.php?error=1');
			}
			else{
				header('location:./../dashboard.php?error=1');

			}
		}

		else {
			header('location:./../dashboard.php');
		}

	}

	else {
		echo $_POST['date1'] . " " . $_POST['bld1'];
		header('location:./../dashboard.php?error=1');
	}

}

elseif( isset($_GET['action']) && $_GET['action'] == 'upload_grub_data'){

	if( isset($_SESSION['username'])  && $_SESSION['privilege'] == 3 ) {

		if ( isset( $_POST['grub_id'] ) ) {

			$grub_id = $_POST['grub_id'];

			$query_test = "Select * FROM grubs where S_ID = '" . $_SESSION['username'] . "' and GRUB_ID = '" . $grub_id . "'";

			$result_test = mysqli_fetch_array(mysqli_query($conn,$query_test));

			if( $result_test ) {
				echo "Into Test";
				error_reporting(E_ALL);
				ini_set('display_errors', TRUE);
				ini_set('display_startup_errors', TRUE);
				date_default_timezone_set('Europe/London');

				if (PHP_SAPI == 'cli')
					die('This example should only be run from a Web Browser');

				/** Include PHPExcel */
				require_once dirname(__FILE__) . '/classes/PHPExcel.php';

				$target_dir = "uploads/";

				$target_file = $target_dir . $result_test[0] . basename($_FILES["fileToUpload"]["name"]);

				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
				shell_exec("chmod 777 " . $target_file);

				$uploadOk = 1;
				$FileType = pathinfo($target_file,PATHINFO_EXTENSION);

				if( $FileType != "xlsx" ){
					echo "Error";
				}

				else{
					$objPHPExcel = PHPExcel_IOFactory::load($target_file);
					$query = "INSERT INTO grub_signings(GRUB_ID,S_ID) VALUES";
					$final_query = "";
					$i = 'A';
					$activeSheet = $objPHPExcel->getActiveSheet();
					$n = 1;

					while (1) {
						$value = $activeSheet->getCell($i.($n + 1))->getValue();
						echo $value;
						if($value == "" || $value == "=#REF!" || $value == " " || $value == "  ")
							break;

						echo substr($value, 0, 4) . substr($value, -4, 4);

						$check_query = "Select * from `STUDENT` where S_ID like '%" . substr($value, 0, 4) . substr($value, -4, 4) . "' and IDNO = '" . $value . "'";

						$check_result = mysqli_fetch_array(mysqli_query($conn,$check_query));

						if ($check_result) {
							$final_query = $query . "('" . $grub_id . "','" . $check_result[0] . "'),";
							$n++;
						}

						else{
							$n++;
							continue;
						}
					}
					$final_query = substr($final_query, 0, strlen($final_query) - 1);
					echo $final_query;
					mysqli_query($conn, $final_query);

					header('location:./../dashboard.php');
				}



			}
			else{
				header('location:./../dashboard.php?error=1');

			}
		}

		else {
			header('location:./../dashboard.php');
		}

	}

	else {
		echo $_POST['date1'] . " " . $_POST['bld1'];
		header('location:./../dashboard.php?error=1');
	}

}


elseif( isset($_GET['action']) && $_GET['action'] == 'add_new_grub'){

	if( isset($_SESSION['username'])  && $_SESSION['privilege'] == 3 ) {

		$query = "Select max(grub_id) from grubs";
		$result = mysqli_fetch_array( mysqli_query($conn, $query ) );
		if ( $result )
			$new_id = $result[0] + 1;
		else
			$new_id = 1;

		$query_2 = "INSERT INTO GRUBS(GRUB_ID,NAME,MESS,WRITE_UP,S_ID) VALUES('" . $new_id . "','','','','" . $_SESSION['username'] . "')";
		$result_2 = mysqli_query($conn,$query_2);

		if($result_2)
			header('location:./../' . ADMIN_URL . 'edit_grub.php?grub_id=' . $new_id);

		else
			header('location:./../dashboard.php?error=1');
	}

	else {
		echo $_POST['date1'] . " " . $_POST['bld1'];
		header('location:./../dashboard.php?error=1');
	}

}


elseif( isset($_GET['action']) && $_GET['action'] == 'cancel_signing'){

	if( isset($_SESSION['username'])  && $_SESSION['privilege'] == 0 ) {
		if ( isset( $_GET['grub_id'] ) ) {

			$grub_id = $_GET['grub_id'];

			$query = "Select * from grub_signings where S_ID = '" . $_SESSION['username'] . "' and GRUB_ID = '" . $grub_id . "'";
			$result = mysqli_fetch_array( mysqli_query( $conn,$query ) );

			if ( $result ){
				$query_2 = "DELETE FROM GRUB_SIGNINGS where S_ID = '" . $_SESSION['username'] . "' and GRUB_ID = '" . $grub_id . "'";
				$result_2 = mysqli_query($conn, $query_2);

				if($result_2)
					header('location:./../dashboard.php');
				else
					header('location:./../dashboard.php?error=1');
			}
			else
				header('location:./../dashboard.php?error=1');
		}
		else
			header('location:./../dashboard.php?error=1');
	}

	else {
		echo $_POST['date1'] . " " . $_POST['bld1'];
		header('location:./../dashboard.php?error=1');
	}

}


?>
