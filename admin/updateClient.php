<?php
	
	include '../php/validation.php';
	include '../php/sqlHelper.php';

	$errorName = $errorEmail = $errorAddress = $errorPhone = $errorOccupation = "";

	$query = getRow("client", "clientid", $_GET['id']);
	$result = sendToDB('localhost', 'root', '', 'yokotest', $query);
	$row = mysqli_fetch_array($result);

	$clientid = $row['clientid'];
	$points = $row['points'];
    $name = $row['name'];
    $email = $row['email'];
    $address = $row['address'];
    $agegroup = $row['agegroup'];
    $phone = $row['phonenumber'];
    $occupation = $row['occupation'];

	if(isset($_POST['update']))
	{

		//INITIALIZING A FEW VARS
		$points = $_POST['points'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $agegroup = $_POST['agegroup'];
        $phone = $_POST['phonenum'];
        $occupation = $_POST['occupation'];
		
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

        if(empty($email))
        {

            $errorFound = true;
            $errorEmail = "Email is required.";

        }
        else
        {

            $errorEmail = checkEmail($email);
            if($errorEmail != "")
                $errorFound = true;

        }

        if(!empty($phone))
        {

            $errorPhone = checkPhone($phone);
                if($errorPhone != "")
                    $errorFound = true;

        }

        if($errorFound === false){

        	$query = updateRowClient($clientid, $points, $name, $address, $agegroup, $email, $phone, $occupation);
            $results = sendToDB('localhost', 'root', '', 'yokotest', $query);

            if($results)
				header("refresh:1; url=clientManager.php");
			else
				echo "Not Updated";


        }
		
	}

?>
<html>
	<head>
		<title>Update Client</title>
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
					<p>name</p><input type=text name=name maxlength="40" value="<?= $name ?>"></br>
						<span class="error"><?= $errorName ?></span></br>
					<p>age group</p>
					<select name=agegroup>
						<option value="noAgeGroup"></option>
						<option value="0-18">Under 18</option>
						<option value="18to25">18-25</option>
						<option value="25to60">25-60</option>
						<option value="50andolder">60 and older</option>
					</select></br>
					<p>address</p><input type=text name=address maxlength="40" value="<?= $address ?>"></br>
					<p>email</p><input type=text name=email maxlength="80" value="<?= $email ?>"></br>
					<span class="error"><?= $errorEmail ?></span></br>
					<p>phone number</p><input type=text name=phonenum maxlength="10"value="<?= $phone ?>"></br>
					<span class="error"><?= $errorPhone ?></span></br>
					<p>occupation</p><input type=text name=occupation maxlength="40" value="<?= $occupation ?>"></br>
					<span class="error"><?= $errorOccupation ?></span></br>
				<input type="submit" value="Add To Database" name="update">

			</form>
	</body>
</html>
