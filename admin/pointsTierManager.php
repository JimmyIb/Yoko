<?php
	
	include '../php/sqlHelper.php';
	include '../php/validation.php';

	$table = "pointstier";

	if(isset($_POST['search']))
	{

		$searchFor = $_POST['searchfor'];
		$searchResult = checkNoWhiteSpace($searchFor);

		if(empty($searchFor) || $searchResult == "")
		{

			$results = filterTable(searchFor($table, "name", $searchFor));

		}else{

			echo $searchResult;

		}

	}
	else if(isset($_POST['addTier']))
	{

		header("Location: addTier.php");

	}
	else
	{

		$results = filterTable("SELECT * FROM $table");

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
		<title>Points Tier Manager</title>
	</head>
	<link rel="stylesheet" href="../css/template.css"/>
        <link rel="stylesheet" href="../css/deliverable5.css"/>
	<body>
		<header>
			<a href="#">
				<img src="../images/pgnlogo.png" alt="logo" id="logo"/>
			</a>
			<nav id="menu">
				<li><a href="clientManager.php">Client Manager</a></li>
                                <li><a href="pointsTierManager.php">Points Tier Manager</a></li>
				<li><a href="controlPanel.php">Control Panel</a></li>
			</nav>

		</header>
		<div id="content">
		<form method="post">
			<input type="text" class="textbox" name="searchfor" id="searchInputText" placeholder="What are you looking for?">
		        <input type="submit" title="Search" name="search" id="filterButton" value="Search" class="button"> 
                        <br/>
                        <br/>
                        <br/>
                       
                        
                        <button type="submit" name="addTier" value="Add Points Tier" class="button">Add Points Tier</button>
                        
                        <br/>
                        <br/>
                        <br/>
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
					<td><?php echo "<button><a href=delTier.php?id=".$row['tierid'].">Delete</a></button>";?></td>
					<td><?php echo "<button><a href=updateTier.php?id=".$row['tierid'].">Update</a></button>";?></td>
				</tr>
				<?php endwhile;?>
			</table>
                        <br/>
                        <br/>
                        <br/>
			<button type="button" class="button"><a href="login.php" style="text-decoration: none; color: white">Log out</a></button>
		</form>
		</div>
	</body>
</html>
