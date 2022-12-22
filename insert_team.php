<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if (isset($_POST["name"]) && isset($_POST["tier"]) && isset($_POST["created_at"])) {   
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $name = mysqli_real_escape_string($conn, $_POST["name"]); 
    $tier = mysqli_real_escape_string($conn, $_POST["tier"]);
    $created_at = mysqli_real_escape_string($conn, $_POST["created_at"]);

    $sql = "INSERT INTO Team (name, tier, created_at) VALUES ('$name', '$tier', '$created_at')";
        if(mysqli_query($conn, $sql)){
            header("Location: team.php");
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>