function validate_send_post_form() {
	var post_title = document.getElementById("title").value;
	var post_content = document.getElementById("content").value;
	var error_msg = "";

	if (post_title.length == 0) 
		error_msg += "- temat wiadomości nie może być pusty!\n";

	if (post_content.length == 0) 
		error_msg += "- treść wiadomości nie może być pusta!\n";

	if (error_msg != "")  {
		error_msg = "W Twojej wiadomości znaleziono następujące błędy:\n".concat(error_msg);
		alert(error_msg);
		return false;
	}
}

window.onload = function() {
	var send_post_form = document.getElementById("send_post");
	send_post_form.onsubmit = function() {
		return validate_send_post_form();
	}
}
