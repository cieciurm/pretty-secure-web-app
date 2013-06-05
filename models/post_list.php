<?php
require("../config.php");

class PostList {
	function getAllPosts() {
		$db = new PDO("sqlite:".DB_FILE);
		$statement = $db->prepare("SELECT posts.title, posts.post, users.login FROM posts INNER JOIN users ON posts.user_id = users.id");
		$statement->execute();
		$results = $statement->fetchAll();

		return $results;
	}
}
?>
