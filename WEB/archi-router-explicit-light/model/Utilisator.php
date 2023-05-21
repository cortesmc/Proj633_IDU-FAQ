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
                lastname=:lastname
			WHERE id$table=:id$table
			");
            
		$stm->bindValue(":firstname", $this->firstname);
		$stm->bindValue(":lastname", $this->lastname);
		$stm->bindValue(":idutilisator", $this->idutilisator);
		$stm->execute();

	}
    
}