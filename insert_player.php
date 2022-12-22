<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if (isset($_POST["team_id"]) && isset($_POST["role"]) && isset($_POST["nickname"])) {   
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $team_id = mysqli_real_escape_string($conn, $_POST["team_id"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);
    $nickname = mysqli_real_escape_string($conn, $_POST["nickname"]);
    $sql = "INSERT INTO Player (team_id, role, nickname) VALUES ('$team_id', '$role', '$nickname')";
        if(mysqli_query($conn, $sql)){
            header("Location: player.php");
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>