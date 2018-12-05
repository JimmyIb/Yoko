<?php
	
	print_r($_POST);

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'yokotest';

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!empty($_POST))
	{

		$clientID = mysqli_real_escape_string($conn, rand(1,99999));
		$pointsTierID = mysqli_real_escape_string($conn, 0);
		$points = mysqli_real_escape_string($conn, 0);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
		$occupation = mysqli_real_escape_string($conn, $_POST['occupation']);

		$sql = "INSERT INTO client (clientID, pointsTierID, points, name, address, email, phoneNum, occupation) VALUES ('$clientID', '$pointsTierID', '$points', '$name', '$address', '$email', '$phone', '$occupation')";

		mysqli_query($conn, $sql);

	}

?>