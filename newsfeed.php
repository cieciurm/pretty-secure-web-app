<?php include("templates/header"); ?>

<img src="img/happy.jpg" alt="Aktualności">

<h1>Aktualności</h1>

<p>Witaj, hehe</p>
<p><a href="add.php">Dodaj nowy post</a></p>

<?php

include("config.php");

$db = new PDO("sqlite:".DB_FILE);

echo "<hr>";

$results = $db->query('SELECT * FROM posts');

foreach ($results as $post) {
	$author_query = $db->prepare('SELECT login FROM users WHERE id=?');
	$author_query->execute(array($post['user_id']));
	$author = $author_query->fetchAll();

	echo "<div class=\"post\">\n";
	echo "<b>Autor:</b> " . $author[0]['login'] . "<br>";
	echo "<b>Tytuł:</b> " . $post['title'] . "<br>";
	echo "<p class=\"post-body\">" . $post['post'] . "</p>";
	echo "</div>\n";
	echo "<hr>\n";
}

?>

<?php include("templates/footer"); ?>
