<!DOCTYPE html>
<html>
<head>
<title>Players</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/base.css">
</head>
<body>
<h2 style="text-align: center;">Players list:</h2>
<table>
    <tr>
        <th><a href="index.php">Games</a></th>
        <th><a href="round.php">Rounds</a></th>
        <th><a href="team.php">Teams</a></th>
        <th><?php echo $_COOKIE["usernamecookie"];?></th>
        <th><a href="tournament.php">Tournaments</a></th>
    </tr>
</table>
<?php
include "connect.php";
if($conn->connect_error){
    die("Помилка: " . $conn->connect_error);
}
$sql = "SELECT * FROM Player";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows;
    echo "<table><tr><th>ID</th><th>Team ID</th><th>Role</th><th>Nickname</th><th></th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["team_id"] . "</td>";
            echo "<td>" . $row["role"] . "</td>";
            echo "<td>" . $row["nickname"] . "</td>";
            echo "<td><a href='update_player.php?id=" . $row["id"] . "'>Змінити</a></td>";
            echo "<td><form action='delete_player.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Видалити'>
                   </form></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Помилка: " . $conn->error;
}
$conn->close();
if('admin' == $_COOKIE["userlevelcookie"])
echo "<table>
    <tr>
        <th><a href='form_player.php'>Add new player</a></th>
    </tr>
</table>"
?>
</body>
</html>