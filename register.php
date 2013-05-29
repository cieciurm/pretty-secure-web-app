<?php

for ($i = 0; $i < 3; $i++) 
	$salt = $salt . chr(rand(97, 122));

$hash = hash("sha256", $salt . $text);
$to_store = $salt . $hash;

?>
