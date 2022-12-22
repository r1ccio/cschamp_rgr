<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/form.css">
</head>
<body>
<h3>Round addition</h3>
<form action="insert_round.php" method="post">
<p>Game ID:
<input type="number" name="game_id"></p><p>ID of the winner:
<input type="number" name="winner_team_id"></p>
    <p>Played At:
<input type="text" name="played_at"></p>
<input type="submit" value="Добавить">
</form>

</body></html>