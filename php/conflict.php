<?php
    require('db_connection.php');

    class Conflict{
        private function Base64_To_Image($base64_string, $output){
            $ifp = fopen($output, "wb");
            $data = explode(',', $base64_string);
            fwrite($ifp, base64_decode($data[1]));
            fclose($ifp);
    //                    return $output;
        }

        public function createConflictTable(){
            global $db;
            $sql = "create table conflicts(";
            
            foreach ($_POST as $key => $input) {
	        	if($key == 'action') $key = null;
	        	else $sql .= $key.' varchar(255), ';
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
        
        public function addNew(array $conf_details, array $files_array){
            global $db;
            $sql = "INSERT INTO `pgis`.`conflicts` (";

            foreach ($_POST as $key => $input) {
	        	if($key == 'action' || $key == 'plot-image') $key = null;
	        	else $sql .= '`'.$key.'`, ';
        	}
        	$sql = substr($sql, 0, strlen($sql)-2).') VALUES (';
        	
            foreach ($_POST as $key => $input) {
                if($key == 'action' || $key == 'plot-image') $input = null;
                else $sql .= "'{$input}',";
        	}

            $sql = substr($sql, 0, strlen($sql)-2)."');";
        	// return $sql;
            // $db->query($db->sqlFormat($sql));
            $db->query($sql);

            if(isset($files_array['plot-image'])){
                global $db;
                $filename = $files_array['plot-image']['tmp_name'];
                $path = 'img/graph'.$db->lastInsertedId().'.jpg';

                if(move_uploaded_file($filename, $path)){
                    $sql = "INSERT INTO `graph_images` (`id`, `conflict_id`, `image`) VALUES (NULL, '{$db->lastInsertedId()}', '{$path}');";
                    $db->query($sql);
                    return $db->lastInsertedId(); 
                }
                else echo 'Ooops something is wrong, file couldnt be uploaded';
            }
            // else var_dump($conf_image);

            return $db->lastInsertedId(); 
        }

        public static function getConflictWithId($id){
            global $db;
            $query = $db->query("SELECT * FROM `conflicts` WHERE id = {$id}");
            while($conflict = $db->fetchArray($query)){
                return $conflict;   
            }
        }

        public static function getAll(){
            global $db;
            $query = $db->query("SELECT `id`, `conf_name`, `conf_description` FROM `conflicts`;");

            $conflicts = array();
            while ($conflict = $db->fetchArray($query)) {
                array_push($conflicts, $conflict);
            }
            return $conflicts;
        } 

        public static function addConflictImage($id, $base64){
            global $db;
            $path = '../img/graph'.$id.'.jpg';
            self::Base64_To_Image($base64, $path);

            $sql = "INSERT INTO `graph_images` (`id`, `conflict_id`, `image`) VALUES (NULL, '{$id}', '{$path}');";
            $db->query($sql);
            return $db->lastInsertedId(); 
        }
    }
?>