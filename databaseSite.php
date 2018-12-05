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
		<link rel="stylesheet" href="css/template.css"/>
		<link rel="stylesheet" href="css/databasecss.css"/>
		<title>Client Information</title>
	</head>
	
	<body>
		<header>
			<a href="#">
				<img src="images/pgnlogo.png" alt="logo" id="logo"/>
			</a>
			<!--<h1> Join Us!</h1>-->
			<nav id="menu">
				<li><a href="#">JOIN US</a></li>
				<li><a href="#">ABOUT US</a></li>
				<li><a href="#">MENU</a></li>
				<li><a href="#">HOME</a></li>
			</nav>
		</header>
		
		<form method="post">
			<input type="text" name="searchfor" placeholder="Name to search"><br>
			<input type="submit" name="search" id="searchName" value="Filter"><br>

			<button><a href="php/add.php">Add To Database</a></button>

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
					<td><?php echo "<button><a href=php/delete.php?id=".$row['clientid'].">Delete</a></button>";?></td>
					<td><?php echo "<button><a href=php/update.php?id=".$row['clientid'].">Update</a></button>";?></td>
				</tr>
				<?php endwhile;?>
			</table>
			<button type="button"><a href="login.html" style="text-decoration: none; color: black">Log out</a></button>
		</form>
	</body>
</html>