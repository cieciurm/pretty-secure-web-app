<?php
include("../models/post.php");

include("../templates/header_controller"); 

$user_id = 2;
$post_title = htmlentities($_POST['title']);
$post_content = htmlentities($_POST['content']);

$post = new Post($post_title, $post_content, $user_id);

$post->addPost();

header("refresh: 2; url=../newsfeed.php");
?>

<img src="../img/thumb-up.jpg" alt="Udało się">
<h1 class="success">Wiadomość dodana poprawnie!</h1>
<img src="../img/loader.gif" alt="Ładowanie">
<p>Przenoszenie do <b>Aktualności</b></p>

<?php include("../templates/footer"); ?>
