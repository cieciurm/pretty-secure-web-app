<?php

session_start();

if (isset($_SESSION["id"]) == false)
	header("Location: ../index.php");

session_destroy();
header("Location: ../index.php");

?>
