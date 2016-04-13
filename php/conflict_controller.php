<?php
	require "functions.php";
	require "conflict.php";

    if(isset($_POST['action']) && $_POST['action'] == 'add_conflict'){
      $conf = new Conflict;
      $conflict_id = $conf->addNew($_POST, $_FILES);
      // echo $_FILES['plot-image']['tmp_name'];
      if(is_int($conflict_id)){
          echo $conflict_id;
          echo "<aside><h1>Conflict ".$_POST['conf_name']." added successfully</h1><a href='../plot.php?conflict_id={$conflict_id}&conflict_name={$_POST['conf_name']}'>Proceed to Technical Unit</a></aside>";
          echo "<style>a{color: inherit;}
              aside{width: 400px;background: rgb(240, 240, 240) none repeat scroll 0% 0%;padding: 15px;font-family: century gothic;color: rgb(116, 116, 116);}
          </style>";
      }   
    }elseif(isset($_POST['action']) && $_POST['action'] == 'addConflictImage'){
    	if(is_int(Conflict::addConflictImage($_POST['conflict_id'], $_POST['base64']))){
          echo 'true';
      }
        
    }elseif(isset($_POST['action']) && $_POST['action'] == 'loadExcelFile'){
        $filename = $_FILES['file']['tmp_name'];
        $new_filename = '../data/sheet'.rand().'.xlsx';

        if(move_uploaded_file($filename, $new_filename)) include "reader.php";
        else echo 'Ooops something is wrong with '.$filename;

    }elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
      $conf = new Conflict;
      $conflict_id = $conf->update($_POST);
      // echo $_FILES['plot-image']['tmp_name'];
      if(is_int($conflict_id)){
          echo "<aside><h1>Conflict ".$_POST['conf_name']." updated successfully</h1><a href='../plot.php?conflict_id={$conflict_id}&conflict_name={$_POST['conf_name']}'>Proceed to Technical Unit</a></aside>";
          echo "<style>a{color: inherit;}
              aside{width: 400px;background: rgb(240, 240, 240) none repeat scroll 0% 0%;padding: 15px;font-family: century gothic;color: rgb(116, 116, 116);}
          </style>";
      }  
      
    }elseif(isset($_POST['action']) && $_POST['action'] == 'delete'){
        Conflict::delete($_POST['conflict_id']);
        redirect_to('../');
    }
?>