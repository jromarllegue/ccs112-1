<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db";

$mysqli = new mysqli($servername, $username, $password, $database);

if($mysqli->connect_error) {
	die("Error" . $mysqli->connect_error);
} else {
	echo "";
}

?>