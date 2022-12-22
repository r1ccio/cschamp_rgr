<!DOCTYPE html>
<html>
<head>
<title>Rounds</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/base.css">
</head>
<body>
<h2 style="text-align: center;">List of rounds:</h2>
<table>
    <tr>
        <th><a href="index.php">Games</a></th>
        <th><a href="player.php">Players</a></th>
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
$sql = "SELECT * FROM Round";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows;
    echo "<table><tr><th>ID</th><th>Game ID</th><th>Winner Team ID</th><th>Played At</th><th></th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["game_id"] . "</td>";
            echo "<td>" . $row["winner_team_id"] . "</td>";
            echo "<td>" . $row["played_at"] . "</td>";
            echo "<td><a href='update_round.php?id=" . $row["id"] . "'>Змінити</a></td>";
            echo "<td><form action='delete_round.php' method='post'>
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
        <th><a href='form_round.php'>Add new round</a></th>
    </tr>
</table>"
?>
</body>
</html>