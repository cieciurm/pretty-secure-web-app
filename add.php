<?php 

if (isset($_COOKIE["user"]) == false)
	header("Location: index.php");

include("templates/header");
?>

<img src="img/writing.jpg" alt="Napisz wiadomość">

<h1>Napisz wiadomość</h1>

<form id="send_post" action="controllers/send.php" method="post">
	<table id="register_table">
		<tr>
			<td class="header">Tytuł:</td>
			<td><input id="title" name="title" type="text"></td>
		</tr>
		<tr>
			<td colspan="2" class="header">Wiadomość:</td>
		</tr>
		<tr>
			<td colspan="2"><textarea id="content" name="content" cols="30" rows="10"></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><input class="send" type="submit" value="OK"></td>
		</tr>
	</table>
</form>

<p><a href="newsfeed.php" title="Powrót">Powrót</a></p>

<script src="js/send_post.js"></script>

<?php include("templates/footer"); ?>
