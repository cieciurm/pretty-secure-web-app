<?php

$entered_login = $_POST['login'];
$entered_password = $_POST['password'];

//for ($i = 0; $i < 3; $i++) 
//$salt = $salt . chr(rand(97, 122));

//$hash = hash("sha256", $salt . $text);
//$to_store = $salt . $hash;

$db = new PDO('sqlite:data.db');
$statement = $db->prepare('SELECT password FROM users WHERE login=?');
$statement->execute(array($entered_login));

$result = $statement->fetchAll();

$salt = substr($result[0]['password'], 0, 3);
$original_hash = substr($result[0]['password'], 3);

if (hash("sha256", $salt . $entered_password) === $original_hash) 
	echo "Dobre haslo";
else
	echo "Zle haslo";


?>
