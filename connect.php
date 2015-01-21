<?php
	// You will have to add your own db credentials to get this up and running
	require_once('./fontquiz_res/credentials.php');
 	$con = mysqli_connect($mySQLHost, $mySQLUser, $mySQLPassword, $mySQLDatabase) or die('Have you added your db credentials in connect.php? <br>
 	Error: ' . mysqli_connect_error());
?>