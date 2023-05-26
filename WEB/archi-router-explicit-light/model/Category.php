<?php

class Category extends Model {
    
    public static function getByLibele($libele) {
        $class = get_called_class();
		$table =  strtolower($class);

		$st = db()->prepare("select * 
			from $table 
			where libele = :libele");
		$st->bindValue(':libele', $libele);
		$st->execute();

		$row = $st->fetch(PDO::FETCH_ASSOC);

        // var_dump($row);
		$category = new $class();
		foreach($row as $attr => $value)
			$category->$attr = $value;

		return $category;
    }
}