<?
	require_once('config.php'); // Load config
	
	function DbConnect($query) {
		$db = new PDO(DB_DSN, DB_USERNAME, DB_PASS);
		
		$stmt = $db->query($query);
		
		try {
			return $stmt;
		} catch(PDOException $e) {
			echo('Ooops. Es gab einen Fehler. ' . $e->getMessage());
		}
	}

?>