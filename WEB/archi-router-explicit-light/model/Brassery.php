<?php



class Brassery extends Model {
    
    public function save() {
		// Données connues :
		// $this->idbeer
		// $this->name
		// $this->color

		$stm = db()->prepare("
			update brassery
			set namebrassery=:namebrassery,
			    country=:country
			where idbrassery=:idbrassery
			");
		$stm->bindValue(":namebrassery", $this->namebrassery);
		$stm->bindValue(":country", $this->country);
		$stm->bindValue(":idbrassery", $this->idbrassery);
		$stm->execute();

	}


	
	public static function all() {
		$class = get_called_class();
		$table =  strtolower($class);
		$st = db()->prepare("select * from $table");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$brassery = new $class();
			foreach($row as $field=>$value)
				$brassery->$field = $value;

			$brassery->beers = Beer::allWithParam("idbrassery", $brassery->idbrassery);
			
			$list[] = $brassery;
		}
		return $list;
	}


	public static function load($id) {
		$class = get_called_class();
		$table =  strtolower($class);
		$st = db()->prepare("select * 
			from $table 
			where id$table = :id");
		$st->bindValue(':id', $id);
		$st->execute();
		$row = $st->fetch(PDO::FETCH_ASSOC);
		$brassery = new $class();
		foreach($row as $attr => $value)
			$brassery->$attr = $value;

		$brassery->beers = Beer::allWithParam("idbrassery", $brassery->idbrassery);
		return $brassery;

	}


}