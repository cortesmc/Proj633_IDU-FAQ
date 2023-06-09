<?php

class Utilisator extends Model {

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
		/*
		Si l'email est présent dans la table Utilisator -> return true : else -> return false
		*/ 
		return (Utilisator::getByEmail($email) != false) ? true : false;
	}


	// return all ids liked by the user.
	public function getLiked() {
		$class = get_called_class();
		$table =  strtolower($class);

		$st = db()->prepare("select idquestion 
			from isLiked
			where idutilisator = :idutilisator");
		$st->bindValue(':idutilisator',$this->idutilisator);
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
            foreach($row as $field=>$value)
				$list[]=$value;          
        }
        return $list;	
		
	}

	public static function addLiked($idUtilisator,$idQuestion){
		$st = db()->prepare("insert into isLiked
		(idutilisator,idquestion)
		values(:idutilisator,:idquestion)");
		$st->bindValue(':idutilisator',$idUtilisator);
		$st->bindValue(':idquestion',$idQuestion);
		$st->execute();
	}

	public static function removeLiked($idUtilisator,$idQuestion){
		$st = db()->prepare("delete from isLiked
		where (idutilisator = :idutilisator AND
		idquestion =:idquestion)");
		$st->bindValue(':idutilisator',$idUtilisator);
		$st->bindValue(':idquestion',$idQuestion);
		$st->execute();
	}
	

}