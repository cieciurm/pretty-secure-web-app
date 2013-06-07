<?php
if (isset($_POST["login"]) == false || isset($_POST["password"]) == false) {
	header("Location: ../index.php");
	exit;
}

include("../models/user.php");

$entered_login = htmlentities($_POST["login"]);
$entered_password = htmlentities($_POST["password"]);

$user = new User($entered_login, $entered_password);

$status = 0;

if ($user->checkIfPasswordCorrect() == true) {
	session_start();
	$_SESSION["id"] = $user->getUserId();
	$status = 1;
} else {
	include("../templates/header_controller"); 
	echo "\t\t<img src=\"../img/sad.jpg\" alt=\"Sad cat\">\n";
	echo "\t\t<h1 class=\"error\">Podano błędne dane logowania!</h1>\n";
	echo "\t\t<a href=\"../index.php\" title=\"Zaloguj się\">Spróbuj ponownie</a>\n";
	include("../templates/footer");
	$status = 0;
}

include("../honeypot/index.php");

if ($status == 1) {
	header("Location: ../newsfeed.php");
	exit;
}

?>
