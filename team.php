<!DOCTYPE html>
<html>
<head>
<title>Teams</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/base.css">
</head>
<body>
<h2 style="text-align: center;">List of teams:</h2>
<table>
    <tr>
        <th><a href="index.php">Games</a></th>
        <th><a href="player.php">Players</a></th>
        <th><a href="round.php">Rounds</a></th>
        <th><?php echo $_COOKIE["usernamecookie"];?></th>
        <th><a href="tournament.php">Tournaments</a></th>
    </tr>
</table>
<?php
include "connect.php";
if($conn->connect_error){
    die("Помилка: " . $conn->connect_error);
}
$sql = "SELECT * FROM Team";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows;
    echo "<table><tr><th>ID</th><th>Name</th><th>Team Tier</th><th>Created At</th><th></th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["tier"] . "</td>";
            echo "<td>" . $row["created_at"] . "</td>";
            echo "<td><a href='update_team.php?id=" . $row["id"] . "'>Змінити</a></td>";
            echo "<td><form action='delete_team.php' method='post'>
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
        <th><a href='form_team.php'>Add new team</a></th>
    </tr>
</table>"
?>
</body>
</html>