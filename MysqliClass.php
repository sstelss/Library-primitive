<?php

require_once("dbconfig.php");

class MysqliClass{
	private static $db = null;
	
	public $conect = null;
	
	public static function createDB(){
	
		if (self::$db == null){
			self::$db = new MysqliClass();
		}
		return self::$db;
	}
	
	private function __construct(){
		
		$this -> conect = new mysqli(HOSTNAME, USERNAME, PASSWORD, DBNAME);
		$this -> conect -> query("SET NAMES utf8");
	}
	//вывод из таблицы table столбцов  filds
	public function gettable($filds, $table){
		$query = "SELECT ".$filds." FROM ".$table;
		$result = $this -> conect -> query($query);
		$a = array();
		
		while ($row = $result -> fetch_assoc()){
			
			$a[] = $row;
		}
		return $a;
	}
	
	//найти книгу где critertion равен crit_name
	public function get_book($filds, $table, $critertion, $crit_name){
		$query = "SELECT ".$filds." FROM ".$table." WHERE ".$critertion." LIKE "."\"".$crit_name."\"";
		$result = $this -> conect -> query($query);
		
		$a = array();
		
		while ($row = $result -> fetch_assoc()){
			
			$a[] = $row;
		}
		
		return $a;
		
	}


	public function inspect($filds, $table, $critertion, $crit_name){
		$query = "SELECT ".$filds." FROM ".$table." WHERE ".$critertion." LIKE "."\"".$crit_name ."\"";
		$result = $this -> conect -> query($query);
		
		$a = array();
		
		while ($row = $result -> fetch_assoc()){
			
			$a[] = $row;
		}
		
		return $a;
		
	}
	
	
	//добавление нового пользователя
	public function insert_into_table($table, $d){
		//var_dump($array_keys($d));
		$fields = implode("`,`", array_keys($d));
		$fields = "`".$fields."`";
		
		$r = "";
		
		foreach($d as $v){
			$r .= "\"".$v."\"".", ";
		}
		
		$r = substr($r, 0, -2);
		
		$insert = "INSERT INTO ".$table."(".$fields.") VALUES($r)";
		echo $insert;
		
		$this ->conect ->query($insert);
	}
	
	//удаление пользователя по id
	public function delete_from_table($table, $id){
		$delete = "DELETE FROM ".$table." WHERE `id`=".$id;
		// echo $delete;
		$this ->conect ->query($delete);
		
	}
	
	//обновление информации о пользователе
	public function update_table($table, $d, $id){
		$r = "";
		foreach($d as $k => $v){
			
			$r .="`".$k."`"."="."\"".$v."\"".",";
		}
		
		$r = substr($r,0,-1);
		
		$update = "UPDATE ".$table." SET ".$r." WHERE `id`=".$id;
		echo $update;
		$this -> conect ->query($update);
	}
}

?>