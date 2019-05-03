<?php

function get($key) {
	if(isset($_GET[$key])) {
		return $_GET[$key];
	}
	
	else {
		return '';
	}
}
function removeDog($dogID, $database){
	$params = array(
				'id' => $dogID
				);
	$sql = file_get_contents('sql/removeDog.sql');
	$statement = $database->prepare($sql);
	$statement->execute($params);
}

?>