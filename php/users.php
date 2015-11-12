<?php
        require_once(dirname(__FILE__)."/db_connection.php");
    class Users{
        public static function auth($username, $password){
			global $db;
	        $User = resultQuery("SELECT * FROM `users` WHERE username ='{$username}' AND password = '{$password}'");
	       	return is_array($db->fetchArray($User));
        }
    }