<?php
require("../config.php");

class Post {
	private $title;
	private $content;
	private $user_id;

	function __construct($title, $content, $user_id) {
		$this->title = $title;
		$this->content = $content;
		$this->user_id = $user_id;
	}

	function addPost() {
		$db = new PDO("sqlite:".DB_FILE);
		$statement = $db->prepare('INSERT INTO posts (title, post, user_id) VALUES (?, ?, ?)');
		$statement->execute(array($this->title, $this->content, $this->user_id));
	}
}
?>
