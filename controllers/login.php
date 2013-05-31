<?php
include("../config.php");
include("../models/user.php");

include("../templates/header"); 

$entered_login = $_POST['login'];
$entered_password = $_POST['password'];

$user = new User($entered_login, $entered_password);

if ($user->checkIfPasswordCorrect() == true) {
	header("Location: ../newsfeed.php");
} else {
	echo "\t\t<img src=\"../img/sad.jpg\" alt=\"Sad cat\">\n";
	echo "\t\t<h1 class=\"error\">Podano błędne dane logowania!</h1>\n";
	echo "\t\t<a href=\"../index.php\" title=\"Zaloguj się\">Spróbuj ponownie</a>\n";
}

include("../templates/footer");
?>
