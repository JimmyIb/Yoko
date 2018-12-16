<?php


	if(isset($_POST['customers']))
	{

		header("Location: clientManager.php");

	}
	else if(isset($_POST['pointsTier']))
	{

		header("Location: pointsTierManager.php");

	}


?>
<html>
	<head>
		<title>Control Panel</title>
	</head>
	
	<body>
		<header>
			<h1>Main Panel</h1>
			<link rel="stylesheet" href="../css/template.css"/>
        	<link rel="stylesheet" href="../css/deliverable5.css"/>
		</header>
		<div id="content">
		<form method="post">
			<input type="submit" name="customers" value="Manage Customers"></br>
			<input type="submit" name="pointsTier" value="Manage Points Tiers"></br>
			<input type="submit" name="account" value="Manage Account"></br>
		</form>
		</div>
	</body>
</html>