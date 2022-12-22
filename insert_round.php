<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if (isset($_POST["game_id"]) && isset($_POST["winner_team_id"]) && isset($_POST["played_at"])) {   
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $game_id = mysqli_real_escape_string($conn, $_POST["game_id"]);
    $winner_team_id = mysqli_real_escape_string($conn, $_POST["winner_team_id"]);
    $played_at = mysqli_real_escape_string($conn, $_POST["played_at"]);
    $sql = "INSERT INTO Round (game_id, winner_team_id, played_at) VALUES ('$game_id', '$winner_team_id', '$played_at')";
        if(mysqli_query($conn, $sql)){
            header("Location: round.php");
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>