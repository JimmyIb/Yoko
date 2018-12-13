<?php

	$emptyFieldError = "Field is required.";

	function checkNoWhiteSpace($name){

		if(!preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/", $name))
			return "Only letters and white space allowed.";
		return "";

	}

	function checkPhone($phoneNum)
	{

		if(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phoneNum))
			return "Invalid phone number format.";
		return "";

	}

	function checkEmail($email){

		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			return "Invalid e-mail format.";
		return "";

	}

	function checkPassword($pass)
	{

		
		
	}

?>