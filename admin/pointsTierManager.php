<?php
	
	include '../php/sqlHelper.php';
	include '../php/validation.php';

	if(isset($_POST['search']))
	{

		$searchFor = $_POST['searchfor'];
		$searchResult = checkNoWhiteSpace($searchFor);

		if($searchResult == "")
		{

			$results = filterTable(searchFor($searchFor));

		}else{

			echo $searchResult;

		}

	}
	else if(isset($_POST['addClient']))
	{

		header("Location: addClient.php");

	}
	else
	{

		$results = filterTable("SELECT * FROM client");

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
		<title>Client Manager</title>
	</head>
	
	<body>
		<header>
			<a href="#">
				<img src="../images/pgnlogo.png" alt="logo" id="logo"/>
			</a>
			<nav id="menu">
				<li><a href="clientManager.php">Client Manager</a></li>
				<li><a href="#">Points Tier Manager</a></li>
				<li><a href="controlPanel.php">Control Panel</a></li>
			</nav>
			<link rel="stylesheet" href="../css/template.css"/>
        	<link rel="stylesheet" href="../css/deliverable5.css"/>
		</header>
		<div id="content">
		<form method="post">
			<input type="text" name="searchfor" id="searchInputText" placeholder="Name to search">
			<input type="submit" name="search" id="filterButton" value="Filter"><br>
			
			<button id="addButton"><a href="../php/add.php">Add To Database</a></button><br/><br/>

			<table>
				<tr>
					<th>Tier ID</th>
					<th>Points</th>
					<th>Name</th>
				</tr>
				
				<?php while($row = mysqli_fetch_array($results)):?>
				<tr>
					<td><?php echo $row['tierid'];?></td>
					<td><?php echo $row['points'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo "<button><a href=php/delete.php?id=".$row['clientid'].">Delete</a></button>";?></td>
					<td><?php echo "<button><a href=php/update.php?id=".$row['clientid'].">Update</a></button>";?></td>
				</tr>
				<?php endwhile;?>
			</table>
			<button type="button"><a href="login.php" style="text-decoration: none; color: black">Log out</a></button>
		</form>
		</div>
	</body>
</html>