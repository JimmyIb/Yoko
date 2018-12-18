<?php
	
	function addRowClient($points, $name, $address, $agegroup, $email, $phonenumber, $occupation){

		$clientid = rand(0,99999);

		return "INSERT INTO client (clientid, points, name, address, agegroup, email, phonenumber, occupation) VALUES ('$clientid', '$points', '$name', '$address', '$agegroup', '$email', '$phonenumber', '$occupation')";

	}

	function updateRowClient($clientid, $points, $name, $address, $agegroup, $email, $phonenumber, $occupation){

		return "UPDATE client SET points = '$points', name ='$name', address = '$address', agegroup = '$agegroup', email = '$email', phonenumber = '$phonenumber', occupation = '$occupation' WHERE clientid = '$clientid'";

	}

	function updateRowTier($tierid, $points, $name){

		return "UPDATE pointstier SET points = '$points', name ='$name' WHERE tierid = '$tierid'";

	}

	function addRowPointsTier($points, $name){

		$tierId = rand(0, 99999);

		return "INSERT INTO pointstier (tierid, points, name) VALUES ('$tierId', '$points', '$name')";

	}

	function deleteRow($table, $col, $id){

		return "DELETE FROM ".$table." WHERE ".$col."=".$id;

	}

	function getRow($table, $col, $id){

		return "SELECT * FROM ".$table." WHERE ".$col."='$id'";

	}

	function searchFor($table, $col, $searchFor)
	{

		return "SELECT * FROM ".$table." WHERE ".$col." LIKE '%".$searchFor."%'";

	}

	function sortTable($table, $column)
	{

		return "SELECT * FROM ".$table." ORDER BY '.$column'";

	}

	function sendToDB($servername, $username, $password, $dbname, $query)
	{

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$results = mysqli_query($conn, $query);

		if($results){

			return $results;
			
		}

		return false;


	}

?>