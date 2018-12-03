<?php

	if(isset($_POST['search']))
	{

		$searchfor = $_POST['searchfor'];
		$query = "SELECT * FROM client WHERE name LIKE '%".$searchfor."%'";
		$results = filterTable($query);

	}
	else
	{

		$query = "SELECT * FROM client";
		$results = filterTable($query);

	}

	function filterTable($query)
	{

		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'yokotest';

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$filterResults = mysqli_query($conn, $query);
		return $filterResults;

	}

?>

<html>
	<head>
		<title>Log in</title>
		<style>

			table, tr, th, td{

				border: 1px solid black;

			}

		</style>
	</head>
	
	<body>
		<header>

		</header>

		<form method="post">
			<input type="text" name="searchfor" placeholder="Name to search"><br>
			<input type="submit" name="search" value="Filter"><br>

			<a href="add.php">Add To Database</a>

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
					<td><?php echo $row['clientid'];?></td>
					<td><?php echo $row['pointstierid'];?></td>
					<td><?php echo $row['points'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['address'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['phonenum'];?></td>
					<td><?php echo $row['occupation'];?></td>
					<td><?php echo "<a href=delete.php?id=".$row['clientid'].">Delete</a>";?></td>
					<td><?php echo "<a href=update.php?id=".$row['clientid'].">Update</a>";?></td>
				</tr>
				<?php endwhile;?>
			</table>
			<button type="button"><a href="login.html" style="text-decoration: none; color: black">Log out</a></button>
		</form>
	</body>
</html>