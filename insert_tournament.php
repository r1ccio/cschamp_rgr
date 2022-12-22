<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if (isset($_POST["prize"]) && isset($_POST["winner_team_id"]) && isset($_POST["created_at"])) {   
    $conn = new mysqli("localhost", "root", "", "CSChamp");
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $prize = mysqli_real_escape_string($conn, $_POST["prize"]);
    $winner_team_id = mysqli_real_escape_string($conn, $_POST["winner_team_id"]);
    $created_at = mysqli_real_escape_string($conn, $_POST["created_at"]);
    $sql = "INSERT INTO Tournament (prize, winner_team_id, created_at) VALUES ('$prize', '$winner_team_id', '$created_at')";
        if(mysqli_query($conn, $sql)){
            header("Location: tournament.php");
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>