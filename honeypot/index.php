<?php
session_name("PRETTYSECURE");
session_start();

if ($_POST["login"] === "secret") {
	$file = fopen("../honeypot/aaa.txt", "a");
	$info = array();
	$info["time"] = date("d.m.Y, H:i:s", $_SERVER["REQUEST_TIME"]);
	$info["ip"] = $_SERVER["REMOTE_ADDR"];
	$info["method"] = $_SERVER["REQUEST_METHOD"];
	$info["path"] = $_SERVER["SCRIPT_NAME"];
	$info["status"] = $status;

	foreach ($info as $entry)
		fwrite($file, $entry . " | ");

	fwrite($file, "\n");
	fclose($file);
}

?>
