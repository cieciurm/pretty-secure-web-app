<?php include("templates/header"); ?>			

<img src="img/curious.jpg" alt="Login">
<h1>Logowanie</h1>
<form action="login.php" method="post">
	<input name="login" type="text">
	<input name="password" type="password">
	<input type="submit">
</form>

<p id="register_link" onclick="show_register();">Nie masz konta? Zarejestruj się!</p>

<div id="register">
	<h1>Rejestracja</h1>
	<form onsubmit="validate_form();">
		<p>login:<input type="text"></p>
		<p>hasło: <input id="new_password" onkeyup="check_password()" type="password"></p>
		<div id="password_strength">Siła hasła</div>
		<p><input type="submit"></p>
	</form>
</div>

<?php include("templates/footer"); ?>			
