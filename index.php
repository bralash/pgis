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
        <link rel="stylesheet" href="materialize/css/materialize.css" />
        <link rel="stylesheet" href="fonts/font-awesome-4.4.0/css/font-awesome.css" />
        <link rel="stylesheet" href="css/semantic.css">
        <link rel="stylesheet" href="css/style.css" />
        <meta charset="utf-8">
    </head>

    <body>
        <header class="white">
            <p>Participatory Geographic Information System</p>
            <div class="tools">
                <a href="php/auth.php?action=signout" class="btn-floating btn-large waves-effect waves-light red"><i class="fa fa-mail-forward"></i></a>

            </div>
        </header>

        <section class="container">
            <div class="row">
                <div class="actions">
                    <a href="new.php" class="waves-effect waves-light btn"><i class="fa fa-plus"></i> Add Conflict</a>
                    <a href="plot.php" class="waves-effect waves-light btn"><i class="fa fa-plus"></i> Add Map</a>
                </div>
                <?php 
					require "php/conflict.php";
					$conflicts = Conflict::getAll();
				?>
                    <div class="row">
                        <div class="col s12 m4">
                            <div class="card white darken-1">
                                <div class="card-content gray-text">
                                    <span class="card-title">Brenu</span>
                                    <p>A conflict between Brenu</p>
                                </div>
                                <div class="card-action">
                                    <a href="ba.php">View Conflict</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php foreach ($conflicts as $key => $conflict):?>
                            <div class="col s12 m4">
                                <div class="card white darken-1">
                                    <div class="card-content gray-text">
                                        <span class="card-title"><?=$conflict["conf_name"]?></span>
                                        <p>
                                            <?=$conflict['conf_description']?>
                                        </p>
                                    </div>
                                    <div class="card-action">
                                        <a href="display.php?conflict_id=<?=$conflict['id']?>">View Conflict</a>


                                        <button class="ed circular ui icon button blue right" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="del circular ui icon button red right" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <div class="confirm-del">
                                        	<span>Delete Conflict?</span>
                                        	<a href="" class="mini blue ui button">Yes</a>
                                        	<a href="" class="mini no red ui button">No</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                    </div>
            </div>
        </section>
        <footer style="position: relative;">Copyright &copy; Nana Gyamera 2016</footer>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/semantic.js"></script>
        <script src="js/script.js"></script>
    </body>

    </html>