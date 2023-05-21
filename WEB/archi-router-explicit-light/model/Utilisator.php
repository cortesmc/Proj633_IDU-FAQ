<?php

class Utilisator extends Model {

    public function save() {
		// Données connues :
		// $this->idbeer
		// $this->name
		// $this->color

		$class = get_called_class(); 
		$table = strtolower($class); 

		$stm = db()->prepare("
			UPDATE $table
			SET firstname=:firstname,
                lastname=:lastname,
				email=:email,
				password=:password
			WHERE id$table=:id$table
			");
            
		$stm->bindValue(":firstname", $this->firstname);
		$stm->bindValue(":lastname", $this->lastname);
		$stm->bindValue(":email", $this->email);
		$stm->bindValue(":password", $this->password);

		$stm->bindValue(":idutilisator", $this->idutilisator);
		$stm->execute();

	}

	public static function getByEmail($email) {
		$class = get_called_class();
		$table =  strtolower($class);

		$st = db()->prepare("select * 
			from $table 
			where email = :email");
		$st->bindValue(':email', $email);
		$st->execute();

		$row = $st->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			$o = new $class();
			foreach($row as $attr => $value)
				$o->$attr = $value;
			return $o;
		} else 
			return false;
		
	}

	public static function checkIfEmailExist($email) {
		return (Utilisator::getByEmail($email) != false) ? true : false;
	}
	

}