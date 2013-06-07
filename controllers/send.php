<?php
if (isset($_POST["title"]) == false || isset($_POST["content"]) == false) {
	header("Location: ../index.php");
	exit;
}
session_name("PRETTYSECURE");
session_start();

if (isset($_SESSION["id"]) == false) {
	header("Location: ../index.php");
	exit;
}

include("../models/post.php");

include("../templates/header_controller");

$user_id = $_SESSION["id"];
$post_title = htmlentities($_POST["title"]);
$post_content = htmlentities($_POST["content"]);

$post = new Post($post_title, $post_content, $user_id);
$post->addPost();

header("refresh: 1; url=../newsfeed.php");
?>

<img src="../img/thumb-up.jpg" alt="Udało się">
<h1 class="success">Wiadomość dodana poprawnie!</h1>
<img src="../img/loader.gif" alt="Ładowanie">
<p>Przenoszenie do <b>Aktualności</b></p>

<?php include("../templates/footer"); ?>
