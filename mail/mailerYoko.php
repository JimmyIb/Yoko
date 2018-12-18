<?php

	function sendMail($email){

		// Import PHPMailer classes into the global namespace
		// These must be at the top of your script, not inside a function
		require("PHPMailer-master/src/PHPMailer.php");
	  	require("PHPMailer-master/src/SMTP.php");
	  	require("PHPMailer-master/src/POP3.php");
	  	require("PHPMailer-master/src/Exception.php");
	  	require("PHPMailer-master/src/OAuth.php");

		$mail = new PHPMailer\PHPMailer\PHPMailer(true);                              // Passing `true` enables exceptions
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		
		$mail->Username = "ruben.e.sanchez.a@gmail.com";
		$mail->Password = "Bencho1729";
		$mail->SetFrom("ruben.e.sanchez.a@gmail.com");
		$mail->AddAddress($email);

		$mail->AddEmbeddedImage(dirname(__FILE__) . '/qrcode.png', 'qr');

		$mail->IsHTML(true);
		$mail->Subject = "Test";
		$mail->Body = '<p>Your code</p>'.'<img src="cid:qr">';

		if(!$mail->Send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message has been sent";
		}

	}

?>
