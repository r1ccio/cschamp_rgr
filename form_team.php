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
<h3>Team addition</h3>
<form action="insert_team.php" method="post">
<p>Name of the team:
<input type="text" name="name"></p>
<p>Team tier:
<input type="number" name="tier"></p>
<p>Created at:
<input type="text" name="created_at"></p>
<input type="submit" value="Добавить">
</form>
</body>
</html>