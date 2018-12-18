<?php
	include 'helper.php';
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'yokotest';
	
	$query = "SELECT * FROM client WHERE clientid='$_GET[id]'";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$result = mysqli_query($conn, $query);

	if(isset($_POST['update']))
	{

		if(empty($_POST['clientid']) || empty($_POST['name']) || empty($_POST['email']))
		{

			$message = "Please provide a client ID, a name and an email";
			echo "<script type='text/javascript'>alert('$message');</script>";

		}
		else
		{

			$servername = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'yokotest';

			$sql = "UPDATE client SET name = '$_POST[name]', agegroup = '$_POST[agegroup]', pointstierid = '$_POST[pointstierid]', points = '$_POST[points]', address = '$_POST[address]', email = '$_POST[email]', phoneNum = '$_POST[phonenum]', occupation = '$_POST[occupation]' WHERE clientID='$_POST[clientid]'";
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			if(mysqli_query($conn, $sql))
				header("refresh:1; url=../databaseSite.php");
			else
				echo "Not Updated";

		}

		
	}

?>
<html>
	<head>
		<title>Update</title>
		<link rel="stylesheet" href="../css/template.css"/>
		<link rel="stylesheet" href="../css/databasecss.css"/>
	</head>
	
	<body>
		<header>
			<a href="#">
				<img src="../images/pgnlogo.png" alt="logo" id="logo"/>
			</a>
			<!--<h1> Join Us!</h1>-->
		</header>
		<form method="post">
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
				<tr>
					<?php $row = mysqli_fetch_array($result);

						editForm($row);

					?>
				</tr>
			</table>
			<input type="submit" value="update" name="update">

		</form>
	</body>
</html>

