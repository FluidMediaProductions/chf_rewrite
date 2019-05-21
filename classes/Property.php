<?php

class Property {
	//ID of the property - used in URL and for querying the database
	public $id = null;
	
	//Date it was added / updated / changed
	public $modifiedDate = null;
	
	//Name / Number of the house
	public $houseName = null;
	
	//Full 3 line address
	public $address = null;
	
	//Price, normalized to £x.dd where x is a whole number and dd is a two-decimal place denominator.
	public $price = null;
	
	//Text scraped from database
	public $description = null;
	public $features = null;
	//Floor plan URL (should be internal)
	public $map = null;
	
	//Make a new instance of Property.
	public function __construct($data=array()) {
		if(isset($data['id'])) $this->id = (int)$data['id'];
		if(isset($data['modifiedDate'])) $this->modifiedDate = $data['modifiedDate'];
		if(isset($data['houseName'])) $this->houseName = $data['houseName'];
		if(isset($data['address'])) $this->address = $data['address'];
		if(isset($data['price'])) $this->price = $data['price'];
		//Santise inputs - helps against SQL injection.
		if(isset($data['description'])) preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['description']);
		if(isset($data['features'])) $this->features = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['features']);
		if(isset($data['map'])) $this->map = $data['map'];
	}
	
	//Modify the date to keep track of changes
	public function storeUpdate($params) {
		$this->__construct($params);
		
		if(isset($params['modifiedDate'])) {
			$modifiedDate = explode('-', $params['modifiedDate']);
			
			if(count($modifiedDate == 3)) {
				list($y, $m, $d) = $modifiedDate;
				$this->modifiedDate = mktime(0, 0, 0, $m, $d, $y);
			}
		}
	}
	
	//Get the property that has this unique identifier.
	//NOTE: THE QUERY MUST BE MODIFIED
	public static function getById($id) {
		//Connect to database with new instance
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		//Prepare a plaintext SQL query. Select based on the time modified, and where the ID matches.
		$sql = "SELECT *, UNIX_TIMESTAMP(modifiedDate) AS modifiedDate FROM properties WHERE id = :id";
		$st = $conn->prepare($sql);
		//Set the variable ID dynamically.
		$st->bindValue(":id", $id, PDO::PARAM_INT);
		//Get the rows recursively.
		$st->execute();
		$row = $st->fetch();
		//Close the connection - frees resources.
		$conn = null;
		
		//If something is returned, make a new Property using the details and pass that along.
		if($row) return new Property($row);
	}
	
	public static function getList($numRows=5, $order="modifiedDate DESC") {
		//Same as above. Set up the connection and query.
		//Get all the properties currently in the database.
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(modifiedDate) AS modifiedDate
			FROM properties ORDER BY " . $conn->quote($order) . " LIMIT :numRows";
		$st = $conn->prepare($sql);
		$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
		$st->execute();
		$list = array();
		
		while ($row = $st->fetch()) {
			$property = new Property($row);
			$list[] = $article;
		}
		
		//Now count them.
		$sql = "SELECT FOUND_ROWS() AS totalRows";
		$totalRows = $conn->query($sql)->fetch();
		$conn = null; //Close the connection.
		return (array("results"=>$list, "totalRows"=>$totalRows[0]));
	}
	
	
	//Insert the current Property instance into the database - this is not expected to be used manually.
	public function insert() {
		if(!is_null($this->id)) trigger_error("That property ID already exists in the database!". E_USER_ERROR);
		
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$sql = "INSERT INTO properties (
					modifiedDate,
					houseName,
					address,
					price,
					description,
					features,
					map
				) VALUES (
					FROM_UNIXTIME(:modifiedDate),
					:houseName,
					:address,
					:price,
					:description,
					:features,
					:map
				)";
		$st = $conn->prepare($sql);
		$st->bindValue(":modifiedDate", $this->modifiedDate, PDO::PARAM_INT);
		$st->bindValue(":houseName", $this->houseName, PDO::PARAM_STR);
		$st->bindValue(":address", $this->address, PDO::PARAM_STR);
		$st->bindValue(":price", $this->price, PDO::PARAM_STR);
		$st->bindValue(":description", $this->description, PDO::PARAM_STR);
		$st->bindValue(":features", $this->features, PDO::PARAM_STR);
		$st->bindValue(":map", $this->map, PDO::PARAM_STR);
		$st->execute();
		$this->id = $conn->lastInsertedId();
		$conn = null;
	}
	
	//Like before, remove the current article from the database, this is not expected to be used in code.
	public function delete() {
		if(is_null($this->id)) trigger_error("No ID given for property deletion.", E_USER_ERROR);
		
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$st = $conn->prepare("DELETE FROM properties WHERE id = :id LIMIT 1");
		$st->bindValue(":id", $this->id, PDO::PARAM_INT);
		$st->execute();
		$conn = null;
	
	}
}
?>