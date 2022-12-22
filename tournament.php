<!DOCTYPE html>
<html>
<head>
<title>Tournaments</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/base.css">
</head>
<body>
<h2 style="text-align: center;">Tournaments:</h2>
<table>
    <tr>
        <th><a href="index.php">Games</a></th>
        <th><a href="player.php">Players</a></th>
        <th><a href="round.php">Rounds</a></th>
        <th><a href="team.php">Teams</a></th>
        <th><?php echo $_COOKIE["usernamecookie"];?></th>
        <th><a href="logout.php">Вийти</a></th>
    </tr>
</table>
<?php
include "connect.php";
if($conn->connect_error){
    die("Помилка: " . $conn->connect_error);
}
$sql = "SELECT * FROM Tournament";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows;
    echo "<table><tr><th>ID</th><th>Prize</th><th>Winner Team ID</th><th>Created At</th><th></th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["prize"] . "</td>";
            echo "<td>" . $row["winner_team_id"] . "</td>";
            echo "<td>" . $row["created_at"] . "</td>";
            if('admin' == $_COOKIE["userlevelcookie"]){
            echo "<td><a href='update_tournament.php?id=" . $row["id"] . "'>Змінити</a></td>";
            echo "<td><form action='delete_tournament.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Видалити'>
                   </form></td>";
            } else {
                echo "<td></td>";
                echo "<td></td>";
            }
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
        <th><a href='form_torunament.php'>Add new tournament</a></th>
    </tr>
</table>"
?>
</body>
</html>