<?php

	if(isset($_POST['update']))
	{
/*
		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'yokotest';
		
		$sql = "INSERT INTO client (clientid, pointstierid, points, name, address, email, phonenum, occupation) VALUES ('$_POST[clientid]', '$_POST[pointstierid]', '$_POST[points]', '$_POST[name]', '$_POST[address]', '$_POST[email]', '$_POST[phonenum]', '$_POST[occupation]')";
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if(mysqli_query($conn, $sql))
			header("refresh:1; url=../databaseSite.php");
		else
			echo "Not Added";
*/
	include 'helper.php';
	addRecord();
		
	}

?>
<html>
	<head>
		<title>Log in</title>
		<link rel="stylesheet" href="../css/template.css"/>
		<link rel="stylesheet" href="../css/databasecss.css"/>
		
	</head>
	
	<body>
		<header>
			<a href="#">
				<img src="../images/pgnlogo.png" alt="logo" id="logo"/>
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
				<table>
					<tr>
						<th>client ID</th>
						<th>pointsTierID</th>
						<th>points</th>
						<th>name</th>
						<th>address</th>
						
					</tr>
		
					<tr>
						<td><input type=text name=clientid></td>
						<td><input type=text name=pointstierid></td>
						<td><input type=text name=points></td>
						<td><input type=text name=name></td>
						<td><input type=text name=address></td>
					</tr>
					
				</table>
				<br/>
				<table>
					<tr>
						<th>email</th>
						<th>phone number</th>
						<th>occupation</th>
						<th>age group</th>
					</tr>
					<tr>
						<td><input type=text name=email></td>
						<td><input type=text name=phonenum></td>
						<td><input type=text name=occupation></td>
						<td><input type=text name=agegroup></td>
					</tr>
				</table>

				<input type="submit" value="Add To Database" name="update">

			</form>
	</body>
</html>
