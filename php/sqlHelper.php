<?php
	
	function addRowClient($points, $name, $address, $agegroup, $email, $phonenumber, $occupation){

		$clientid = rand(0,99999);

		return "INSERT INTO 'client' ('clientid', 'points', 'name', 'address', 'agegroup', 'email', 'phonenumber', 'occupation') VALUES ('".$clientid."', '".$points."', '".$name."', '".$address."', '".$agegroup."', '".$email."', '".$phonenumber."', '".$occupation."')";

	}

	function addRowPointsTier($points, $name){

		$tierId = rand(0, 99999);

		return "INSERT INTO pointstier (tierid, points, name) VALUES (".$points.", ".$name.")";

	}

	function deleteRow($table, $id){

		return "DELETE FROM ".$table." WHERE ".$id;

	}

	function searchFor($table, $col, $searchFor)
	{

		return "SELECT * FROM ".$table." WHERE ".$col." LIKE '%".$searchfor."%'";

	}

	function sortTable($table, $column)
	{

		return "SELECT * FROM ".$table." ORDER BY ".$column;

	}

	function sendToDB($servername, $username, $password, $dbname, $query)
	{

		echo "starting";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$results = mysqli_query($conn, $query);

		if($results)
			return true;


		return false;

	}

?>