<?php 
session_start();

if (isset($_SESSION["id"]) == false) 
	header("Location: index.php");

include("templates/header"); 
?>

<img src="img/happy.jpg" alt="Aktualności">

<h1>Aktualności</h1>

<p>Cześć, 
<?php 
include("models/user.php");
$user = new User("", ""); 
echo $user->getLoginById($_SESSION["id"]); 
?>!</p>
<ul id="menu">
	<li> <a href="add.php">Dodaj post</a>
	<li> <a href="change_password.php">Zmień hasło</a>
	<li> <a href="controllers/logout.php">Wyloguj się</a>
</ul>

<?php

include("models/post_list.php");

$posts_list = new PostList();
$posts = $posts_list->getAllPosts();

foreach ($posts as $post) {
	echo "<div class=\"post\">\n";
	echo "<b>Autor:</b> " . $post["login"] . "<br>";
	echo "<b>Tytuł:</b> " . $post["title"] . "<br>";
	echo "<p class=\"post-body\">" . $post["post"] . "</p>";
	echo "</div>\n";
}

?>

<?php include("templates/footer"); ?>
