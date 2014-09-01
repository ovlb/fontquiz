<?php
class Font {
	// Properties of the Article class
	
	/* ------ 
	Set vars
	------ */
	
	// The ID used in the db
	public $idfonts = null;
	
	// Store publication date
	public $publicationDate = null;
	
	// The name of the font, e, amp and a
	public $name = null;
	//public $letter_e = null;
	//public $letter_amp = null;
	//public $letter_a = null;
	
	public function __construct( $data=array() ) {
    if ( isset( $data['idfonts'] ) ) $this->idfonts = (int) $data['idfonts'];
    if ( isset( $data['publicationDate'] ) ) $this->publicationDate = (int) $data['publicationDate'];
    if ( isset( $data['name'] ) ) $this->name = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['name'] );
    //if ( isset( $data['summary'] ) ) $this->summary = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['summary'] );
    /7if ( isset( $data['content'] ) ) $this->content = $data['content'];
    
    }
    
    public function storeFormValues($params) {
	    
	    // Store all parameters
	    $this->__construct($params);
	    
	    // Parse and store the publication date
		if ( isset($params['publicationDate']) ) {
			$publicationDate = explode ( '-', $params['publicationDate'] );
 
			if ( count($publicationDate) == 3 ) {
			list ( $y, $m, $d ) = $publicationDate;
			$this->publicationDate = mktime ( 0, 0, 0, $m, $d, $y );
			}
		}
    }
    
	/**
	* Returns an Article object matching the given article ID
	*
	* @param int The article ID
	* @return Article|false The article object, or false if the record was not found or there was a problem
	*/
 
	public static function getById($idfonts) {
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM articles WHERE idfonts = :id";
		$st = $conn->prepare( $sql );
	    $st->bindValue( ":id", $idfonts, PDO::PARAM_INT );
	    $st->execute();
	    $row = $st->fetch();
		$conn = null;
		if ($row) return new Font( $row );
	}
	
	
} ?>

