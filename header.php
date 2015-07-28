<?php 


define('ROOT_URL', "");
define('INCLUDES_URL', ROOT_URL . "includes/");
define('ADMIN_URL', ROOT_URL . "admin/");
define('CORE_URL', ROOT_URL . "core/");
define('WP_URL', "./wordpress/");
define('CLASSES_URL', ROOT_URL . "classes/");

session_start();

include CORE_URL . 'mysql_connect.php';




?>

<html lang="">
<head>
<title>Society for Student Mess Services</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" type="text/css" href="<?php echo INCLUDES_URL;?>font-awesome/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="<?php echo INCLUDES_URL;?>css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo INCLUDES_URL;?>css/style.css" />

<link rel="shortcut icon" type="image/png" href="<?php echo INCLUDES_URL;?>favicon.png"/>
<script type="text/javascript" src="<?php echo INCLUDES_URL;?>js/jquery-2.1.1.min.js"></script>
</head>

    <!--Fixed navigation bar =======================================================================================-->