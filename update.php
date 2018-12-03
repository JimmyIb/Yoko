<?php

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'yokotest';

	$query = "SELECT * FROM client WHERE clientid='$_GET[id]'";
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$result = mysqli_query($conn, $query);

	if(isset($_POST['update']))
	{

		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'yokotest';

		$sql = "UPDATE client SET name = '$_POST[name]', pointstierid = '$_POST[pointstierid]', points = '$_POST[points]', address = '$_POST[address]', email = '$_POST[email]', phoneNum = '$_POST[phonenum]', occupation = '$_POST[occupation]' WHERE clientID='$_POST[clientid]'";
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if(mysqli_query($conn, $sql))
			header("refresh:1; url=databaseSite.php");
		else
			echo "Not Updated";
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
					<?php $row = mysqli_fetch_array($result);

							echo "<td><input type=text name=clientid value=".$row['clientid']."></td>";
							echo "<td><input type=text name=pointstierid value=".$row['pointstierid']."></td>";
							echo "<td><input type=text name=points value=".$row['points']."></td>";
							echo "<td><input type=text name=name value=".$row['name']."></td>";
							echo "<td><input type=text name=address value=".$row['address']."></td>";
							echo "<td><input type=text name=email value=".$row['email']."></td>";
							echo "<td><input type=text name=phonenum value=".$row['phonenum']."></td>";
							echo "<td><input type=text name=occupation value=".$row['occupation']."></td>";

					?>
				</tr>
			</table>

			<input type="submit" value="update" name="update">

		</form>
	</body>
</html>
