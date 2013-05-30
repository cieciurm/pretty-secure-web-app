<?php include("templates/header"); ?>

<?php

include("config.php");

$entered_login = $_POST['new_login'];
$entered_password = $_POST['new_password'];

//echo "Podany login $entered_login";
//echo "Podane haslo $entered_password";

// Sprawdzamy czy istnieje juz taki uzytkownik
$db = new PDO("sqlite:".DB_FILE);
$statement = $db->prepare('SELECT login FROM users WHERE login=?');
$statement->execute(array($entered_login));

$results = $statement->fetchAll();

if (sizeof($results) === 0) {
	$salt = "";
	for ($i = 0; $i < 3; $i++) 
		$salt = $salt . chr(rand(97, 122));

	$hash = hash("sha256", $salt . $entered_password);
	$to_store = $salt . $hash; 
	$statement = $db->prepare('INSERT INTO users (login, password) VALUES (?, ?)');
	$statement->execute(array($entered_login, $to_store));

	echo "<img src=\"img/happy.jpg\" alt=\"Sukces\">";
	echo "<h1 class=\"success\">Rejestracja zakończona powodzeniem!</h1>";
	echo "<p><a href=\"index.php\">Przejdź do logowania</a></p>";
} else {
	echo "<img src=\"img/sad.jpg\" alt=\"Sad cat\">";
	echo "<h1 class=\"error\">Użytkownik o podanej nazwie już istnieje!</h1>";
	echo "<p><a href=\"index.php\">Spróbuj ponownie</a></p>";
}

?>

<?php include("templates/footer"); ?>
