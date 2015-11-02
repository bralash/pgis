<?php
	require "functions.php";
	require "conflict.php";

    if(isset($_POST['action']) && $_POST['action'] == 'add_conflict'){
      $conf = new Conflict;
      if(is_int($conf->addNew($_POST))){
          echo '1';
      }   
    }elseif(isset($_POST['action']) && $_POST['action'] == 'addConflictImage'){
    	Conflict::addConflictImage($_POST['conflict_id'], $_POST['base64']);
        
    }elseif(isset($_POST['action']) && $_POST['action'] == 'loadExcelFile'){
        $filename = $_FILES['file']['tmp_name'];
        $new_filename = '../data/sheet'.rand().'.xlsx';

        if(move_uploaded_file($filename, $new_filename)){
            include "reader.php";
        }
        else{
            echo 'still bad '.$filename;
        }
    }
?>