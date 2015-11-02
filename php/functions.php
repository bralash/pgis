<?php
	// This file is the place to store all basic functions
	require_once(dirname(__FILE__)."/db_connection.php");

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	function datetime_to_text($datetime="") {
	  $unixdatetime = strtotime($datetime);
	  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
	}
			
	function boolQuery($sql){
		global $db;
		$executed = $db->query($sql);
		return !$executed ? false : true;
	}

	function resultQuery($sql){
		global $db;
		return $db->query($sql);
	}
?>
	