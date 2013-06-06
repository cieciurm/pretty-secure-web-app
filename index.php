<?php 
session_start();
if (isset($_SESSION["id"]) == true) {
	header("Location: newsfeed.php");
	exit;
}
	
include("templates/header"); ?>			
		<img src="img/curious.jpg" alt="Login">
		<h1>Logowanie</h1>
		<form action="controllers/login.php" method="post">
			<input name="login" type="text">
			<input name="password" type="password">
			<input class="send" type="submit" value="OK">
		</form>

		<p id="register_link">Nie masz jeszcze konta? Zarejestruj się!</p>

		<div id="register">
			<h1>Rejestracja</h1>
			<form id="registration_form" action="controllers/register.php" method="post">
				<table id="register_table">
					<tr>
						<td class="header">login:</td>
						<td><input name="new_login" id="new_login" type="text"></td>
					</tr>
					<tr>
						<td class="header">hasło:</td>
						<td><input name="new_password" id="new_password" type="password"></td>
					</tr>
					<tr>
						<td colspan="2" id="password_strength">Siła hasła</td>
					</tr>
					<tr>
						<td colspan="2"><input class="send" type="submit" value="OK"></td>
					</tr>
				</table>
			</form>
		</div>

		<script src="js/register.js"></script>
<?php include("templates/footer"); ?>			
