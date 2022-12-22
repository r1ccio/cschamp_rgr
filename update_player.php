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
    $sql = "SELECT * FROM Player WHERE id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $team_id = $row["team_id"];
                $role = $row["role"];
                $nickname = $row["nickname"];
            }
            echo "<h3>Update player</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$id' />
                    <p>Player`s team ID:
                    <input type='number' name='team_id' value='$team_id' /></p>
                    <p>Role:
                    <input type='text' name='role' value='$role' /></p>
                    <p>Nickname:
                    <input type='text' name='nickname' value='$nickname' /></p>
                    <input type='submit' value='Save'>
            </form>";
        }
        else{
            echo "<div>Player not found</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["id"]) && isset($_POST["team_id"]) && isset($_POST["role"]) && isset($_POST["nickname"])) {
      
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $team_id = mysqli_real_escape_string($conn, $_POST["team_id"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);
    $nickname = mysqli_real_escape_string($conn, $_POST["nickname"]);
      
    $sql = "UPDATE Player SET team_id = '$team_id', role = '$role', nickname = '$nickname' WHERE id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: player.php");
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