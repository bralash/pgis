<!doctype html>
<html>
<head>
	<title>PGIS LOGIN</title>
<!--	<link rel="stylesheet" href="css/bootstrap.css" />-->
	<link rel="stylesheet" href="css/semantic.css" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<header>
		<h1>LOGIN</h1>
	</header>
	
	<section class="wrapper container closed">
		<div class="row">
			<div class="col-md-4">
				<div class="ui card">
					<div class="content">
						<form action="php/auth.php" class="ui form" method="post">
							<div class="fields">
								<div class="field">
									<label for="user">Username</label>
									<input type="text" name="username" id="user">
								</div>	
								<div class="field">
									<label for="pass">Password</label>
									<input type="password" name="password" id="pass">
								</div>
								<button class="ui button blue" type="submit">Login</button>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>Copyright &copy; Nana Gyamera 2015</footer>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/semantic.js"></script>
</body>
</html>