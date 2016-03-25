<!doctype html>
<html>

<head>
	<title>PGIS LOGIN</title>
	<link rel="stylesheet" href="materialize/css/materialize.css" />
	<link rel="stylesheet" href="fonts/font-awesome-4.4.0/css/font-awesome.css" />
	<link rel="stylesheet" href="css/login.css" />
</head>

<body>
	<section class="container">
		<div class="row">
			<form action="php/auth.php" class="col s12 card-panel hoverable" method="post">
				<div class="row">
					<div class="input-field col s12">
						<i class="fa fa-user prefix"></i>
						<input name="username" id="user" type="text" class="validate">
						<label for="user">Username</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<i class="fa fa-lock prefix"></i>
						<input name="password" id="password" type="password" class="validate">
						<label for="password">Password</label>
					</div>
				</div>
				<button id="submit-form" class="waves-effect waves-light btn-large z-depth-0 z-depth-1-hover">Sign In</button>
			</form>
		</div>
	</section>
	<footer>Copyright &copy; Nana Gyamera 2016</footer>

	<script src="js/jquery.js"></script>
	<script src="materialize/js/materialize.min.js"></script>
</body>

</html>