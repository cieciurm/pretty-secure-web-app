<?php include("templates/header"); ?>

<?php

include("config.php");

$entered_login = $_POST['login'];
$entered_password = $_POST['password'];

//for ($i = 0; $i < 3; $i++) 
//$salt = $salt . chr(rand(97, 122));

//$hash = hash("sha256", $salt . $text);
//$to_store = $salt . $hash;

//$DB_FILE = "data.db";

$db = new PDO("sqlite:".DB_FILE);
$statement = $db->prepare('SELECT password FROM users WHERE login=?');
$statement->execute(array($entered_login));

$result = $statement->fetchAll();

$salt = substr($result[0]['password'], 0, 3);
$original_hash = substr($result[0]['password'], 3);

echo "Podany login: $entered_login<br>";
echo "Podane haslo: $entered_password<br>";

if (hash("sha256", $salt . $entered_password) === $original_hash) {
	include("newsfeed.php");
	//echo "Dobre haslo";
} else {
	echo "<img src=\"img/sad.jpg\" alt=\"Sad cat\">";
	echo "<h1 class=\"error\">Podano błędne dane logowania!</h1>";
	echo "<a href=\"./index.php\" title=\"Zaloguj się\">Spróbuj ponownie</a>";
}


?>

<?php include("templates/footer"); ?>
