<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if (isset($_POST["team1_id"]) && isset($_POST["team2_id"]) && isset($_POST["tournament_id"]) && isset($_POST["tournament_id"])) {   
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $team1_id = mysqli_real_escape_string($conn, $_POST["team1_id"]); 
    $team2_id = mysqli_real_escape_string($conn, $_POST["team2_id"]);
    $tournament_id = mysqli_real_escape_string($conn, $_POST["tournament_id"]);
    $played_at = mysqli_real_escape_string($conn, $_POST["played_at"]);

    $sql = "INSERT INTO Game (team1_id, team2_id, tournament_id, played_at) VALUES ('$team1_id', '$team2_id', '$tournament_id', '$played_at')";
        if(mysqli_query($conn, $sql)){
            header("Location: index.php");
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>