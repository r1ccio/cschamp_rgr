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
    $sql = "SELECT * FROM Tournament WHERE id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $prize = $row["prize"];
                $winner_team_id = $row["winner_team_id"];
                $created_at = $row["created_at"];
            }
            echo "<h3>Update tournament</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$id' />
                    <p>Prize:
                    <input type='number' name='prize' value='$prize' /></p>
                    <p>Winner team ID:
                    <input type='number' name='winner_team_id' value='$winner_team_id' /></p>
                    <p>Created At:
                    <input type='text' name='created_at' value='$created_at' /></p>
                    <input type='submit' value='Save'>
            </form>";
        }
        else{
            echo "<div>Tournament not found</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["id"]) && isset($_POST["prize"]) && isset($_POST["winner_team_id"]) && isset($_POST["created_at"])) {
      
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $prize = mysqli_real_escape_string($conn, $_POST["prize"]);
    $winner_team_id = mysqli_real_escape_string($conn, $_POST["winner_team_id"]);
    $created_at = mysqli_real_escape_string($conn, $_POST["created_at"]);
      
    $sql = "UPDATE Tournament SET prize = '$prize', winner_team_id = '$winner_team_id', created_at = '$created_at' WHERE id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: tournament.php");
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