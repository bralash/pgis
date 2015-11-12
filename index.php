<?php
	require "php/functions.php";
	session_start();
	if(!isset($_SESSION['user'])){
		redirect_to('login.php');
	}
?>

<!doctype html>
<html>
<head>
	<title>PGIS</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/semantic.css" />
	<link rel="stylesheet" href="css/style.css" />
	<meta charset="utf-8">
</head>
<body>
	<header>
		<h1>Participatory Geographic Information System</h1>
		<a class="sign-out" href="php/auth.php?action=signout">Sign Out</a>
	</header>
	
	<section class="wrapper container closed">
		<div class="row">
			<div class="col-md-4">

				<div class="ui card">
					<div class="content">
						<img class="image right floated mini ui" src="img/add.png" />
						<div class="header">
							<a href="new.php" class="link">Add Conflict</a>
						</div>
						<div class="description">
							Add details of a new conflict and to generate a plot 
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="ui card">
					<div class="content">
						<img class="image right floated mini ui" src="img/compass.png" />
						<div class="header">
							<a href="ba.php">Brenu Akyinim and Ampenyin</a>
						</div>
						<div class="description">
							Conflict between Brenu Akyinim and Ampenyin
						</div>
					</div>
				</div>
				<?php 
					require "php/conflict.php";
					$conflicts = Conflict::getAll();
				?>
				<?php foreach ($conflicts as $key => $conflict):?>
				<div class="ui card">
					<div class="content">
						<img class="image right floated mini ui" src="img/compass.png" />
						<div class="header">
							<a href="display.php?conflict_id=<?=$conflict['id']?>"> <?=$conflict["conf_name"]?> </a>
						</div>
						<div class="description"><?=$conflict['conf_description']?></div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<footer>Copyright &copy; Nana Gyamera 2015</footer>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/semantic.js"></script>
</body>
</html>