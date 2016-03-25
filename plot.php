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
	<title>Technical Unit - PGIS</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/semantic.css" />
	<link rel="stylesheet" href="css/entypo/css/entypo.css" />
	<link rel="stylesheet" href="css/style.css" />
	<meta charset="utf-8"/>
</head>

<body>

	<header>
		<a href="index.php" class="back-icon">
			<i class="icon home"></i> Back Home
		</a>
		<h1>Technical Unit</h1>
	</header>
	<section class="wrapper">
		<div class="row">
			<form class="ui form">
				<input type="hidden" value="<?= $_GET['conflict_id']?>" name="conf_id">
				<div class="col-md-4">
					<h2 class="ui header dividing">Map Info</h2>
					<div class="key">
					<div class="key-pair">
						<span class="color-bar"></span><span>- Plaintiff</span>
					</div>
					<div class="key-pair">
						<span class="color-bar"></span><span>- Defendant</span>
					</div>
					</div>
					<div class="area">
						<span class="first">Area of Plot1: <b></b></span>
						<span class="second">Area of Plot2: <b></b></span>
					</div>
					<div class="scale">
						<span style="color: rgb(34, 167, 240)">Scale - 1:1250</span>
					</div>
				</div>

				<div class="col-md-4">
					<h2 class="ui header dividing">Conflict Details</h2>
					<div class="fields">
						<?php 
							require "php/conflict.php";
							$conflicts = Conflict::getAll();
						?>
						<select class="ui dropdown" id="conflict-id">
							<?php foreach ($conflicts as $key => $conflict):?>
								<option value="<?=$conflict["id"]?>"><?=$conflict["conf_name"]?></option>
							<?php endforeach; ?>		
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<h2 class="ui header dividing">Upload Coordinates</h2>
					<div class="field">
						<input class="up jscolor" name="color" value="22A7F0" />
					</div>
					<div class="field">
						<div class="ui action input">
							<input placeholder="Choose file" id="ip" type="text" disabled="disabled">
							<button class="ui teal button brw icon" title="Browse">
								<i class="icon archive"></i>
							</button>
						</div>
						<input type="file" id="upload-input" class="hidden-browse">
					</div>
				</div>
			</form>
		</div>
	
		<div class="canvas-wrapper">
			<span class="exv xorigin">XO</span>
			<span class="exv xfinal">XF</span>
			<span class="exv yorigin">YO</span>
			<span class="exv yfinal">YF</span>
			<canvas id="land-area"></canvas>
		</div>
		<button class="save-btn ui button blue right floated" type="submit">Save</button>

	</section>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/semantic.js"></script>
	<script src="js/jscolor.js"></script>
	<script src="js/script.js"></script>
	<script src="js/plot.js"></script>
</body>

</html>