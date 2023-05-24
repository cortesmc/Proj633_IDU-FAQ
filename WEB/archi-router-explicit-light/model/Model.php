<?php

class Model {

	public function __get($attr) {
		return $this->$attr;
	}

	public function __set($attr, $value) {
		$this->$attr = $value;
	}

	public static function create($id=null) {
		global $db;
		$class = get_called_class(); 
		$table = strtolower($class); 

		if ($id===null) {
			$o = new $class();
			// CREATE = INSERT


			// -- Récupération des colonnes de la table
			$stm = $db->prepare("SHOW COLUMNS FROM $table");
			$stm->execute();
			$columns = $stm->fetchAll(PDO::FETCH_COLUMN);

			// -- Insertion des données avec des valeurs par défauts 
			$firstRemoved = array_shift($columns);
			$insertColumns = implode(", ", $columns );
			$insertValues = "DEFAULT, " . str_repeat("DEFAULT, ", count($columns) - 2) . "DEFAULT";
			$stm = $db->prepare("INSERT INTO $table ($insertColumns) VALUES ($insertValues)");
			$stm->execute();

			// -- Récupérer la dernière ligne insérée de la table (celle qu'on vient de créer)
			$stm = $db->prepare("SELECT * from $table where id$table= ( SELECT MAX(id$table) FROM $table )");
			$stm->execute();
			$row = $stm->fetch(PDO::FETCH_ASSOC);
			
			
			// -- On crée notre objet avec les champs de la BDD		
			foreach($row as $key=>$value) {
				$o->$key = $value;
			}
			// var_dump($o);
			return $o;

		} else {
			// READ = SELECT
			$o = new $class();
			$stm = $db->prepare("select * from $table where id$table=:id");
			$stm->bindValue(":id", $id);
			$stm->execute();
			$row = $stm->fetch(PDO::FETCH_ASSOC);
			foreach($row as $key=>$value) 
				$o->$key = $value;
		}
	}

	public static function all() {
		$class = get_called_class();
		$table =  strtolower($class);
		$st = db()->prepare("select * from $table");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$h = new $class();
			foreach($row as $field=>$value)
				$h->$field = $value;
			$list[] = $h;
		}
		return $list;
	}

	public static function allWithParam( $nameParam, $value ) {
		$class = get_called_class();
		$table =  strtolower($class);
		$st = db()->prepare("select * 
			from $table 
			where $nameParam = :value");
		$st->bindValue(':value', $value);
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$h = new $class();
			foreach($row as $field=>$value)
				$h->$field = $value;
			$list[] = $h;
		}
		return $list;
	}

	public static function allWithTwoParam( $nameParam1, $value1, $nameParam2, $value2 ) {
		$class = get_called_class();
		$table =  strtolower($class);
		$st = db()->prepare("select * 
			from $table 
			where $nameParam1 = :value1
			and $nameParam2 = :value2");
		$st->bindValue(':value1', $value1);
		$st->bindValue(':value2',$value2);
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$h = new $class();
			foreach($row as $field=>$value)
				$h->$field = $value;
			$list[] = $h;
		}
		return $list;
	}

	public static function getByID($id) {
		$class = get_called_class();
		$table =  strtolower($class);
		$st = db()->prepare("select * 
			from $table 
			where id$table = :id");
		$st->bindValue(':id', $id);
		$st->execute();
		$row = $st->fetch(PDO::FETCH_ASSOC);
		$o = new $class();
		foreach($row as $attr => $value)
			$o->$attr = $value;
		return $o;

	}

	public static function random() {
		$class = get_called_class();
		$table =  strtolower($class);
		$st = db()->prepare("select * 
			from $table 
			order by random() limit 1");
		$st->execute();
		$row = $st->fetch(PDO::FETCH_ASSOC);
		$o = new $class();
		foreach($row as $attr => $value)
			$o->$attr = $value;
		return $o;

	}

}