<?php 
session_start();

if (isset($_SESSION["id"]) == false) 
	header("Location: index.php");

include("templates/header"); 
?>

<img src="img/digg.jpg" alt="Zmiana hasła">

<h1>Zmiana hasła</h1>

<p>Cześć, 
<?php 
include("models/user.php");
$user = new User("", ""); 
echo $user->getLoginById($_SESSION["id"]); 
?>!</p>

<form id="registration_form" action="controllers/change.php" method="post">
	<table id="register_table">
		<tr>
			<td class="header">aktualne hasło:</td>
			<td><input name="old_password" type="password"></td>
		</tr>
		<tr>
			<td class="header">nowe hasło:</td>
			<td><input name="new_password" id="new_password" type="password"></td>
		</tr>
		<tr>
			<td colspan="2" id="password_strength">Siła nowego hasła</td>
		</tr>
		<tr>
			<td colspan="2"><input class="send" type="submit" value="OK"></td>
		</tr>
	</table>
</form>

<p><a href="newsfeed.php" title="Powrót">Powrót</a></p>

<script src="js/register.js"></script>

<?php include("templates/footer"); ?>
