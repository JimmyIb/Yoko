<?php

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'yokotest';

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$query = "SELECT * FROM client";

	$results = mysqli_query($conn, $query);

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
			
			<?php while($row = mysqli_fetch_array($results)):?>
			<tr>
				<td><?php echo $row['clientID'];?></td>
				<td><?php echo $row['pointsTierID'];?></td>
				<td><?php echo $row['points'];?></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['address'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['phoneNum'];?></td>
				<td><?php echo $row['occupation'];?></td>
			</tr>
			<?php endwhile;?>
		</table>

	</body>
</html>