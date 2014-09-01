<?php
// Disable this in your live environment, for debugging puposes only
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

private function buildDB() {
    $sql = <<<MySQL_QUERY
        CREATE TABLE IF NOT EXISTS `fontquiz`.`fonts` (
			`idfonts` INT NOT NULL,
			`name` VARCHAR(45) NOT NULL,
			`letter_e` VARCHAR(45) NULL,
			`letter_amp` VARCHAR(45) NULL,
			`letter_a` VARCHAR(45) NULL,
		PRIMARY KEY (`idfonts`))
		ENGINE = InnoDB
    )
    MySQL_QUERY;

    return mysql_query($sql); 
}

public function connect() {
    mysqli_connect(mySQLHost , mySQLUser, mySQLPassword, mySQLDatabase) or die("Could not connect. " . mysqli_error());

    return $this->buildDB();
}

?>

