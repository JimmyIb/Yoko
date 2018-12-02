var submitButton = document.getElementById("submitBtn");
var emailField = document.getElementById("emailField");
var phoneNumField = document.getElementById("phonenumField");
var nameField = document.getElementById("name");

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
		document.getElementById("form1").submit();
		document.getElementById("form2").submit();
	}else{
		window.alert("Please fill all the required fields");
		nameField.onchange(correctInformation());
		emailField.onchange(correctInformation());
	}

}
