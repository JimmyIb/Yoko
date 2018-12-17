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
	else if(isset($_POST['']))
	{



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
				<li><a href="#">Client Manager</a></li>
				<li><a href="pointsTierManager.php">Points Tier Manager</a></li>
				<li><a href="controlPanel.php">Control Panel</a></li>
			</nav>
			<link rel="stylesheet" href="../css/template.css"/>
        	<link rel="stylesheet" href="../css/deliverable5.css"/>
		</header>
		<div id="content">
		<form method="post">
			<input type="text" name="searchfor" id="searchInputText" placeholder="Name to search">
			<input type="submit" name="search" id="filterButton" value="Filter"></br>
			<input type="submit" name="addClient" value="Add Client"></br>

			<table>
				<tr>
					<th>client ID</th>
					<th>points</th>
					<th>name</th>
					<th>address</th>
					<th>age group</th>
					<th>email</th>
					<th>phone number</th>
					<th>occupation</th>
				</tr>
				
				<?php while($row = mysqli_fetch_array($results)):?>
				<tr>
					<td><?php echo $row['clientid'];?></td>
					<td><?php echo $row['points'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['address'];?></td>
					<td><?php echo $row['agegroup'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['phonenumber'];?></td>
					<td><?php echo $row['occupation'];?></td>
					<td><?php echo "<button><a href=delClient.php?id=".$row['clientid'].">Delete</a></button>";?></td>
					<td><?php echo "<button><a href=updateClient.php?id=".$row['clientid'].">Update</a></button>";?></td>
				</tr>
				<?php endwhile;?>
			</table>
			<button type="button"><a href="login.php" style="text-decoration: none; color: black">Log out</a></button>
		</form>
		</div>
	</body>
</html>