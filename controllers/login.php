<?php
session_start();
include("../models/user.php");

$entered_login = htmlentities($_POST["login"]);
$entered_password = htmlentities($_POST["password"]);

$user = new User($entered_login, $entered_password);

if ($user->checkIfPasswordCorrect() == true) {
	$_SESSION["id"] = $user->getUserId();
	header("Location: ../newsfeed.php");
	exit;
} else {
	include("../templates/header_controller"); 
	echo "\t\t<img src=\"../img/sad.jpg\" alt=\"Sad cat\">\n";
	echo "\t\t<h1 class=\"error\">Podano błędne dane logowania!</h1>\n";
	echo "\t\t<a href=\"../index.php\" title=\"Zaloguj się\">Spróbuj ponownie</a>\n";
	include("../templates/footer");
}

?>
