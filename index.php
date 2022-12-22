<!DOCTYPE html>
<html>
<head>
<title>Games</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/base.css">
</head>
<body>
<h2 style="text-align: center;">List of games:</h2>
<table>
    <tr>
        <th><a href="player.php">Players</a></th>
        <th><a href="round.php">Rounds</a></th>
        <th><a href="team.php">Teams</a></th>
        <th><a href="tournament.php">Tournaments</a></th>
        <th><?php echo $_COOKIE["usernamecookie"];?></th>
        <th><a href="logout.php">Вийти</a></th>
    </tr>
</table>
<?php
session_start();
if(!isset($_SESSION["session_username"])):
header("location:login.php");
endif;
include "connect.php";
if(!$conn){
    die("Помилка: " . mysqli_connect_error());
}
$sql = "SELECT * FROM Game";
if($result = mysqli_query($conn, $sql)){
    $rowsCount = $result->num_rows;
    echo "<table><tr><th>ID</th><th>Team1 ID</th><th>Team2 ID</th><th>Tournament ID</th><th>Played At</th><th></th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["team1_id"] . "</td>";
            echo "<td>" . $row["team2_id"] . "</td>";
            echo "<td>" . $row["tournament_id"] . "</td>";
            echo "<td>" . $row["played_at"] . "</td>";
            if('admin' == $_COOKIE["userlevelcookie"]){
            echo "<td><a href='update_index.php?id=" . $row["id"] . "'>Змінити</a></td>";
            echo "<td><form action='delete_game.php' method='post'>
                        <input type='hidden' name='id'\ value='" . $row["id"] . "' />
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
        <th><a href='form_game.php'>Додати новий відгук</a></th>
    </tr>
</table>"
?>
</body>
</html>