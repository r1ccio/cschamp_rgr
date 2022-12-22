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
<h3>Tournament addition</h3>
<form action="insert_tournament.php" method="post">
<p>Prize
<input type="number" name="prize"></p>
<p>ID of the winner
<input type="number" name="winner_team_id"></p>
<p>Created At:
<input type="text" name="created_at"></p>
<input type="submit" value="Добавить">
</form>
</body>
</html>