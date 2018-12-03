<?php

	if(isset($_POST['update']))
	{

		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'yokotest';
		
		$sql = "INSERT INTO client (clientid, pointstierid, points, name, address, email, phonenum, occupation) VALUES ('$_POST[clientid]', '$_POST[pointstierid]', '$_POST[points]', '$_POST[name]', '$_POST[address]', '$_POST[email]', '$_POST[phonenum]', '$_POST[occupation]')";
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if(mysqli_query($conn, $sql))
			header("refresh:1; url=databaseSite.php");
		else
			echo "Not Added";
	}

?>
<html>
	<head>
		<title>Log in</title>
		<link rel="stylesheet" href="logincss.css"/>
		<style>

			table, tr, th, td{

				border: 1px solid black;

			}

		</style>
	</head>
	
	<body>
		<header>
			<a href="#">
				<img src="images/pgnlogo.png" alt="logo" id="logo"/>
			</a>
		</header>
		<form method="post">
			<table>
				<tr>
					<th>client ID</th>
					<th>pointsTierID</th>
					<th>points</th>
					<th>name</th>
					<th>address</th>
					<th>email</th>
					<th>phone number</th>
					<th>occupation</th>
				</tr>
				<tr>
					<td><input type=text name=clientid></td>
					<td><input type=text name=pointstierid></td>
					<td><input type=text name=points></td>
					<td><input type=text name=name></td>
					<td><input type=text name=address></td>
					<td><input type=text name=email></td>
					<td><input type=text name=phonenum></td>
					<td><input type=text name=occupation></td>
				</tr>
			</table>

			<input type="submit" value="Add To Database" name="update">

		</form>
	</body>
</html>
