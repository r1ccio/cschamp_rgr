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
    $sql = "SELECT * FROM Game WHERE id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $team1_id = $row["team1_id"];
                $team2_id = $row["team2_id"];
                $played_at = $row["played_at"];
            }
            echo "<h3>Update game</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$id' />
                    <p>ID of the first team:
                    <input type='number' name='team1_id' value='$team1_id' /></p>
                    <p>ID of the second team:
                    <input type='number' name='team2_id' value='$team2_id' /></p>
                    <p>Played At:
                    <input type='text' name='played_at' value='$played_at' /></p>
                    <input type='submit' value='Save'>
            </form>";
        }
        else{
            echo "<div>Game not found</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["id"]) && isset($_POST["team1_id"]) && isset($_POST["team2_id"]) && isset($_POST["played_at"])) {
      
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $team1_id = mysqli_real_escape_string($conn, $_POST["team1_id"]);
    $team2_id = mysqli_real_escape_string($conn, $_POST["team2_id"]);
    $played_at = mysqli_real_escape_string($conn, $_POST["played_at"]);
      
    $sql = "UPDATE Game SET team1_id = '$team1_id', team2_id = '$team2_id', played_at = '$played_at' WHERE id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: index.php");
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