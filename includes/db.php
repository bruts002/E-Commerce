<?php

$sql_server = "localhost";
$sql_user = "root";
$sql_pass = "";
$sql_dbname = "ecommerce";
$con = mysqli_connect($sql_server, $sql_user, $sql_pass, $sql_dbname);

if (mysqli_connect_errno()) {
	echo "Failed to connect to MYSQL: " .mysqli_connect_error();
	}

?>