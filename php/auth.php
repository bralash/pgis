<?php
	session_start();
    require_once "functions.php";
    require_once "users.php";

    if (!empty($_POST['username'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];

		if (Users::auth($user, $pass)) {
			$_SESSION['user'] = $user;
			redirect_to("../");
		}
		else echo "<h1 style='color:#2980B9;text-align:center'>Password username combination wrong</h1>'";
	}elseif(isset($_GET['action']) && $_GET['action'] == 'signout') {
		session_destroy();
		redirect_to('../login.php');
	}
	
?> 