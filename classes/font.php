<?php
class Font {
	// Properties of the Article class
	
	/* ------ 
	Set vars
	------ */
	
	// The ID used in the db
	public $idfonts = null;
	
	// The name of the font, e, amp and a
	public $name = null;
	public $style = null;
	public $letter_e = null;
	//public $letter_a = null;
	
	public function __construct( $data=array() ) {
    if ( isset( $data['idfonts'] ) ) $this->idfonts = (int) $data['idfonts'];
    if ( isset( $data['style'] ) ) $this->style = preg_replace ( "/[^\.\- a-zA-Z0-9()]/", "", $data['style'] );
    if ( isset( $data['letter_e'] ) ) $this->letter_e = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['letter_e'] );
    //if ( isset( $data['content'] ) ) $this->content = $data['content'];
    
    }
    
    public function storeFormValues($params) {   
	    // Store all parameters
	    $this->__construct($params);

    }
    
	/**
	* Returns an Article object matching the given article ID
	*
	* @param int The article ID
	* @return Article|false The article object, or false if the record was not found or there was a problem
	*/
 
	public static function getById($idfonts) {
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM fonts WHERE idfonts = :id";
		$st = $conn->prepare( $sql );
	    $st->bindValue( ":id", $idfonts, PDO::PARAM_INT );
	    $st->execute();
	    $row = $st->fetch();
		$conn = null;
		if ($row) return new Font( $row );
	}
	
	 
	/**
	* Returns all (or a range of) Article objects in the DB
	*
	* @param int Optional The number of rows to return (default=all)
	* @param string Optional column by which to order the articles (default="publicationDate DESC")
	* @return Array|false A two-element array : results => array, a list of Article objects; totalRows => Total number of articles
	*/
 
	public static function getList( $numRows=1000000, $order="name" ) {
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM fonts
            ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";
		$st = $conn->prepare( $sql );
		$st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
		$st->execute();
		
		// Create an array tohold the results
		$list = array();

		// Add the results to the list array
		while ( $row = $st->fetch() ) {
			$article = new Font( $row );
			$list[] = $article;
		}
 
		// Now get the total number of articles that matched the criteria
		$sql = "SELECT FOUND_ROWS() AS totalRows";
		$totalRows = $conn->query( $sql )->fetch();
		$conn = null;
		return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
	}
 
 
	/**
	* Inserts the current Article object into the database, and sets its ID property.
	*/
 
	public function insert() {
 
		// Does the Article object already have an ID?
		if ( !is_null( $this->idfonts ) ) trigger_error ( "Article::insert(): Attempt to insert an Article object that already has its ID property set (to $this->idfonts).", E_USER_ERROR );
 
		// Insert the Article
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "INSERT INTO fonts (name, style, letter_e) VALUES (:name, :style, :letter_e)";
		$st = $conn->prepare ( $sql );
		$st->bindValue( ":name", $this->title, PDO::PARAM_STR );
		$st->bindValue(':style', $this->style, PDO::PARAM_STR);
		$st->bindValue( ":letter_e", $this->summary, PDO::PARAM_STR );
		$st->execute();
		$this->idfonts = $conn->lastInsertId();
		$conn = null;
	}

	/**
	* Updates the current Article object in the database.
	*/
 
	public function update() {
		// Does the Article object have an ID?
		if ( is_null( $this->idfonts ) ) trigger_error ( "Article::update(): Attempt to update an Article object that does not have its ID property set.", E_USER_ERROR );
    
		// Update the Article
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "UPDATE fonts SET name=:name,, style=:style, letter_e=:letter_e WHERE idfonts = :idfonts";
		$st = $conn->prepare ( $sql );
		$st->bindValue( ":name", $this->name, PDO::PARAM_STR );
		$st->bindValue( ":style", $this->name, PDO::PARAM_STR );
		$st->bindValue( ":letter_e", $this->letter_e, PDO::PARAM_STR );
		$st->bindValue( ":idfonts", $this->idfonts, PDO::PARAM_INT );
		$st->execute();
		$conn = null;
	}


	/**
	* Deletes the current Article object from the database.
	*/

	public function delete() {
 
		// Does the Article object have an ID?
		if ( is_null( $this->idfonts ) ) trigger_error ( "Article::delete(): Attempt to delete an Article object that does not have its ID property set.", E_USER_ERROR );
 
		// Delete the Article
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$st = $conn->prepare ( "DELETE FROM fonts WHERE idfonts = :idfonts LIMIT 1" );
		$st->bindValue( ":idfonts", $this->idfonts, PDO::PARAM_INT );
		$st->execute();
		$conn = null;
	}
}
?>