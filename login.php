<?php

    include 'php/validation.php';
    $errorName = $errorEmail = $errorPass = $errorAddress = $errorPhone = $errorOccupation = "";
    $name = $email = $pass = $address = $phone = $occupation = "";

    //IF USER PRESSES SUBMIT BTN
    if(isset($_POST['submit']))
    {

        //INITIALIZING A FEW VARS
        $email = $_POST['email'];
        $pass =  $_POST['pass'];

        //VARS FOR ERROR
        $errorFound = false;

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

        if(empty($pass))
        {

            $errorFound = true;
            $errorPass = "Password is required.";

        }

    }

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Log in</title>
			<link rel="stylesheet" href="css/template.css"/>
			<link rel="stylesheet" href="css/logincss.css"/>
	</head>
	<body>
		<header>
			<a href="https://yokocheesecake.business.site/"><img src="images/pgnlogo.png" alt="logo" id="logo"/></a>
			<nav>
                                <li><a href="https://yokocheesecake.business.site/">Home</a></li>
                                <li><a href="https://yokocheesecake.business.site/#summary">About Us</a></li>
				<li><a href="loyaltyform.php">Join Us</a></li>
				<li><a href="login.php">Log In</a></li>
                           
			</nav>	
		</header>
            
             <div class="main-content">
                 <form class="form-login" method="post" action="#">
                     <div class="form-log-in-with-email">
                         <div class="form-white-background">
                             
                             <div class="form-title-row">
                                 <h1>Log in</h1>
                             </div>
                             
                             <div class="form-row">
                                 <label>
                                     <span>E-mail</span>
                                     <input type="text" id="emailField" name="email" value="<?= $email ?>"/>
                                     <span id="error"><?= $errorEmail ?></span>
                                 </label>
                             </div>
                             
                             <div class="form-row">
                                 <label>
                                     <span>Password</span>
                                     <input type="password" name="pass" id="passwordField" value="<?= $pass ?>">
                                     <span id="error"><?= $errorPass ?></span>
                                 </label>
                             </div>
                             <div class="form-row">
                                 <button type="submit" name="submit">Log in</button>
                             </div>
                         </div>
                         
                         <a href="#" class="form-forgotten-password">Forgot password &middot;</a>
                         <a href="deliverable5.htm" class="form-create-an-account">Create an account &rarr;</a>

                     </div>
                 </form>
             </div>      
            
		<script src="script/loginscript.js"></script>
	</body>
</html>
