<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'yokotest';

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$sql = "DELETE FROM client WHERE clientid='$_GET[id]'";

	if(mysqli_query($conn, $sql))
		header("refresh:1; url=databaseSite.php");
	else
		echo "Not deleted";

?>

UPDATE `client` SET `name` = 'rubenita' WHERE `client`.`clientid` = 37915;