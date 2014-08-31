<?php
	// You will have to add your own db credentials to get this up and running
	require_once('./credentials.php');
 	mysqli_connect($mySQLHost, $mySQLUser, $mySQLPassword, $mySQLDatabase) or die('Have you added your db credentials in connect.php? <br>
 	Error: ' . mysqli_error());
 	
 	$hashedPW = password_hash('5ph4%xeYj@ky', PASSWORD_DEFAULT).'\n';
 	echo $hashedPW;
?>