<?php

$servername = "mysql.hostinger.in";
$username = "u660987572_ssms";
$password = "ssms1234";
$dbname="u660987572_ssms";

// Create connection
$conn= new mysqli($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}

?>