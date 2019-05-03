<?php
class Owner{
	private $ownerID;
	private $database;
	function __construct($ownerID, $database){
		$this->ownerID = $ownerID;
		$this->database = $database;
		
	}
	function addDog($name, $breed, $age, $sex, $color){
		$params = array(
					'name' => $name,
					'breed' => $breed,
					'age' => $age,
					'sex' => $sex,
					'color' => $color,
					'id' => $this->ownerID
					);
		$sql = file_get_contents('sql/addDog.sql');
		$statement = $this->database->prepare($sql);
		$statement->execute($params);
	}
}
?>