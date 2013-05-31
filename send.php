<?php

include("config.php");

$user_id = 1;
$post_title = $_POST['title'];
$post_content = $_POST['content'];

$db = new PDO("sqlite:".DB_FILE);
$statement = $db->prepare('INSERT INTO posts (title, post, user_id) VALUES (?, ?, ?)');
$statement->execute(array($post_title, $post_content, $user_id));

//echo "Podany id: $user_id<br>";
//echo "Podany tytul: $post_title<br>";
//echo "Podana tresc: $post_content<br>";

header("refresh: 3;url=newsfeed.php");

?>

<?php include("templates/header"); ?>

<img src="img/thumb-up.jpg" alt="Udało się">

<h1 class="success">Wiadomość dodana poprawnie!</h1>

<img src="img/loader.gif" alt="Ładowanie">

<p>Przenoszenie do <b>Aktualności</b></p>

<?php include("templates/footer"); ?>
