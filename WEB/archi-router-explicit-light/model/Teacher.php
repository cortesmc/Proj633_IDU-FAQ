<?php

class Teacher extends Model {

    public function save() {
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
		$stm->bindValue(":idteacher", $this->idteacher);
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
		/*
		Si l'email est présent dans la table Teacher -> return true : else -> return false
		*/ 
		return (Teacher::getByEmail($email) != false) ? true : false;
	}
	

}