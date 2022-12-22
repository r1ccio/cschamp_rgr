<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/form.css">
</head>
<body>
<h3>Player addition</h3>
<form action="insert_player.php" method="post">
<p>Team ID:
<input type="number" name="team_id"></p>
<p>Role:
<input type="text" name="role"></p>
<p>Nickname:
<input type="text" name="nickname"></p>
<input type="submit" value="Добавить">
</form>
</body>
</html>