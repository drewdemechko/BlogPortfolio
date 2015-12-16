<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "blogdb";

//Create connection var
$dbconn = mysqli_connect($servername, $username, $password, $database);

//Check connection
if(!$dbconn){
	die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully.";
?>