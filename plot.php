<!doctype html>
<html>

<head>
	<title>Technical Unit - PGIS</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/semantic.css" />
	<link rel="stylesheet" href="css/entypo/css/entypo.css" />
	<link rel="stylesheet" href="css/style.css" />
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
				<div class="col-md-4">
					<h2 class="ui header dividing">Grid Controls</h2>
					<div class="fields">
						<div class="seven wide field">
							<input type="number" id="strtX" placeholder="Starting X Coordinate">
						</div>
						<div class="seven wide field">
							<input type="number" id="endX" placeholder="Ending X Coordinate">
						</div>
					</div>
					<div class="fields">
						<div class="seven wide field">
							<input type="number" id="strtY" placeholder="Starting Y Coordinate">
						</div>
						<div class="seven wide field">
							<input type="number" id="endY" placeholder="Ending Y Coordinate">
						</div>
						<div class="two wide field">
							<button class="ui circular blue icon button" id="shG" title="Show Grid">
								<i class="grid layout icon"></i>
							</button>
						</div>
					</div>

				</div>
				<div class="col-md-4">
					<h2 class="ui header dividing">Plot Points</h2>
					<div class="fields">
						<div class="field">
							<input type="number" class="xCood" placeholder="X Coordinate" />
						</div>
						<div class="field">
							<input type="number" class="yCood" placeholder="Y Coordinate" />
						</div>
					</div>

					<div class="fields">
						<div class="field">
							<input class="color" name="color" value="22A7F0" />
						</div>
						<div class="field">
							<button class="ui circular blue icon button" id="strt" title="Start">
								<i class="edit icon"></i>
							</button>
							<button class="ui circular orange icon button" id="drw" title="Draw">
								<i class="icon paint brush"></i>
							</button>
							<button class="ui circular teal icon button" id="clsPth" title="Close Path">
								<i class="icon retweet"></i>
							</button>
							<button class="ui circular green icon button" id="end" title="End">
								<i class="icon circle notched"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<h2 class="ui header dividing">Upload Coordinates</h2>
					<div class="field">
						<input class="up color" name="color" value="22A7F0" />
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

		<canvas id="land-area"></canvas>

	</section>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/semantic.js"></script>
	<script src="js/jscolor.js"></script>
	<script src="js/script.js"></script>
	<script src="js/plot.js"></script>
</body>

</html>