<?php

    include '../php/validation.php';
    $errorUser = $errorPass = "";
    $user = $pass = "";

    //IF USER PRESSES SUBMIT BTN
    if(isset($_POST['submit']))
    {

        //INITIALIZING A FEW VARS
        $user = $_POST['user'];
        $pass =  $_POST['pass'];

        //VARS FOR ERROR
        $errorFound = false;

        if(empty($user))
        {

            $errorFound = true;
            $errorUser = "Username is required.";

        }

        if(empty($pass))
        {

            $errorFound = true;
            $errorPass = "Password is required.";

        }

        if(!$errorFound)
        {

            if($user == "admin")
            {

                if($pass == "admin")
                {

                    header("Location: controlPanel.php");

                }else{

                    $errorPass = "Password is incorrect.";

                }

            }else{

                $errorUser = "Username is incorrect.";

            }

        }

    }

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Log in</title>
			<link rel="stylesheet" href="../css/template.css"/>
			<link rel="stylesheet" href="../css/logincss.css"/>
	</head>
	<body>
		<header>
			<a href="https://yokocheesecake.business.site/"><img src="../images/pgnlogo.png" alt="logo" id="logo"/></a>
			<nav>
                                <li><a href="https://yokocheesecake.business.site/">Home</a></li>
                                <li><a href="https://yokocheesecake.business.site/#summary">About Us</a></li>
				<li><a href="/yoko/loyaltyform.php">Join Us</a></li>
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
                                <span>Username</span>
                                <input type="text" id="userField" name="user" value="<?= $user ?>"/>
                                <span id="error"><?= $errorUser ?></span>
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
                    <a href="/yoko/loyaltyform.php" class="form-create-an-account">Create an account &rarr;</a>

                </div>
            </form>
        </div>      
	</body>
</html>
