<?php
	
	include '../php/validation.php';
	include '../php/sqlHelper.php';

	$errorName = $errorEmail = $errorAddress = $errorPhone = $errorOccupation = "";
    $points = $name = $email = $address = $phone = $occupation = "";

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

        	$query = addRowClient(0, $name, $address, $agegroup, $email, $phone, $occupation);
            $results = sendToDB('localhost', 'root', '', 'yokotest', $query);

            if($results)
				header("refresh:1; url=clientManager.php");
			else
				echo "Not deleted";


        }
		
	}

?>
<html>
	<head>
		<title>Add To Database</title>
		<link rel="stylesheet" href="../css/template.css"/>
        <link rel="stylesheet" href="../css/deliverable5.css"/>
        <link rel="stylesheet" href="../css/addClientCSS.css"/>
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
                            <h1>Add New Client</h1>
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
                            <button type="submit" value="Add To Database" name="update" class="button">Add Client!</button>
                        </div>
                    </div>
                   
                </div>
            </form>
        </div>
            
		
	</body>
</html>
