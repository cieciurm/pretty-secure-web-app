<?php
include("config.php");
include("models/post.php");

$user_id = 2;
$post_title = $_POST['title'];
$post_content = $_POST['content'];

$post = new Post($post_title, $post_content, $user_id);

$post->addPost();

header("refresh: 2;url=newsfeed.php");
include("templates/header"); 
?>

<img src="img/thumb-up.jpg" alt="Udało się">
<h1 class="success">Wiadomość dodana poprawnie!</h1>
<img src="img/loader.gif" alt="Ładowanie">
<p>Przenoszenie do <b>Aktualności</b></p>

<?php include("templates/footer"); ?>
