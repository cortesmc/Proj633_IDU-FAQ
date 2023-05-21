<?php

class Beer extends Model {
	
	public function save() {
		// Données connues :
		// $this->idbeer
		// $this->name
		// $this->color

		$stm = db()->prepare("
			update Beer
			set name=:name,
			    color=:color
			where idbeer=:idbeer
			");
		$stm->bindValue(":name", $this->name);
		$stm->bindValue(":color", $this->color);
		$stm->bindValue(":idbeer", $this->idbeer);
		$stm->execute();

	}



	public static function all() {
		$class = get_called_class();
		$table =  strtolower($class);
		$st = db()->prepare("select * from $table");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$beer = new $class();
			foreach($row as $field=>$value)
				$beer->$field = $value;

			$beer->brassery = Brassery::load($beer->idbrassery);
			
			$list[] = $beer;
		}
		return $list;
	}

	
}