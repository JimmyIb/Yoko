var usernameField = document.getElementById("usernameField");
var passwordField = document.getElementById("passwordField");
var loginButton = document.getElementById("loginBtn");
var invalidColor = "rgb(255,98,98)";
var validColor = "white";
var admin = "admin";
var password = "admin";
	
loginButton.addEventListener("click", verify);
function verify(){
	
	if(usernameField.value !== admin && passwordField.value !== password){
		console.log("login fail!");
		if(usernameField.value !== admin){
			usernameField.style.backgroundColor = invalidColor;
			usernameField.value = "";
		}
		
		if(passwordField.value !== password){
			passwordField.style.backgroundColor = invalidColor;
			passwordField.value = "";
		}
		
	}else{
		window.open("databaseSite.html", "_self");
	}
}