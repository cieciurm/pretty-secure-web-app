<?php 
session_start();

if (isset($_SESSION["id"]) == false) 
	header("Location: index.php");

include("templates/header"); 
?>

<img src="img/happy.jpg" alt="Aktualności">

<h1>Aktualności</h1>

<p>Cześć, <?php echo $_SESSION["login"]; ?>!</p>
<ul id="menu">
	<li> <a href="add.php">Dodaj post</a>
	<li> <a href="">Edytuj profil</a>
	<li> <a href="controllers/logout.php">Wyloguj się</a>
</ul>

<?php

include("config.php");

$db = new PDO("sqlite:".DB_FILE);

$results = $db->query('SELECT * FROM posts ORDER BY id DESC');

foreach ($results as $post) {
	$author_query = $db->prepare('SELECT login FROM users WHERE id=?');
	$author_query->execute(array($post['user_id']));
	$author = $author_query->fetchAll();

	echo "<div class=\"post\">\n";
	echo "<b>Autor:</b> " . $author[0]['login'] . "<br>";
	echo "<b>Tytuł:</b> " . $post['title'] . "<br>";
	echo "<p class=\"post-body\">" . $post['post'] . "</p>";
	echo "</div>\n";
}

?>

<?php include("templates/footer"); ?>
