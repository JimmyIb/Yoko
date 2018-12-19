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
			<div class="main-content">
            <form class="form-register" method="post">
                <div class="form-register-with-email">
                    <div class="form-white-background">

                        <div class="form-title-row">
                            <h1>Update Tier</h1>
                        </div>
                        
                        <div class="form-row">
                            <label>
                                <span>Points</span>
                               <input type="text" name="points" maxlength="5" value="<?= $points ?>">
                            </label>
                        </div>
                        
                        <div class="form-row">
                            <label>
                                <span>Name *</span>
                                <input type="text" name="name" maxlength="30" value="<?= $name ?>">
                                <span id="error"><?= $errorName; ?></span>
                            </label>
                        </div>
                        
                        <div class="form-row">
                        <button type="submit" value="Add To Database" name="update">Update Tier</button>
                        </div>
                    </div>
                   
                </div>
            </form>
        </div>

	</body>
</html>
