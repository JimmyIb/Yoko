var submitButton = document.getElementById("submitBtn");
var emailField = document.getElementById("emailField");
var phoneNumField = document.getElementById("phonenumField");
var occupationField = document.getElementById("occupation");
var nameField = document.getElementById("name");
var addressField = document.getElementById("address");
var ageGroupField = document.getElementById("ageGroup");
submitButton.onclick = submitForms;

var phoneNumberRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
var emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var invalidColor = "rgb(255,98,98)";
var validColor = "white";

function validateForm(){
	var isValid = true;
	console.log(emailRegex.test(emailField.value) + "\tEMAIL");
	
	if(nameField.value === ""){
		nameField.style.backgroundColor = invalidColor;
		isValid = false;
	}else{
		nameField.style.backgroundColor = validColor;
	}
	
	
	if(!emailRegex.test(emailField.value) ){
		isValid = false;
		emailField.style.backgroundColor = invalidColor; 
	}else{
		emailField.style.backgroundColor = validColor;
	}
	
	return isValid;
}
function correctInformation(){
	if(nameField.value !== ""){
		nameField.style.backgroundColor = validColor;
	}
	if(emailRegex.test(emailField.value)){
		emailField.style.backgroundColor = validColor;
	}
}

function submitForms(){
	if(validateForm()){

		const xhr = new XMLHttpRequest();

		xhr.onload = function(){

			console.log(xhr.responseText);

		}

		xhr.open("POST", "script/serverRequest.php");
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send("name=" + nameField.value + "&address=" + addressField.value + "&email=" + emailField.value + "&phone=" + phonenumField.value + "&occupation=" + occupationField.value);
		
		window.alert("Sign up successfully!");
		nameField.value = "";
		emailField.value = "";
		phoneNumField.value = "";
		occupationField.value = "";
		ageGroupField.value = "";
		addressField.value = "";

	}else{
		window.alert("Please fill all the required fields accordingly");
		nameField.onchange = validateForm;
		emailField.onchange = validateForm;
	}
}
