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
        <link rel="stylesheet" href="../css/template.css"/>
	<link rel="stylesheet" href="../css/deliverable5.css"/>
	<body>
            <header>
                <a href="#"><img src="../images/pgnlogo.png" alt="logo" id="logo"/></a>
                <h1>Main Panel </h1>
            </header>
            
            
            
            <div class="main-content">
            <form class="form-register" method="post">
                <div class="form-register-with-email">
                    <div class="form-white-background">

                        <div class="form-title-row">
                            <h1>Where Would You Like To Go?</h1>
                        </div>
                        <div class="form-row">
                            <button type="submit" name="customers" value="Manage Customers">Manage Customers</button>
                        </div>
                        <div class="form-row">
                            <button type="submit" name="pointsTier" value="Manage Points Tiers">Manage Points Tiers</button>
                        </div>
                        <div class="form-row">
                            <button type="submit" name="account" value="Manage Account">Manage Account</button>
                        </div>
                    </div>
                   
                </div>
            </form>
        </div>
            
	</body>
</html>
