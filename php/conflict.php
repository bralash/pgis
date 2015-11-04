<?php
    require('db_connection.php');

    class Conflict{
        public function createConflictTable(){
            global $db;
            $sql = "create table conflicts(";
            
            foreach ($_POST as $key => $input) {
	        	if($key == 'action'){
	        		$key = null;
	        	}else{
	        		$sql .= $key.' varchar(255), ';
        		}
        	}
            
//        	$sql = substr($sql, 0, strlen($sql)-2).') VALUES (';
//        	foreach ($_POST as $key => $input) {
//                if($key == 'action'){
//                    $input = null;
//                }else{
//                    $sql .= "'{$input}',";
//                }
//        	}

            $sql = substr($sql, 0, strlen($sql)-2).");";
            echo $sql;
        }
        
        public function addNew(array $conf_details){
            global $db;
            $sql = "INSERT INTO `pgis`.`conflicts` (";

            foreach ($_POST as $key => $input) {
	        	if($key == 'action'){
	        		$key = null;
	        	}else{
	        		$sql .= '`'.$key.'`, ';
        		}
        	};
        	$sql = substr($sql, 0, strlen($sql)-2).') VALUES (';
        	foreach ($_POST as $key => $input) {
                if($key == 'action'){
                    $input = null;
                }else{
                    $sql .= "'{$input}',";
                }
        	}

            $sql = substr($sql, 0, strlen($sql)-2)."');";
        	// return $sql;

            // $db->query($db->sqlFormat($sql));
            $db->query($sql);
            return $db->lastInsertedId(); 
        }

        public static function getConflictWithId($id){
            global $db;
            $query = $db->query("SELECT * FROM `conflicts` WHERE conflict_id = {$id}");
            
            while($conflict = $db->fetchArray($query)){
                return $conflict;   
            }
        }

        public static function addConflictImage($id, $base64){
            global $db;
            $sql = "INSERT INTO `graphs` (`id`, `conflict_id`, `image`) VALUES (NULL, '{$id}', '{$base64}');";
            $db->query($sql);
            return $db->lastInsertedId(); 
        } 
    }
?>