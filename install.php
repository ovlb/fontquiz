<?php

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