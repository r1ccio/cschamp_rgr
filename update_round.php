<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
include "connect.php";
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/form.css">
</head>
<body>
<?php
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $sql = "SELECT * FROM Round WHERE id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $game_id = $row["game_id"];
                $winner_team_id = $row["winner_team_id"];
                $played_at = $row["played_at"];
            }
            echo "<h3>Update round</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$id' />
                    <p>Game ID:
                    <input type='text' name='game_id' value='$game_id' /></p>
                    <p>Winner team ID:
                    <input type='text' name='winner_team_id' value='$winner_team_id' /></p>
                    <p>Played At:
                    <input type='text' name='played_at' value='$played_at' /></p>
                    <input type='submit' value='Save'>
            </form>";
        }
        else{
            echo "<div>Round not found</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["id"]) && isset($_POST["game_id"]) && isset($_POST["winner_team_id"]) && isset($_POST["played_at"])) {
      
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $game_id = mysqli_real_escape_string($conn, $_POST["game_id"]);
    $winner_team_id = mysqli_real_escape_string($conn, $_POST["winner_team_id"]);
    $played_at = mysqli_real_escape_string($conn, $_POST["played_at"]);
      
    $sql = "UPDATE Round SET game_id = '$game_id', winner_team_id = '$winner_team_id', played_at = '$played_at' WHERE id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: round.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
else{
    echo "Некорректные данные";
}
mysqli_close($conn);
?>
</body>
</html>