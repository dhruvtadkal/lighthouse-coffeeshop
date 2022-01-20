<?php

function Connect()
{
	$dbhost = "localhost";
	$dbuser = "php";
	$dbpass = "test123";
	$dbname = "lighthouse";

	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

	return $conn;
}
?>