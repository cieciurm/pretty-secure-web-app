<?php

include("config.php");

class User {
	private $login;
	private $password;

	function __construct($login, $password) {
		$this->login = $login;
		$this->password = $password;
	}

	function setLogin($login) {
		$this->login = $login;
	}

	function setPassword($password) {
		$this->password = $password;
	}

	function getLogin() {
		return $this->login;
	}

	function checkIfExists() {
		$db = new PDO("sqlite:".DB_FILE);
		$statement = $db->prepare('SELECT login FROM users WHERE login=?');
		$statement->execute(array($this->login));
		$results = $statement->fetchAll();

		if (sizeof($results) === 0) 
			return false;
		else
			return true;
	}

	function saveInDb() {
		$salt = "";

		for ($i = 0; $i < 3; $i++) 
			$salt = $salt . chr(rand(97, 122));

		$hash = hash("sha256", $salt . $this->password);
		$to_store = $salt . $hash; 

		$db = new PDO("sqlite:".DB_FILE);
		$statement = $db->prepare('INSERT INTO users (login, password) VALUES (?, ?)');
		$statement->execute(array($this->login, $to_store));
	}

	function updateInDb() {
		$salt = "";

		for ($i = 0; $i < 3; $i++) 
			$salt = $salt . chr(rand(97, 122));

		$hash = hash("sha256", $salt . $this->password);
		$to_store = $salt . $hash; 

		$db = new PDO("sqlite:".DB_FILE);
		$statement = $db->prepare('UPDATE users SET password=? WHERE login=?');
		$statement->execute(array($to_store, $this->login));
	}

	function checkIfPasswordCorrect() {
		$db = new PDO("sqlite:".DB_FILE);
		$statement = $db->prepare('SELECT password FROM users WHERE login=?');
		$statement->execute(array($this->login));
		$result = $statement->fetchAll();

		$salt = substr($result[0]['password'], 0, 3);
		$original_hash = substr($result[0]['password'], 3);

		if (hash("sha256", $salt . $this->password) === $original_hash)
			return true;
		else
			return false;
	}

	function getUserId() {
		if ($this->checkIfExists() == false)
			return -1;

		$db = new PDO("sqlite:".DB_FILE);
		$statement = $db->prepare('SELECT id FROM users WHERE login=?');
		$statement->execute(array($this->login));
		$result = $statement->fetchAll();

		return $result[0]["id"];
	}

	function getLoginById($id) {
		$db = new PDO("sqlite:".DB_FILE);
		$statement = $db->prepare('SELECT login FROM users WHERE id=?');
		$statement->execute(array($id));
		$result = $statement->fetchAll();

		return $result[0]["login"];
	}
}
?>
