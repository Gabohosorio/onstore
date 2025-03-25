<?php
	header('Content-Type: text/html; charset=UTF-8'); 
	date_default_timezone_set('America/Bogota');
	
  class Database{
    public static function connect(){
      $db = [
				"server" => "localhost",
				"user" => "root",
				"pass" => "",
				"datab" => "tienda_master",
			];
			$conex = new mysqli($db['server'], $db['user'], $db['pass'], $db['datab']);
      return $conex;
    }
  }
?>