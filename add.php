<?php include("templates/header"); ?>

<img src="img/writing.jpg" alt="Stwórz posta">

<h1>Stwórz posta</h1>

<form>
	<table id="register_table">
		<tr>
			<td class="header">Tytuł:</td>
			<td><input type="text"></td>
		</tr>
		<tr>
			<td colspan="2" class="header">Wiadomość:</td>
		</tr>
		<tr>
			<td colspan="2"><textarea cols="30" rows="10"></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><input class="send" type="submit" value="OK"></td>
		</tr>
	</table>
</form>

<p><a href="newsfeed.php" title="Powrót">Powrót</a></p>

<?php include("templates/footer"); ?>
