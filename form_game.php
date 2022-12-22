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
<h3>Game addition</h3>
<form action="insert_game.php" method="post">
<p>ID of the fisrt team:
<input type="number" name="team1_id"></p>
<p>ID of the second team:
<input type="number" name="team2_id"></p>
<p>Tournament ID:
<input type="number" name="tournament_id"></p>
<p>Played at:
<input type="text" name="played_at"></p>
<input type="submit" value="Добавить">
</form>
</body>
</html>