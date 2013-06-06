function show_register() {
  var disp = document.getElementById("register").style.display;
  
 if (disp == "block") 
   document.getElementById("register").style.display = "none";
 else
   document.getElementById("register").style.display = "block";
}

function check_password() {
	var password = document.getElementById("new_password").value;

	var lower = false;
	var upper = false;
	var digits = false;
	var punct = false;

	var ASCII_LOWERCASE = "abcdefghijklmnopqrstuvwxyz";
	var ASCII_UPPERCASE = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var DIGITS = "0123456789";
	var PUNCTUATION = "!\"#$%'()*+,-./:;<=>@[\\]^_`{|}~";

	var ASCII_LOWERCASE_LEN = ASCII_LOWERCASE.length;
	var ASCII_UPPERCASE_LEN = ASCII_UPPERCASE.length;
	var DIGITS_LEN = DIGITS.length;
	var PUNCTUATION_LEN = PUNCTUATION.length;
	var len = password.length;

	for (var i = 0; i < len; i++)
		for (var j = 0; j < ASCII_LOWERCASE_LEN; j++)
    			if (password[i] == ASCII_LOWERCASE[j]) {
				lower = true;
				break;
			}

	for (var i = 0; i < len; i++)
		for (var j = 0; j < ASCII_UPPERCASE_LEN; j++)
		    	if (password[i] == ASCII_UPPERCASE[j]) {
				upper = true;
				break;
			}

	for (var i = 0; i < len; i++)
		for (var j = 0; j < DIGITS_LEN; j++)
		    	if (password[i] == DIGITS[j]) {
				digits = true;
				break;
			}

	for (var i = 0; i < len; i++)
		for (var j = 0; j < PUNCTUATION_LEN; j++)
			if (password[i] == PUNCTUATION[j]) {
				punctuation = true;
				break;
			}

	var alphabet_length = lower * ASCII_LOWERCASE_LEN;
	alphabet_length = alphabet_length + upper * ASCII_UPPERCASE_LEN;
	alphabet_length = alphabet_length + digits * DIGITS_LEN;
	alphabet_length = alphabet_length + punct * PUNCTUATION_LEN;

	/*console.log("Dlugosc alfabetu: " + alphabet_length);*/
	/*console.log("Dlugosc hasla: " + len);*/
	var ent_pass = len * Math.log(alphabet_length, 2);
	var ent_char = Math.log(alphabet_length, 2)
	/*console.log(ent_pass);*/
	/*console.log(ent_char);*/

	var color_bar = document.getElementById("password_strength");

	if (ent_char < 3.5) {
		/*console.log("\tslabe (niska entropia na znak)");*/
		color_bar.style.background = "red";
		color_bar.innerHTML = "Bardzo słabe";
		return;
	}

	if (ent_pass <= 20) { 
		/*console.log("\tslabe");*/
		color_bar.style.background = "red";
		color_bar.innerHTML = "Słabe";
	} else if (ent_pass <= 30) {
		/*console.log("\tsrednie");*/
		color_bar.style.background = "yellow";
		color_bar.innerHTML = "Średnie";
	} else {
		/*console.log("\tmocne");*/
		color_bar.style.background = "green";
		color_bar.innerHTML = "Mocne";
	}
}

function validate_registration_form() {
	var new_login = document.getElementById("new_login").value;
	var new_password = document.getElementById("new_password").value;

	if (new_login.length == 0) {
		var error_msg = "Login nie może być pusty!";
		alert(error_msg);
		return false;
	}

	if (new_password.length < 8) {
		var error_msg = "Twoje hasło musi mieć przynajmniej 8 znaków!";
		alert(error_msg);
		return false;
	}
}

window.onload = function() {
	var button = document.getElementById("new_password");
	button.onkeyup = function() {
		check_password();
	}

	var link = document.getElementById("register_link");
	link.onclick = function() {
		show_register();
	}

	var registration_form = document.getElementById("registration_form");
	registration_form.onsubmit = function() {
		return validate_registration_form();
	}

}
