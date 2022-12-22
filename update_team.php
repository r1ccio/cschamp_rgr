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
    $sql = "SELECT * FROM Team WHERE id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $name = $row["name"];
                $tier = $row["tier"];
                $created_at = $row["created_at"];
            }
            echo "<h3>Update team</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$id' />
                    <p>Team name
                    <input type='text' name='name' value='$name' /></p>
                    <p>Team tier:
                    <input type='number' name='tier' value='$tier' /></p>
                    <p>Created At:
                    <input type='text' name='created_at' value='$created_at' /></p>
                    <input type='submit' value='Save'>
            </form>";
        }
        else{
            echo "<div>Team not found</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["tier"]) && isset($_POST["created_at"])) {
      
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $tier = mysqli_real_escape_string($conn, $_POST["tier"]);
    $created_at = mysqli_real_escape_string($conn, $_POST["created_at"]);
      
    $sql = "UPDATE Team SET name = '$name', tier = '$tier', created_at = '$created_at' WHERE id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: team.php");
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