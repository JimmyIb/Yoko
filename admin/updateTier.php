<?php
	
	include '../php/validation.php';
	include '../php/sqlHelper.php';

	$errorPoints = $errorName = "";
    
    $query = getRow("pointstier", "tierid", $_GET['id']);
	$result = sendToDB('localhost', 'root', '', 'yokotest', $query);
	$row = mysqli_fetch_array($result);

	$tierid = $row['tierid'];
    $points = $row['points'];
    $name = $row['name'];

	if(isset($_POST['update']))
	{

		//INITIALIZING A FEW VARS
		$points = $_POST['points'];
        $name = $_POST['name'];

		//VARS FOR ERROR
        $errorFound = false;

        if(empty($name))
        {

            $errorFound = true;
            $errorName = "Name is required.";

        }
        else
        {

            $errorName = checkNoWhiteSpace($name);
            if($errorName != "")
                $errorFound = true;

        }

        if(empty($points))
        {

            $errorFound = true;
            $errorPoints = "Points is required.";

        }

        if($errorFound === false){

        	$query = updateRowTier($tierid, $points, $name);
            $results = sendToDB('localhost', 'root', '', 'yokotest', $query);

            if($results)
				header("refresh:1; url=pointsTierManager.php");
			else
				echo "Not Updated";


        }
		
	}

?>
<html>
	<head>
		<title>Add To Database</title>
		<link rel="stylesheet" href="../css/template.css"/>
        <link rel="stylesheet" href="../css/deliverable5.css"/>
	</head>
	
	<body>
		<header>
			<a href="#">
				<img src="../images/pgnlogo.png" alt="logo" id="logo"/>
			</a>
		</header>
			<form method="post">
					<p>points</p><input type=text name=points maxlength="5" value="<?= $points ?>"></br>
					<span class="error"><?= $errorPoints ?></span></br>
					<p>name</p><input type=text name=name maxlength="40" value="<?= $name ?>"></br>
					<span class="error"><?= $errorName ?></span></br>
				<input type="submit" value="Add To Database" name="update">

			</form>
	</body>
</html>
