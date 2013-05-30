<img src="img/happy.jpg" alt="Newsfeed">

<p>Witaj, hehe</p>
<p><a href="">Dodaj nowy post</a></p>

<?php

include("config.php");

$db = new PDO("sqlite:".DB_FILE);

echo "<hr>";

$results = $db->query('SELECT * FROM posts');

foreach ($results as $post) {
	$author_query = $db->prepare('SELECT login FROM users WHERE id=?');
	$author_query->execute(array($post['user_id']));
	$author = $author_query->fetchAll();

	echo "<b>Autor:</b> " . $author[0]['login'] . "<br>";
	echo "<b>Treść:</b> " . $post['post'] . "<br>";

	echo "<hr>";
}

//$statement = $db->queryprepare('SELECT * FROM posts WHERE login=?');
//$statement->execute(array($entered_login));

//$result = $statement->fetchAll();

?>
