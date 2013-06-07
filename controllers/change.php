<?php
session_name("PRETTYSECURE");
session_start();
if (isset($_SESSION["id"]) == false) {
	header("Location: ../index.php");
	exit;
}

include("../models/user.php");
include("../templates/header_controller");

$old_password = htmlentities($_POST["old_password"]);
$new_password = htmlentities($_POST["new_password"]);

$user = new User("", "");
$username = $user->getLoginById($_SESSION["id"]);
$user->setLogin($username);
$user->setPassword($old_password);

if ($user->checkIfPasswordCorrect() == false) {
	echo "<img src=\"../img/sad.jpg\" alt=\"Sad cat\">";
	echo "<h1 class=\"error\">Podano złe stare hasło!</h1>";
	echo "<p><a href=\"../change_password.php\">Spróbuj ponownie</a></p>";
} else {
	$user->setPassword($new_password);
	$user->updateInDb();
	echo "<img src=\"../img/happy.jpg\" alt=\"Sukces\">";
	echo "<h1 class=\"success\">Hasło zostało zmienione!</h1>";
	echo "<p><a href=\"../newsfeed.php\">Powrót do aktualności</a></p>";
}

include("../templates/footer"); 
?>
