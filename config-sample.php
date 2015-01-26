<?php
	/*
		Fill out the below parameters and save this file als config.php
	*/
	
	/* ------------
		MISC
	------------ */
	// Root of your project, including http(s)://
	define('QUIZ_ROOT', 'WEB ROOT');
	
	
	/* ------------
		DATABASE
	------------ */
	
	// Enter your details below
	define('DB_DSN', 'mysql:host=HOST;dbname=NAME OF DB;charset=utf8');
	define('DB_USERNAME', 'USER');
	define('DB_PASS', 'PASSWORD');
	
	try {
		$pdo = new PDO (DB_DSN, DB_USERNAME, DB_PASS);
	} catch(PDOException $e) {
		echo('Ooops. Es gab einen Fehler. ' . $e->getMessage());
	}
?>