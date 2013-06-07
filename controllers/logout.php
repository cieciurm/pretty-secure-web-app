<?php
session_name("PRETTYSECURE");
session_start();

if (isset($_SESSION["id"]) == false) {
	header("Location: ../index.php");
	exit;
}

session_destroy();
header("Location: ../index.php");
exit;

?>
