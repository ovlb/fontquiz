<?php
// Disable this in your live environment, for debugging purposes only
ini_set("display_errors", true);

// You may want to change this to your own timezone
date_default_timezone_set("Europe/Berlin");

// You will have to add your own db credentials to get this up and running	
define("DB_DSN", "mysql:host=host-fontquiz;dbname=fonts")
define("mySQLHost", "host-fontquiz")
define("mySQLUser", "fontquiz");
define("mySQLPassword", "MySQLPassword");
define("mySQLDatabase", "fonts");
define("CLASS_PATH", "classes");
define("TEMPLATE_PATH", "views");
// And please change this.
define("ADMIN_USER", "admin");
define("ADMIN_PW", "password");

// Include the Font class, which is needed to store fonts for your quiz
require(CLASS_PATH . '/font.php');

function handleException( $exception ) {
	echo 'Sorry, a problem occurred. Please try later.';
	error_log( $exception->getMessage() );
}

set_exception_handler('handleException');
?>

