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
			<div class="main-content">
            <form class="form-register" method="post">
                <div class="form-register-with-email">
                    <div class="form-white-background">

                        <div class="form-title-row">
                            <h1>Update Client Info!</h1>
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
                        
                         <div class ="form-row">    
                        <label>
                            <span>Email *</span>
                            <input type="email" id="emailField" name="email" value="<?= $email ?>">
                            <span id="error"><?= $errorEmail; ?></span>
                        </label>
                        </div>
                        
                        <div class ="form-row">
                            <label>
                                <span>Address</span>
                                <input type="text" name="address" id="address" maxlength="40" value="<?= $address ?>"/>
                            </label>
                        </div>
                        
                        <div class="form-row">
                            <label>
                                <span>Age Group</span>
                                <select id="ageGroup" name="agegroup">
                                    <option value="noAgeGroup"></option>
                                    <option value="0-18">Under 18</option>
                                    <option value="19-25">19-25</option>
                                    <option value="26-60">26-60</option>
                                    <option value="61-more">61 and older</option>
				                </select>
                            </label>
                        </div>
                        
                        <div class="form-row">
                            <label>
                                <span>Phone Number</span>
                                <input id="phonenumField" type="tel" name="phone" maxlength="12" value="<?= $phone ?>">
                                <span id="error"><?= $errorPhone; ?></span>
                            </label>
                        </div>
                        
                        <div class="form-row">
                            <label>
                                <span>Occupation</span>
                                <input type="text" id="occupation" name="occupation" maxlength="20" value="<?= $occupation ?>">
                                <span id="error"><?= $errorOccupation; ?></span>
                            </label>
                        </div>
                        
                       
                        <div class="form-row">
                        <button type="submit" value="Add To Database" name="update">UPDATE</button>
                        </div>
                    </div>
                   
                </div>
            </form>
        </div>
	</body>
</html>
