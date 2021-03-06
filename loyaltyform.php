<?php

    include 'php/validation.php';
    include 'php/sqlHelper.php';
    include 'mail/mailerYoko.php';
    include 'qrcode/qrcodeGenerator.php';

    $errorName = $errorEmail = $errorAddress = $errorPhone = $errorOccupation = "";
    $name = $email = $address = $phone = $occupation = "";

    //IF USER PRESSES SUBMIT BTN
    if(isset($_POST['submit']))
    {

        //INITIALIZING A FEW VARS
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $agegroup = $_POST['agegroup'];
        $agegroup = $_POST['agegroup'];
        $phone = $_POST['phone'];
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

            if($results != false)
            {

                $query = getRow("client", "email", $email);
                $results = sendToDB('localhost', 'root', '', 'yokotest', $query);
                $row = mysqli_fetch_array($results);

                $clientid = $row['clientid'];
                generateCode($clientid);
                sendMail($email);

            }

        }


    }

?>
<!DOCTYPE html>
<!--
	to create tables ->
	1.	Go to xampp and start Apache & MySQL
	2.	Go to localhost/phpmyadmin
	3.	Create a database called yokotest
	4.	Create a client table called client with 8 rows
	5.	In the rows add the following
		clientid 		type: INT 	length: 6 
		pointstierid            type: INT	length: 6 
		points 			type: INT	length: 6 
		name			type: VARCHAR	length: 30 
		address			type: VARCHAR	length: 40
		email			type: VARCHAR	length: 30 
		phonenum		type: VARCHAR	length: 12
		occupation		type: VARCHAR	length: 20
		agegroup		type: VARCHAR	length: 15
-->
<html>
	<head>
        <title>Yoko Cheesecake Loyalty Form</title>
        <link rel="stylesheet" href="css/template.css"/>
        <link rel="stylesheet" href="css/deliverable5.css"/>
	</head>

	<body>

		<header>
			<a href="https://yokocheesecake.business.site/"><img src="images/pgnlogo.png" alt="logo" id="logo"/></a>
            <nav>
                <li><a href="https://yokocheesecake.business.site/">Home</a></li>
                <li><a href="https://yokocheesecake.business.site/#summary">About Us</a></li>
				<li><a href="loyaltyform.php">Join Us</a></li>
				<li><a href="admin/login.php">Log In</a></li>  
			</nav>	
		</header>
		
        <div class="main-content">
            <form class="form-register" method="post">
                <div class="form-register-with-email">
                    <div class="form-white-background">

                        <div class="form-title-row">
                            <h1>Join Us!</h1>
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
                        <label class="form-checkbox">
                            <input type="checkbox" name="termsCheckbox" checked>
                            <span>I agree to the <a href="#">terms and conditions</a></span>
                        </label>
                        </div>
                        <div class="form-row">
                        <label class="form-checkbox">
                            <input type="checkbox" name="privacyCheckbox" checked>
                            <span>I agree to the <a href="#">privacy policies</a></span>
                        </label>
                        </div>
                        <div class="form-row">
                        <button type="submit" name="submit">Register</button>
                        </div>
                    </div>
                    <a href="admin/login.php" class="form-log-in-with-existing">Already have an account? Login here &rarr;</a>
                </div>
            </form>
        </div>
	</body>
</html>
