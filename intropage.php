<?php
			session_start();
			if(!isset($_SESSION["session_username"])):
				header("location:login.php");
			else:
		?>
<!DOCTYPE html>
<html>
	<head>
		<title>CSChamp</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/base.css">
	</head>
	<body>
		<div class="divbg">
		<h2>Welcome, <?php echo $_SESSION['session_username'];?>!</h2>
  		<table>
			<th><a href="logout.php">Logout from system</a></th>
		</table>
		<h3 class="hehe">Choose table to work with:</h3>
  		<table>
  			<th><a href="index.php">Games </a></th>
  			<th><a href="player.php">Players </a></th>
  			<th><a href="team.php">Teams </a></th>
  			<th><a href="round.php">Rounds </a></th>
			<th><a href="tournaments.php">Tournaments </a></th>
  		</table>
		</div>
	</body>
</html>
<?php
	endif;
?>