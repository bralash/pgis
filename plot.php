<!doctype html>
<html>

<head>
	<title>Technical Unit - PGIS</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/semantic.css" />
	<link rel="stylesheet" href="css/style.css" />
	<meta charset="utf-8" />
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
			<div class="col-md-4">
				<h2 class="ui header dividing">Plot Points</h2>
				<form class="ui form">
					<div class="fields">
						<div class="field">
							<input type="text" class="xCood" placeholder="X Coordinate" />
						</div>
						<div class="field">
							<input type="text" class="yCood" placeholder="Y Coordinate" />
						</div>
					</div>

					<div class="fields">
						<div class="field">
							<input class="color" name="color" />
						</div>
						<div class="field">
							<button class="ui circular orange icon button" id="drw" title="Draw">
								<i class="icon paint brush"></i>
							</button>
							<button class="ui circular teal icon button" id="clsPth" title="Close Path">
								<i class="icon retweet"></i>
							</button>
							<button class="ui circular green icon button" id="end" title="End">
								<i class="icon circle notched"></i>
							</button>
							<button class="ui circular yelllow icon button" id="upload" title="Upload">
								<i class="icon upload"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-12" style="margin-top: 40px;">
				<canvas id="land-area"></canvas>
			</div>
			<form action="">
				<input type="file" id="excel-file">
				<label for="excel-file"></label>
			</form>
		</div>
	</section>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/semantic.js"></script>
	<script src="js/jscolor.js"></script>
	<script src="js/plot.js"></script>
	<script src="js/script.js"></script>
</body>

</html>