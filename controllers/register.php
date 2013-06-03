<?php
session_start();
if (isset($_SESSION["id"]) == false) {
	header("Location: ../index.php");
	exit;
}

include("../models/user.php");

include("../templates/header_controller");

$entered_login = htmlentities($_POST["new_login"]);
$entered_password = htmlentities($_POST["new_password"]);

//echo "Podany login $entered_login";
//echo "Podane haslo $entered_password";

$user = new User($entered_login, $entered_password);

// Sprawdzamy czy istnieje juz taki uzytkownik
if ($user->checkIfExists() == true) {
	echo "<img src=\"../img/sad.jpg\" alt=\"Sad cat\">";
	echo "<h1 class=\"error\">Użytkownik o podanej nazwie już istnieje!</h1>";
	echo "<p><a href=\"../index.php\">Spróbuj ponownie</a></p>";
} else {
	$user->saveInDb();
	echo "<img src=\"../img/happy.jpg\" alt=\"Sukces\">";
	echo "<h1 class=\"success\">Rejestracja zakończona powodzeniem!</h1>";
	echo "<p><a href=\"../index.php\">Przejdź do logowania</a></p>";
}

include("../templates/footer"); 
?>
